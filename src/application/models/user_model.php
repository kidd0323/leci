<?php
/**
 * User Model Class
 *
 * @author QiangRunwei <qiangrw@gmail.com>
 * @version	1.0
 */
 
class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

	/**
	 * User::insert_passport()
	 * 
	 * @param int $uid
	 * @param string $email
	 * @param string $nickname
	 * @param string $password
	 * @param string $confirm
	 * @param int $create_time
	 * @param int $modify_time
	 * @return
	 */
	function insert_passport($uid,$email,$nickname,$password,$confirm,
							$create_time,$modify_time)
	{
		$data = array (
			'uid' => $uid,
			'gid' => 2,				//普通用户
			'email' => $email,
			'activate' => 2,		//默认状态为未激活
			'nickname' => $nickname,
			'password' => sha1($password),
			'confirm' => $confirm,
			'create_time' => $create_time,
			'modify_time' => $modify_time,
			'status' => 2
		);
		$this->db->flush_cache();
		$this->db->insert('cs_passport', $data);
		$this->db->set('people', 'people+1', FALSE)->where('status', 2)->update('cs_summary');
		return TRUE;
	}
	
	/**
	 * 修改用户详细资料
	 */ 
	function edit_user_info($uid,$idcard,$realname,$phone,$province,$city,$district)
	{
		$time = time();
		$data = array(
			'realname' => $realname,
			'idcard' => $idcard,
			'phone' => $phone,
			'province' => $province,
			'city' => $city,
			'district' => $district,
			'modify_time' => $time,
			'status' => 2,
			);
		$this->db->flush_cache();
		$sel_query = $this->db->select('uid')->from('cs_user')->where('uid',$uid)->get();
		$this->db->flush_cache();
		if($sel_query->num_rows() > 0) {
			// 已经存在
			$this->db->where('uid',$uid);
			$this->db->update('cs_user',$data);
		} else {
			$data['uid'] = $uid;
			$data['create_time'] = $time;
			$this->db->insert('cs_user',$data);
		}
		return TRUE;
	}
	
	/**
	 * 修改用户头像
	 * @param int $uid
	 * @param string photo
	 */
	function edit_user_photo($uid,$photo)
	{
		$time = time();
		$data = array(
			'photo' => $photo,
			'modify_time' => $time,
			'status' => 2,
			);
		$this->db->flush_cache();
		$sel_query = $this->db->select('uid')->from('cs_user')->where('uid',$uid)->get();
		if($sel_query->num_rows() > 0) {
			// 已经存在
			$this->db->where('uid',$uid);
			$this->db->update('cs_user',$data);
		} else {
			$data['uid'] = $uid;
			$data['create_time'] = $time;
			$this->db->insert('cs_user',$data);
		}
		return TRUE;
	}
	
	/**
	 * get user info from cs_user table
	 */
	function get_detail_info($uid)
	{
		$this->db->flush_cache();
	 	$this->db->where('uid',$uid)->from('cs_user')->limit(1);
	 	$query = $this->db->get();
	 	if($query->num_rows() == 0) return NULL;
		
	 	$info = $query->row();
		$this->load->model('Utility_model');
		$info->province_name = $this->Utility_model->get_province_by_id($info->province);
		$info->city_name = $this->Utility_model->get_city_by_id($info->province,$info->city);
		if(!$info->photo || $info->photo == "") $info->photo = 'default.jpg'; 
		$info->district_name = $this->Utility_model->get_district_by_id($info->province,$info->city,$info->district);
		return $info;
	}
		
	/**
	 * generate user's confirm code 
	 * @return string code
	 */ 
	function generate_confirm_code(){
		 $code = $this->get_random_word(12,15);
		 return $code;
	}
	
	/**
	 * generate reset password token
	 * @param int $tk_id
	 * @param int $uid
	 */ 
	function generate_token($tkid,$uid)
    {
    	$time = time();
   	    $token = $this->get_random_word(50,60);
    	$data = array(
			'tkid' => $tkid,
			'uid' => $uid,
			'token' => $token,
			'create_time' => $time,
			'modify_time' => $time,
			'status' => 2
		);
		$this->db->insert('cs_token',$data);
		return $token;
    }
    
    /**
     * check whether the token is valid
     * @param int $uid
     * @param string token
     * @return bool
     */ 
    function check_token_valid($uid,$token)
	{
		$data = array('uid' => $uid,'token' => $token, 'status' => 2);
		$this->db->flush_cache();
    	$query = $this->db->get_where('cs_token', $data);
    	if($query->num_rows() > 0) {
    		$time = time();
    		$create_time = $query->row()->create_time;
    		return ($time - $create_time <= 60*150);	// 15min内有效
   		} else {
   			return FALSE;
   		}		  	
    }
    
  	/**
  	 * delete the generated token
  	 */
 	function del_token($uid,$token){
 		$data = array('status' => 1);	#DELETE
		$this->db->flush_cache();
		$this->db->where('uid',$uid);
		$this->db->where('token',$token);
		$this->db->update('cs_token',$data);
 	}
    
    
	/**
	 * confirm user's email using confirm code
	 * @param int $uid
	 * @param string $code
	 * @return bool
	 */ 
	function confirm_user($uid,$code)
	{
		$this->db->flush_cache();
		$query = $this->db->get_where('cs_passport', 
									  array('uid' => $uid,
									  		'confirm' => $code,
									  		'activate' => 2,
									  		'status' => 2
  											)
									  );
  		// user exists and has not been activated
 		if($query->num_rows() > 0) {
 			$data = array('activate' => 1);
 			$this->db->where('uid',$uid);
 			$this->db->update('cs_passport',$data);
 			return TRUE;
 		} else {
 			return FALSE;
 		}
	}

    
    /**
     * get user's info by uid
     * @param int uid
     * @return mixed $info
     */
	function get_info($uid)
	{
		$this->db->flush_cache();
		$this->db->select('uid,nickname,email,gid,activate,confirm');
		$query = $this->db->get_where('cs_passport', array('uid' => $uid,'status' => 2));
		if ($query->num_rows() > 0) {
			$info = $query->row();
			$gid = $info->gid;
			$this->db->select('gname')->from('cs_group')->where('gid',$gid);
			$query = $this->db->get();
			$info->gname = $query->row()->gname;
			return $info;
		}
		return NULL;
	}
     
         
    /**
     * check whether user has login the site
     * @return int $uid
     */ 
    function check_user_login() 
    {
   	 	if(!$this->session->userdata('uid')) {
   	 		return 0;
		} else {
			return $this->session->userdata('uid');
		}
    }
    
    /**
     * check whether the user exists
     * @param string $email
     * @return bool
     */
	 function check_user_exists($email) 
	 {
	 	$this->db->flush_cache();
	 	$query = $this->db->get_where('cs_passport',array('email'=>$email,'status'=>2));
	 	if($query->num_rows() > 0) {
	 		return $query->row()->uid;
	 	} else {
	 		return 0;	
	 	}
	 }
	 
	 /**
	  * check whether the uid exists
	  */
	 function check_uid_exists($uid)
	 {
	 	$this->db->flush_cache();
	 	$query = $this->db->get_where('cs_passport',array('uid'=>$uid,'status'=>2));
	 	return ($query->num_rows() > 0);
	 }
	 
	 /**
	  * check whether email and password matches then set session
	  * @param string $email
	  * @param string $password
	  * @return int
	  */ 
	 function check_user_password($email,$password) 
	 {
	 	$this->db->flush_cache();
	 	$this->db->select('uid,nickname,activate');
		$data = array('email' => $email,'password'=>sha1($password),'status' => 2);
	 	$sel_query = $this->db->get_where('cs_passport',$data);
		if ($sel_query->num_rows() > 0) {
			$row = $sel_query->row();
			if($row->activate == 1) {
				$this->session->set_userdata('uid',$row->uid);
				$this->session->set_userdata('nickname',$row->nickname);
				return $row->uid; 
			}	else {
				return -1;	// not activated
			}
		} else {
			return 0;	// not match
		}
	}
	
	
	/**
	 * check user's password
	 * @param int $uid
	 * @param string $password
	 */ 
	function check_user_password_by_id($uid,$password) 
 	{
	 	$this->db->flush_cache();
	 	$this->db->select('uid');
		$data = array('uid' => $uid,'password'=>sha1($password),'status' => 2);
	 	$sel_query = $this->db->get_where('cs_passport',$data);
		return ($sel_query->num_rows() > 0);
	}
	
	
	
	/**
	 * reset user's password
	 * @param string $email
	 * @param string $password
	 * @return bool
	 */ 
	/* function reset_password($email,$password) 
	 {
	 	$data = array('password' => $password);
		$this->db->where('email', $email);
		$this->db->where('status', 2);
		$this->db->update('cs_passport', $data);
	 	return TRUE;
	 }*/
	 
	 
	 /**
	  * change user's password
	  * @param int $uid
	  * @param string $old_password
	  * @param string $new_password
	  * @return bool 
	  */
	 function change_password($uid,$old_password,$new_password) 
	 {
	 	$this->db->flush_cache();
	 	$this->db->where('uid',$uid);
	 	$this->db->where('password',sha1($old_password));
	 	$data = array('password'=>sha1($new_password));
	 	$this->db->update('cs_passport',$data);
	 	/*$this->db->query("UPDATE cs_passport SET password=sha1('$new_password') 
						  WHERE uid=$uid AND password=sha1('$old_password')");*/
	 	if($this->db->affected_rows() == 1) {
	 		return TRUE;
	 	} else {
	 		return FALSE;
	 	}
	 }
	 
	 /**
	  * change user's password
	  * @param int $uid
	  * @param string $password
	  * @return bool 
	  */
	 function reset_password($uid,$password) 
	 {
	 	$this->db->flush_cache();
	 	$this->db->where('uid',$uid);
	 	$data = array('password'=>sha1($password));
	 	$this->db->update('cs_passport',$data);
	 	if($this->db->affected_rows() == 1) {
	 		return TRUE;
	 	} else {
	 		$query = $this->db->get_where('cs_passport',
			 							array('uid'=>$uid, 'password'=>sha1($password)));
			
	 		return ($query->num_rows() > 0);	// 用户存在且输对了密码
	 	}
	 }
	 
	 /**
	  * user logout the site
	  * @return bool
	  */
	  function logout()
	  {
	  	 $this->session->unset_userdata('uid');
	  	 $this->session->sess_destroy();
	  }
	  
   /**
	* The function to grab a random word from dictionary between the two length 
	* @param integer $min_length
	* @param integer $max_length
	* @ignore
	*/
	function get_random_word($min_length, $max_length)
	{
		$len = ($min_length + $max_length) / 2;
		$chars = array(
		    "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",  
		    "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",  
		    "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",  
		    "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",  
		    "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",  
		    "3", "4", "5", "6", "7", "8", "9"
		);
		$charsLen = count($chars) - 1; 
		shuffle($chars);    // 将数组打乱 
		$output = ""; 
		for ($i=0; $i<$len; $i++) { 
		    $output .= $chars[mt_rand(0, $charsLen)]; 
		}
		return $output;
	}
	
	
	/**
	 * send confirm mail
	 * @param int uid
	 * @return bool
	 */ 
	function send_confirm_mail($uid)
	{
		$info = $this->get_info($uid);
		if(!$info || $info->activate == 1) {
			return FALSE;
		}
		$url = $this->config->item('site_index')."/user/confirm/$uid/$info->confirm";
		$subject = "请验证您的邮箱|乐慈网";
		$message = 
			"亲爱的$info->nickname,您好！\n
			 感谢您注册乐慈网。请点击下面的链接，验证您的邮箱：\n
			 <a href=$url>验证邮箱</a>      \n
			 您也可以复制以下链接到您的浏览器地址栏中访问\n
			 $url\n
			 验证成功后，您可以使用邮箱登录乐慈网\n
			 \n
			 乐慈网团队\n
			 --------------------------------\n
			 您收到本邮件是因为您的邮箱在乐慈网注册了。
			 如果您本人并未注册，请直接忽略。本邮件为系统发送，请勿回复。\n";
		$this->send_mail($info->email,$subject,$message);
		return TRUE;
	}
	
	/**
	 * send reset password mail 
	 * @param int $uid
	 * @param string $token
	 * @return bool
	 */ 
	function send_reset_password_mail($uid,$token)
	{
		$info = $this->get_info($uid);
		if(!$info) {
			return FALSE;
		}
		$url = $this->config->item('site_index')."/user/reset_password/$uid/$token";
		$subject = "乐慈网密码重置";
		$message = 
			"亲爱的$info->nickname,您好！\n
			 请点击下面的链接，进入密码重置页面：\n
			 $url      \n
			 重置成功后，您可以使用新密码登录乐慈网\n
			 \n
			 乐慈网团队\n
			 --------------------------------\n
			 您收到本邮件是因为您的邮箱在乐慈网点击了重置密码链接。
		 	 如非本人操作请直接忽略。本邮件为系统发送，请勿回复。\n";
 	 	$this->send_mail($info->email,$subject,$message);
	}
	
	/**
	 * send mail to user
	 * @param string email
	 * @param string subject
	 * @param string message
	 */ 
	function send_mail($email,$subject,$message)
	{
		$this->load->library('email');
		$this->email->from('cishan@blogfound.cn', '乐慈网');
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message); 
		$this->email->send();
	}
    
}
/* End of file user_model.php */
/* Location: ./application/model/user_model.php */