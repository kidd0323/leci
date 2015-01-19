<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Shanghai');
/**
 * User Class
 *
 * @author QiangRunwei <qiangrw@gmail.com>
 * @version	1.0
 */
class User extends CI_Controller {
	function __constructor() 
	{
		parent::__constructor();
	}
	
	/**
	 * 表单验证 用户存在
	 */ 
	function user_check($email)
	{
		$uid = $this->User_model->check_user_exists($email);
		if($uid <= 0){
			$this->form_validation->set_message('user_check', "该邮箱尚未注册");
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	/**
	 * 表单验证 验证码正确
	 */ 
	public function vcode_check()
	{
		if(strtolower($this->input->post('vcode')) !=
			   strtolower($this->session->userdata('vcode'))) {
			$data['error_msg'] = '验证码错误';
			$this->form_validation->set_message('vcode_check', "验证码错误");
			return FALSE;
		}
		return TRUE;
	}
	
	/**
	 * 表单验证 用户名密码匹配
	 */ 
	function password_check()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if($this->User_model->check_user_login() >0 ) {
			$data['error_msg'] = '您已经登录了';
			$this->form_validation->set_message('password_check', "请不要重复登录");
	        return FALSE;
		} else {
			$uid = $this->User_model->check_user_password($email,$password);
			if($uid == -1) {
				$data['error_msg'] = '尚未激活，请到邮箱查收验证信';
				$this->form_validation->set_message('password_check', "尚未激活，请到邮箱查收验证信");
    			return FALSE;
			} elseif($uid == 0) {
				$data['error_msg'] = '用户名密码错误';
				$this->form_validation->set_message('password_check', "用户名密码错误");
			 	return FALSE;
			} else {
				$data['error_msg'] = 'OK';
				return TRUE;
			}
		}
	}
	
	/**
	 * 修改密码时验证原密码是否正确
	 */ 
	function pass_check_by_id()
	{
		$uid = $this->User_model->check_user_login();
		$password = $this->input->post('old_password');
		if($this->User_model->check_user_password_by_id($uid,$password)) {
			return TRUE;
		} else { 
			$this->form_validation->set_message('pass_check_by_id', "原密码错误");
		 	return FALSE;
		}
	}
	
	/**
	 * 修改密码时新密码检查
	 */ 
	function new_password_check() {
		$old_password = $this->input->post('old_password');
		$new_password = $this->input->post('new_password');
		if($new_password == $old_password) {
			$data['error_msg'] = '新密码不能与原密码相同';
			$this->form_validation->set_message('new_password_check', "新密码不能与原密码相同");
	        return FALSE;
		} else {
			return TRUE;
		}
	}
	
		/**
	 * 检查重置密码token有效性
	 */ 
	function token_check()
	{
		$uid = $this->input->post('uid');
		$token = $this->input->post('token');
		if($this->User_model->check_token_valid($uid,$token)){		
			return TRUE;
		} else {
			$this->form_validation->set_message('token_check', "token过期或用户不存在");
			return FALSE;
		}
	}
	
	/**
	 * 检查UID是否存在
	 */
	function uid_check($uid)
	{
		if($this->User_model->check_uid_exists($uid)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('uid_check', "该用户不存在");
			return FALSE;
		}
	} 
	
	

	/**
	 * 登录页面
	 */ 
	public function login()
	{
		// 不能重复登录
		if($this->User_model->check_user_login() > 0){	
			redirect('project','refresh');
			return;
		}
		
		$url = $this->input->get('url');
		if(!$url || $url == '') $url = 'project';
		$data['url'] = $url;
		
		$this->load->library('form_validation');
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '乐慈';
		ob_clean();
		$this->load->view('inc/header',$data);
		$this->load->view('user/login');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 登录表单
	 */ 
	public function submit_login()
	{
		// 不能重复登录
		if($this->User_model->check_user_login() > 0){	
			redirect('project','refresh');
			return;
		}
		$this->load->library('form_validation');
		$config = array(
           array(
                 'field'   => 'email', 
                 'label'   => '邮箱', 
                 'rules'   => 'trim|required|valid_email|xss_clean'
              ),
           array(
                 'field'   => 'password', 
                 'label'   => '密码', 
                 'rules'   => 'trim|required|xss_clean|callback_password_check'
              )
        );
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			$data['error_msg'] = validation_errors();
	 	} else {
	 		$data['error_msg'] = 'OK';
			$url = $this->input->get_post('url');
			if(!$url || $url == '') $url = 'project';
			redirect($url, 'refresh');
			return;
	 	}
	 	if(!$this->input->is_ajax_request()){
			$this->login();
		} else {
			echo json_encode($data);	
		}
	}

	/**
	 * 用户注销
	 */ 
	public function logout()
	{
		$this->User_model->logout();
		$data['error_msg'] = 'OK';
		redirect('user/login/', 'refresh');
	}
	
	/**
	 * 注册页面
	 */ 
	public function register() 
	{
		//检查用户是否登录,已经登录则跳转到主页
		if($this->User_model->check_user_login() > 0){	
			redirect('project','refresh');
			return;
		}
		
		$this->load->library('form_validation');
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '注册新账号 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('user/register');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 注册表单确认
	 */ 
	public function submit_register() 
	{
		if($this->User_model->check_user_login() > 0) {
			$data['error_msg'] = '请先注销后再尝试该操作.';
			if($this->input->is_ajax_request()){
				echo json_encode($data);
			} else {
				$this->show_note($data['error_msg']);
			}
			return;
		}
		$this->load->library('form_validation');
		$config = array(
           array(
                 'field'   => 'email', 
                 'label'   => '邮箱', 
                 'rules'   => 'trim|required|valid_email|max_length[255]|xss_clean|is_unique[cs_passport.email]'
              ),
           array(
                 'field'   => 'password',
                 'label'   => '密码',
                 'rules'   => 'required|min_length[6]|max_length[12]|alpha_numeric|xss_clean'
              ),
           array(
                 'field'   => 'password_conf',
                 'label'   => '密码确认',
                 'rules'   => 'required|matches[password]'
              ),
           array(
                 'field'   => 'nickname',
                 'label'   => '昵称',
                 'rules'   => 'trim|required|min_length[1]|max_length[12]|xss_clean'
              ),
           array(
                 'field'   => 'vcode',
                 'label'   => '验证码',
                 'rules'   => 'trim|required|callback_vcode_check'
              ),
           array(
                 'field'   => 'checkbox',
                 'label'   => '同意协议',
                 'rules'   => 'trim|required'
              )
        );
        $this->form_validation->set_rules($config);
        $data = array();
		if ($this->form_validation->run() == FALSE) {
			$data['error_msg'] = validation_errors();
		} else {
			$email = $this->input->post('email');
			$nickname = $this->input->post('nickname');
			$password = $this->input->post('password');
			
			$this->db->trans_start();
			$time = time();
			$confirm = $this->User_model->generate_confirm_code();
			$uid = $this->Globalid->get_insert_id('uid');
			$this->User_model->insert_passport($uid,$email,$nickname,$password,$confirm,$time,$time);
			$this->User_model->send_confirm_mail($uid);
			$this->db->trans_complete();
			$data['error_msg'] = 'OK';	//恭喜你，注册成功,请到邮箱验证
			
			if(!$this->input->is_ajax_request()){
				$this->show_note('恭喜注册成功，请到您的邮箱查收验证邮件.','注册成功');
				return;
			}
		}
		if($this->input->is_ajax_request()){
			echo json_encode($data);
		} else {
			$this->register();	
		}
	}
	
	
	/**
	 * 用户验证页面
	 */ 
	public function confirm($uid,$code)
	{
		$uid = trim(addslashes($uid));
		$code = trim(addslashes($code));
		if($this->User_model->confirm_user($uid,$code)) {
			$data['note'] = '激活成功,现在您可以正常登录了.';
		} else{
			$data['note'] = '用户不存在或者该用户已经成功激活了.';
		}
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '用户验证 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('user/note');
		$this->load->view('inc/footer');
	}
	
	
	/**
	 * 忘记密码页面
	 */
	public function forget_password()
	{
		$this->load->library('form_validation');
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '忘记密码 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('user/forget_password');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 忘记密码表单提交 FORM/AJAX
	 */ 
	function submit_forget_password ()
	{
		if($this->User_model->check_user_login() > 0) {
			$data['error_msg'] = '请先注销后再尝试该操作.';
			if($this->input->is_ajax_request()){
				echo json_encode($data);
			} else {
				$this->show_note($data['error_msg']);
			}
			return;
		}
		$this->load->library('form_validation');
		$config = array(
           array(
                 'field'   => 'email', 
                 'label'   => '邮箱地址', 
                 'rules'   => 'trim|valid_email|required|xss_clean|callback_user_check'
              ),
           array(
                 'field'   => 'vcode', 
                 'label'   => '验证码', 
                 'rules'   => 'trim|required|callback_vcode_check'
              )
  		);
  		$this->form_validation->set_rules($config);
  		if ($this->form_validation->run() == FALSE) {
			$data['error_msg'] = validation_errors();
		}  else {
			$email = $this->input->post('email');
			$this->db->trans_start();
			$uid = $this->User_model->check_user_exists($email);
			$tkid = $this->Globalid->get_insert_id('tkid');
			$token = $this->User_model->generate_token($tkid,$uid);
			$this->User_model->send_reset_password_mail($uid,$token);
			$this->db->trans_complete();
			$data['error_msg'] = 'OK';
			if(!$this->input->is_ajax_request()){
				$this->show_note('密码重置链接已经成功发送到您的邮箱了，请尽快查收.');
				return;
			}
		}
		if($this->input->is_ajax_request()){
			echo json_encode($data);
		} else {
			$this->forget_password();	
		}
	}
	
	
	/**
	 * 重置密码页面 FORM-ONLY
	 */
	function reset_password($uid,$token)
	{
		$uid = trim(addslashes($uid));
		$token = trim(addslashes($token));
		
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '重置密码 | 乐慈';
		$this->load->view('inc/header',$data);
  		if($this->User_model->check_user_login()>0){
			$data['note'] = '哎呀，您已经成功登录了，请注销后尝试该操作';
			$this->load->view('user/note',$data);	
		} elseif($this->User_model->check_token_valid($uid,$token)) {
			$data['uid'] = $uid;
			$data['token'] = $token;
			$this->load->view('user/reset_password',$data);
		} else {
			$data['note'] = '抱歉，token已经失效或者用户不存在.请进入'.
			'<a href="./index.php/user/forget_password">忘记密码页面</a>重新生成token';
			$this->load->view('user/note',$data);
		}
		$this->load->view('inc/footer');
	}
	
	/**
	 * 重置密码表单提交 AJAX ONLY
	 */ 
	function submit_reset_password()
	{
		if($this->User_model->check_user_login() > 0) {
			$data['error_msg'] = '请先注销后再尝试该操作.';
			if($this->input->is_ajax_request()){
				echo json_encode($data);
			} else {
				$this->show_note($data['error_msg']);
			}
			return;
		}
		
		$this->load->library('form_validation');
		$config = array(
           array(
                 'field'   => 'password', 
                 'label'   => '密码',
                 'rules'   => 'required|min_length[6]|max_length[20]|xss_clean'
              ),
           array(
                 'field'   => 'password_confirm',
                 'label'   => '密码确认',
                 'rules'   => 'required|matches[password]'
              ),
           array(
                 'field'   => 'token',
                 'label'   => 'token',
                 'rules'   => 'required|callback_token_check'
              ),
           array(
                 'field'   => 'uid',
                 'label'   => 'uid',
                 'rules'   => 'required|callback_uid_check'
              ),
        );
        $uid = $this->input->post('uid');
		$token = $this->input->post('token');
        $this->form_validation->set_rules($config);
        $data = array();
		if ($this->form_validation->run() == FALSE) {
			$data['error_msg'] = validation_errors();
		} else {
			$password = $this->input->post('password');	
			$this->db->trans_start();
			if($this->User_model->reset_password($uid,$password)){
				$this->User_model->del_token($uid,$token);		//删除token
				$this->db->trans_complete();
				$data['error_msg'] = 'OK';
				if(!$this->input->is_ajax_request()){
					$this->show_note('密码重置成功，您可以用新密码登录了.');
					return;
				}
			} else {
				$data['error_msg'] = '密码重置失败，请稍后再试';
				$this->db->trans_complete();
				if(!$this->input->is_ajax_request()){
					$this->show_note('密码重置失败，请稍后再试.');
					return;
				}
			}
		}
		echo json_encode($data);	#AJAX ONLY
	}
	
	/**
	 * 提醒页面
	 */ 
	function show_note($note,$title='乐慈'){
		ob_clean();
		$data['note'] = $note;
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = $title;
		$this->load->view('inc/header',$data);
		$this->load->view('user/note');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 重发确认信页面
	 */ 
	function resend_confirm_mail() 
	{
		$this->load->library('form_validation');
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('user/resend_confirm_mail');
		$this->load->view('inc/footer');
	}
	
	
	/**
	 * 重发确认信表单确认 FORM/AJAX
	 */
	function submit_resend_confirm_mail()
	{
		if($this->User_model->check_user_login() > 0) {
			$data['error_msg'] = '请先注销后再尝试该操作.';
			if($this->input->is_ajax_request()){
				echo json_encode($data);
			} else {
				$this->show_note($data['error_msg']);
			}
			return;
		}
		$this->load->library('form_validation');
		$config = array(
           array(
                 'field'   => 'email', 
                 'label'   => '邮箱地址', 
                 'rules'   => 'trim|valid_email|required|xss_clean|callback_user_check'
              ),
           array(
                 'field'   => 'vcode',
                 'label'   => '验证码',
                 'rules'   => 'trim|required|callback_vcode_check'
           	)
  		);
  		$this->form_validation->set_rules($config);
  		if ($this->form_validation->run() == FALSE) {
			$data['error_msg'] = validation_errors();
			if($this->input->is_ajax_request()){ 
				echo json_encode($data);
			} else {
				$this->resend_confirm_mail();
			}
		} else {
			$email = $this->input->post('email');
			$uid = $this->User_model->check_user_exists($email);
			if(!$this->User_model->send_confirm_mail($uid)) {
				$data['error_msg'] = '您已经激活了，不需要再发确认信了.';
				if($this->input->is_ajax_request()){ 
					echo json_encode($data);
				} else {
					$this->show_note($data['error_msg']);
				}
			} else {
				$data['error_msg'] = 'OK';
				if($this->input->is_ajax_request()){
					echo json_encode($data);
				} else {
					$this->show_note('验证链接已经发送至您的注册邮箱'.$email.'，请查收.');
				}
			}
		}
	}
	
	/**
	 * 用户信息页面
	 */ 
	function info()
	{
		//检查用户是否登录
		if($this->User_model->check_user_login() <= 0){	
			redirect('user/login?url=user/info','refresh');
			return;
		}
		// 目前仅能查看自己的信息
		$uid = $this->session->userdata('uid');
		$uid = trim(addslashes($uid));
		$data['user_info'] = $this->User_model->get_info($uid);
		$data['detail_info'] = $this->User_model->get_detail_info($uid);
		if(!$data['detail_info']) {
			$data['detail_info']->realname = "";
			$data['detail_info']->phone = "";
			$data['detail_info']->idcard = "";
			$data['detail_info']->province = 0;
			$data['detail_info']->province_name = '请选择省';
			$data['detail_info']->city = 0;
			$data['detail_info']->city_name = '请选择市';
			$data['detail_info']->district = 0;
			$data['detail_info']->district_name = '请选择地区';
			$data['detail_info']->photo = 'default.jpg';
		}
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '我的资料 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('user/info');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 修改用户详细资料 AJAX-ONLY
	 */ 
	public function submit_edit_detail_info()
	{
		$this->load->library('form_validation');
		$config = array(
			array(
                 'field'   => 'uid', 
                 'label'   => '用户ID', 
                 'rules'   => 'trim|required|integer|xss_clean'
              ),
			array(
                 'field'   => 'c_realname', 
                 'label'   => '联系人真实姓名', 
                 'rules'   => 'trim|required|min_length[2]|max_length[32]|xss_clean'
              ),
           array(
                 'field'   => 'c_phone', 
                 'label'   => '联系人联系方式', 
                 'rules'   => 'trim|required||max_length[16]|xss_clean'
              ),
           array(
                 'field'   => 'c_idcard', 
                 'label'   => '联系人身份证号', 
                 'rules'   => 'trim|required||max_length[32]|xss_clean'
              ),
           array(
                 'field'   => 'c_province', 
                 'label'   => '联系人所在省份', 
                 'rules'   => 'trim|required|integer|is_natural_no_zero|xss_clean'
              ),
           array(
                 'field'   => 'c_city', 
                 'label'   => '联系人所在城市', 
                 'rules'   => 'trim|required|integer|is_natural_no_zero|xss_clean'
              ),
           array(
                 'field'   => 'c_district', 
                 'label'   => '联系人所在地区', 
                 'rules'   => 'trim|required|integer|is_natural_no_zero|xss_clean'
              )
		);
		$uid = $this->User_model->check_user_login();
		if($uid != $this->input->get_post('uid')) {
			$data['error_msg'] = 'Permission Denied.';
			echo json_encode($data);
			return;
		}
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
			$data['error_msg'] = validation_errors();
		} else {
			$c_idcard = $this->input->post('c_idcard');
			$c_realname = $this->input->post('c_realname');
			$c_phone = $this->input->post('c_phone');
			$c_province = $this->input->post('c_province');
			$c_city = $this->input->post('c_city');
			$c_district = $this->input->post('c_district');
			if($this->User_model->edit_user_info($uid,$c_idcard,$c_realname,$c_phone,$c_province,
											$c_city,$c_district)) {
				$data['error_msg'] = 'OK';									
			} else {
				$data['error_msg'] = '您没有做出任何修改';
			}
		}
		echo json_encode($data);
	}
	
	/**
	 * 上传头像页面
	 */ 
	function upload_photo()
	{
		if($this->User_model->check_user_login() <= 0) {
			redirect('user/login?url=user/upload_photo','refresh');
			return;
		}
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '上传头像 | 乐慈';
		$data['error_msg'] = '*添加小于2M的JPG或者PNG图片，最大宽度(高度)为1024px';
		$this->load->view('inc/header',$data);
		$this->load->view('user/upload_photo');
		$this->load->view('inc/footer');
	}
	
	function crop_photo()
	{
		$config['upload_path'] = "./uploads/user";
  		$config['allowed_types'] = 'jpg|png|jpeg';
	 	$config['max_size'] = 2 * 1024;
		$config['max_width'] = 1024;
		$config['max_height'] = 1024;
		$config['encrypt_name'] = 'TRUE';	// 重命名文件为加密字符串
		$this->load->library('upload', $config);
		$filefield = 'file';
		if (is_uploaded_file($_FILES[$filefield]['tmp_name']) ) {
			$upload_ret = $this->upload->do_upload($filefield);
			if(!$upload_ret){
				ob_clean();
				$data['active'] = array('inactive','inactive','inactive');
				$data['title'] = '上传头像 | 乐慈';
				$data['error_msg'] = $this->upload->display_errors('','');
				$this->load->view('inc/header',$data);
				$this->load->view('user/upload_photo');
				$this->load->view('inc/footer');
			} else {
				$file_info = $this->upload->data();
				$data['pic'] = $file_info['file_name'];
				$data['full_path'] = $file_info['full_path'];
				ob_clean();
				$data['active'] = array('inactive','inactive','inactive');
				$data['title'] = '截取头像 | 乐慈';
				$this->load->view('inc/header',$data);
				$this->load->view('user/crop_photo');
				$this->load->view('inc/footer');
			}
		} else {
			ob_clean();
			$data['active'] = array('inactive','inactive','inactive');
			$data['title'] = '上传头像 | 乐慈';
			$data['error_msg'] = '您添加的条件部分符合要求:小于2M的JPG或者PNG图片，最大宽度(高度)为1024px';
			$this->load->view('inc/header',$data);
			$this->load->view('user/upload_photo');
			$this->load->view('inc/footer');
		}
	}
	
	// 截取用户小图像
	private function _resize_thumbnail_image($thumb_image_name, $image, $width, $height, 
  										$start_width, $start_height, $scale){
		list($imagewidth, $imageheight, $image_type) = getimagesize($image);
		$image_type = image_type_to_mime_type($image_type);
		$new_image_width = ceil($width * $scale);
		$new_image_height = ceil($height * $scale);
		$new_image = imagecreatetruecolor($new_image_width,$new_image_height);
		switch($image_type) {
			case "image/gif":
				$source=imagecreatefromgif($image); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image); 
				break;
			case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image); 
				break;
		}
		imagecopyresampled($new_image,$source,0,0,$start_width,$start_height,
								$new_image_width,$new_image_height,$width,$height);
		switch($image_type) {
			case "image/gif":
				imagegif($new_image,$thumb_image_name); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				imagejpeg($new_image,$thumb_image_name,90); 
				break;
			case "image/png":
			case "image/x-png":
				imagepng($new_image,$thumb_image_name);  
				break;
		}
		chmod($thumb_image_name, 0777);
		return $thumb_image_name;
	  }
	
	function submit_crop_photo()
	{
		$uid = $this->User_model->check_user_login();
		if( $uid <= 0){	
			redirect('user/login','refresh');
			return;
		}
		$x1 = $this->input->get_post("x1");
        $y1 = $this->input->get_post("y1");
        $x2 = $this->input->get_post("x2");
        $y2 = $this->input->get_post("y2");
		$fullpath = $this->input->get_post('full_path');
		$photo = $this->input->get_post('photo');
        $w = $x2 - $x1;
        $h = $y2 - $y1;
		if(!$w || !$h) {
			if($this->input->is_ajax_request()) {
				echo 0;
			} else {
				$this->User_model->show_note('抱歉，上传头像失败，请稍后再试');
			}
			return;
		}
		$cropped = $this->_resize_thumbnail_image($fullpath, $fullpath,$w, $h, $x1, $y1, 1);
		if($cropped) {
			$this->User_model->edit_user_photo($uid,$photo);
			if($this->input->is_ajax_request()) {
				echo 1;
			} else {
				redirect('user/info','refresh');
			}
		} else {
			if($this->input->is_ajax_request()) {
				echo 0;
			} else {
				$this->User_model->show_note('抱歉，上传头像失败，请稍后再试');
			}
		}
	}
	
	
	/**
	 * 修改密码页面
	 */ 
	function change_password()
	{
		$this->load->library('form_validation');
		// 用户尚未登录
		if($this->User_model->check_user_login() <= 0){	
			redirect('user/login?url=user/change_password','refresh');
		}
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '我的资料 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('user/change_password');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 修改密码表单提交 FORM/AJAX
	 */
	function submit_change_password()
	{	
		// 用户尚未登录
		$uid = $this->User_model->check_user_login();
		if($uid <= 0){
			if($this->input->is_ajax_request()) {
				$data['error_msg'] = '您尚未登录';
				echo json_encode($data);
			} else {
				redirect('user/login','refresh');
			}
			return;
		}
		$this->load->library('form_validation');
		$config = array(
           array(
                 'field'   => 'old_password', 
                 'label'   => '原密码',
                 'rules'   => 'required|min_length[6]|max_length[20]|alpha_numeric|xss_clean|callback_pass_check_by_id'
              ),
           array(
                 'field'   => 'new_password',
                 'label'   => '新密码',
                 'rules'   => 'required|min_length[6]|max_length[20]|alpha_numeric|xss_clean|callback_new_password_check'
              ),
           array(
                 'field'   => 'new_password_confirm',
                 'label'   => '新密码确认',
                 'rules'   => 'required|matches[new_password]'
              )
        );
        $this->form_validation->set_rules($config);
        $data = array();
		if ($this->form_validation->run() == FALSE) {
			$data['error_msg'] = validation_errors();
		} else {
			$old_password = $this->input->post('old_password');
			$new_password = $this->input->post('new_password');
			//$this->db->trans_start();
			$this->User_model->change_password($uid,$old_password,$new_password);
			$data['error_msg'] = 'OK';
			//$this->db->trans_complete();
			if(!$this->input->is_ajax_request()){
				$this->show_note('密码修改成功，下次您可以用新密码登录了.');
				return;
			}
		}
		if($this->input->is_ajax_request()){
			echo json_encode($data);
		} else {
			$this->change_password();
		}
	}
	
	
	public function notification($page = 1)
	{
		$uid = $this->User_model->check_user_login();
		if($uid <= 0) {
			redirect('user/login?url=/user/notification','refresh');
			return;
		}
		$this->load->library('pagination');
		$this->load->config('pagination');
		$per_page = $this->config->item('notification_per_page');
		$data['notification_list'] = $this->Notification_model->get_notification_list($uid,$page,$per_page);
		
		$config['base_url'] = "index.php/user/notification/";
		$config['use_page_numbers'] = TRUE;
		$config['uri_segment'] = 3;
		$config['total_rows'] = $this->Notification_model->get_notification_count($uid);
		$config['per_page'] = $per_page;
		$config['cur_page'] = $page;
		$this->pagination->initialize($config);
		
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '我的资料 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('user/notification');
		$this->load->view('inc/footer');
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */