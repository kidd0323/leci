 <?php

/**
 * Project Model Class
 *
 * @author QiangRunwei <qiangrw@gmail.com>
 * @version	1.0
 */

class Project_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	
	/**
	 * 获取头图
	 */
	function get_header_pic($num) {
		$this->db->flush_cache();
		$this->db->where('status',2);
		$this->db->order_by('modify_time','desc');			//按修改时间逆序
		$this->db->limit($num);
		$query = $this->db->get_where('cs_head_picture');
		if($query->num_rows() <= 0) return NULL;
		$head_pics = array();
		foreach($query->result() as $row) {
			$info = NULL;
			$info->pid = $row->pid;
			if($info->pid != 0) {
				$project_info = $this->get_project_info($info->pid);
				$info->title =  $project_info->title;
				$info->short_description =  $project_info->short_description;
			}
			else $info->title = "";
			$info->pic_url = $row->pic_url;
			$head_pics []= $info;
		}
		return $head_pics;
	}
	
	
	
	/**
	 * Project_model::insert_donate()
	 * 插入捐款记录
	 * 
	 * @param int $did
	 * @param int $type
	 * @param int $uid
	 * @param int $anonymous
	 * @param int $pid
	 * @param int $money
	 * @param string $name
	 * @param string $phone
	 * @param int $process
	 * @param string $provider
	 * @param string $bank
	 * @return bool
	 */
	function insert_donate($did,$type,$uid,$anonymous,$pid,$invoice_id,$money,$name,$phone,$process,$provider,$bank)
	{
		$time = time();
		$data = array(	'did' => $did,
						'type' => $type,
						'uid' => $uid,
						'anonymous' => $anonymous,
						'pid' => $pid,
						'invoice_id' => $invoice_id,
						'money' => $money,
						'name' => $name,
						'phone' => $phone,
						'process' => $process,
						'provider' => $provider,
						'bank' => $bank,
						'create_time' => $time,
						'modify_time' => $time,
						'status' => 2
					);
		$this->db->flush_cache();
		$this->db->insert('cs_donate',$data);
		return ($this->db->affected_rows());
	}
	

	/**
	 * Project_model::insert_possession()
	 * 插入捐款需求
	 * 
	 * @param int $poss_id
	 * @param string $account_name
	 * @param string $account_id
	 * @param string $bank_name
	 * @param int $target_money
	 * @return bool
	 */
	function insert_possession($poss_id, $account_name, $account_id, $bank_name, $target_money)
	{
		$time = time();
		$data = array('poss_id' => $poss_id, 'account_name' => $account_name,
			'account_id' => $account_id, 'bank_name' => $bank_name, 'target_money' => $target_money,
			'create_time' => $time, 'modify_time' => $time, 'status' => 2, );
		$this->db->flush_cache();
		$this->db->insert('cs_possession', $data);
		return ($this->db->affected_rows() == 1);
	}

	/**
	 * Project_model::insert_item()
	 * 插入捐物需求
	 * 
	 * @param int $iid
	 * @param string $receiver
	 * @param string $address
	 * @param string $zip_code
	 * @param string $phone
	 * @return bool
	 */
	function insert_item($iid, $receiver, $address, $zip_code, $phone)
	{
		$time = time();
		$data = array('iid' => $iid, 'receiver' => $receiver, 'address' => $address,
			'zip_code' => $zip_code, 'phone' => $phone, 'create_time' => $time,
			'modify_time' => $time, 'status' => 2, );
		$this->db->flush_cache();
		$this->db->insert('cs_item', $data);
		return ($this->db->affected_rows() == 1);
	}


	/**
	 * Project_model::insert_volunteer_info()
	 * 插入志愿者招募需求
	 * 
	 * @param int $vi_id
	 * @param int $number
	 * @return
	 */
	function insert_volunteer_info($vi_id, $number)
	{
		$time = time();
		$data = array('vi_id' => $vi_id, 'now_number' => 0, 'number' => $number,
			'create_time' => $time, 'modify_time' => $time, 'status' => 2, );
		$this->db->flush_cache();
		$this->db->insert('cs_volunteer_info', $data);
		return ($this->db->affected_rows() == 1);
	}

	/**
	 * Project_model::insert_volunteer()
	 * 插入新志愿者信息
	 * 
	 * @param int $vid
	 * @param int $pid
	 * @param int $uid
	 * @param string $realname
	 * @param string $phone
	 * @param string $idcard
	 * @param int $province
	 * @param int $city
	 * @param int $district
	 * @param string $description
	 * @return bool
	 */
	function insert_volunteer($vid, $pid, $uid, $realname, $phone, $idcard, $province,
		$city, $district, $description)
	{
		$time = time();
		$data = array('vid' => $vid, 'pid' => $pid, 'uid' => $uid, 'realname' => $realname,
			'phone' => $phone, 'idcard' => $idcard, 'province' => $province, 'city' => $city,
			'district' => $district, 'description' => $description, 'create_time' => $time,
			'modify_time' => $time, 'status' => 2, //默认审核尚未通过
			);
		$this->db->flush_cache();
		$this->db->insert('cs_volunteer', $data);
		return ($this->db->affected_rows() == 1);
	}

	/**
	 * Project_model::insert_project()
	 * 插入新项目
	 * 
	 * @param int $pid
	 * @param int $uid
	 * @param string $title
	 * @param int $cid
	 * @param int $oid
	 * @param string $assist_object
	 * @param int $province
	 * @param int $city
	 * @param int $district
	 * @param int $start_time
	 * @param int $end_time
	 * @param int $poss_id
	 * @param int $iid
	 * @param int $vi_id
	 * @param string $pic_url
	 * @param string $application_file
	 * @param string $description
	 * @return
	 */
	function insert_project($pid, $uid, $title, $cid, $oid, $assist_object, $province,
		$city, $district, $start_time, $end_time, $poss_id, $iid, $vi_id, $pic_url, $application_file,
		$short_description, $description)
	{
		$time = time();
		$data = array('pid' => $pid, 'uid' => $uid, 'title' => $title, 'cid' => $cid,
			'oid' => $oid, 'assist_object' => $assist_object, 'province' => $province,
			'city' => $city, 'district' => $district, 'start_time' => strtotime($start_time),
			'end_time' => strtotime($end_time), 'poss_id' => $poss_id, 'iid' => $iid,
			'vi_id' => $vi_id, 'picurl' => $pic_url, 'application_file' => $application_file,
			'short_description' => $short_description, 'description' => $description,
			'support' => 0, 'create_time' => $time, 'modify_time' => $time, 'status' => 2, );
		$this->db->flush_cache();
		$this->db->insert('cs_project', $data);
		return ($this->db->affected_rows() == 1);
	}

	/**
	 * Project_model::insert_message()
	 * 插入新留言
	 * 
	 * @param int $mid
	 * @param int $uid
	 * @param int $pid
	 * @param int $anonymous
	 * @param string $content
	 * @param int $announce
	 * @return
	 */
	function insert_message($mid, $uid, $pid, $anonymous, $content, $announce)
	{
		$time = time();
		$data = array('mid' => $mid, 'uid' => $uid, 'pid' => $pid, 'anonymous' => $anonymous,
			'content' => $content, 'announce' => $announce, 'create_time' => $time,
			'modify_time' => $time, 'status' => 2, );
		$this->db->flush_cache();
		$this->db->insert('cs_message', $data);
		return ($this->db->affected_rows() == 1);
	}


	/**
	 * Project_model::insert_sponsor_feedback()
	 * 发起者插入反馈
	 * 
	 * @param int $sfb_id
	 * @param int $uid
	 * @param int $pid
	 * @param string $fb_pic
	 * @param string $fb_content
	 * @return bool
	 */
	function insert_sponsor_feedback($sfb_id, $uid, $pid, $fb_pic, $fb_content)
	{
		$time = time();
		$data = array('sfb_id' => $sfb_id, 'uid' => $uid, 'pid' => $pid, 'fb_pic' => $fb_pic,
			'fb_content' => $fb_content, 'create_time' => $time, 'modify_time' => $time,
			'status' => 2, );
		$this->db->flush_cache();
		$this->db->insert('cs_sponsor_feedback', $data);
		return ($this->db->affected_rows() == 1);
	}
	
	/**
	 * Project_model::del_sponsor_feedback()
	 * 删除发起者的某条反馈
	 * 
	 * @param int $sfb_id
	 * @param int $uid
	 * @param int $pid
	 * @return
	 */
	function del_sponsor_feedback($sfb_id,$uid,$pid)
	{
		$this->db->flush_cache();
		$this->db->where('sfb_id',$sfb_id)->where('uid',$uid)->where('pid',$pid);
		$data = array('status' => 1); //删除
		$this->db->update('cs_sponsor_feedback',$data);
		return ($this->db->affected_rows() == 1);
	}
	
	
	
	/**
	 * Project_model::del_volunteer_feedback()
	 * 删除志愿者的某条反馈
	 * 
	 * @param mixed $vfb_id
	 * @param mixed $pid
	 * @return
	 */
	function del_volunteer_feedback($vfb_id,$pid)
	{
		$this->db->flush_cache();
		$this->db->where('vfb_id',$vfb_id)->where('pid',$pid);
		$data = array('status' => 1); //删除
		$this->db->update('cs_volunteer_feedback',$data);
		return ($this->db->affected_rows() == 1);
	}
	
	/**
	 * 项目详情页显示-获取发起者反馈
	 * 
	 * @param int $pid
	 * @return array $feedback
	 */ 
	function get_sponsor_feedback_list($pid) 
	{
		$this->db->flush_cache();
		$this->db->where('pid',$pid)->where('status !=',1)->order_by('modify_time','desc');
		$query = $this->db->get('cs_sponsor_feedback');
		if($query->num_rows() == 0) return NULL;
		$feedback = array();
		foreach($query->result() as $row) {
			$row->create_time = date('Y-m-d H:i:s', $row->create_time);
			$row->nickname = $this->User_model->get_info($row->uid)->nickname;
			$row->pics = explode(',', $row->fb_pic);
			array_pop($row->pics);
			$feedback []= $row;
		}
		return $feedback;
	}
	
	/**
	 * 项目详情页面显示-获取志愿者反馈
	 * @param int $pid
	 * @return array $feedback
	 */ 
	function get_volunteer_feedback_list($pid) 
	{
		$this->db->flush_cache();
		$this->db->where('pid',$pid)->where('status',3)->order_by('modify_time','desc');
		$query = $this->db->get('cs_volunteer_feedback');
		if($query->num_rows() == 0) return NULL;
		$feedback = array();
		foreach($query->result() as $row) {
			$row->create_time = date('Y-m-d H:i:s', $row->create_time);
			$row->nickname = $this->User_model->get_info($row->uid)->nickname;
			$row->pics = explode(',', $row->fb_pic);
			array_pop($row->pics);
			$feedback []= $row;
		}
		return $feedback;
	}

	/**
	 * Project_model::insert_volunteer_feedback()
	 * 插入志愿者反馈
	 * 
	 * @param int $vfb_id
	 * @param int $uid
	 * @param int $pid
	 * @param string $fb_pic
	 * @param string $fb_content
	 * @return bool
	 */
	function insert_volunteer_feedback($vfb_id, $uid, $pid, $fb_pic, $fb_content)
	{
		$time = time();
		$data = array('vfb_id' => $vfb_id, 'uid' => $uid, 'pid' => $pid, 'fb_pic' => $fb_pic,
			'fb_content' => $fb_content, 'create_time' => $time, 'modify_time' => $time,
			'status' => 2, );
		$this->db->flush_cache();
		$this->db->insert('cs_volunteer_feedback', $data);
		return ($this->db->affected_rows() == 1);
	}

	/**
	 * 获取志愿者反馈信息
	 * @param int pid
	 * @return array
	 */ 
	public function get_volunteer_feedback($pid)
	{
		$uid = $this->User_model->check_user_login();
		if (!$this->is_project_sponsor($uid, $pid))
			return NULL;
		$this->db->flush_cache();
		$this->db->where('pid', $pid)->where('status !=', 1);
		$query = $this->db->get_where('cs_volunteer_feedback');
		if ($query->num_rows() == 0)
			return NULL;
		$vfeedback_list = array();
		foreach ($query->result() as $row) {
			$info = $row;
			$info->create_time = date('Y-m-d H:i:s', $row->create_time);
			$info->nickname = $this->User_model->get_info($row->uid)->nickname;
			$row->pics = explode(',', $row->fb_pic);
			array_pop($row->pics);
			$feedback []= $row;
			$vfeedback_list[] = $info;
		}
		return $vfeedback_list;
	}

	/**
	 * 审核志愿者反馈信息
	 * @param int $pid
	 * @param int $vfb_id
	 * @param int $action	2:不发布 3:发布
	 * @return bool
	 */ 
	function verify_vfeedback($pid, $vfb_id, $action)
	{
		$uid = $this->User_model->check_user_login();
		if (!$this->is_project_sponsor($uid, $pid))
			return false;
		$data = array('status' => $action);
		$this->db->flush_cache();
		$this->db->where('vfb_id', $vfb_id);
		$this->db->update('cs_volunteer_feedback', $data);
		return ($this->db->affected_rows() == 1);
	}

	/**
	 * Project_model::insert_invoice()
	 * 插入发票信息
	 * 
	 * @param int $invoice_id
	 * @param int $type
	 * @param int $money
	 * @param string $address
	 * @param string $zip_code
	 * @param string $receiver
	 * @param string $title
	 * @param string $phone
	 * @param string $number
	 * @param int $pid
	 * @param int $uid
	 * @param int $create_time
	 * @param int $modify_time
	 * @return bool
	 */
	function insert_invoice($invoice_id, $type,$money,$address, $zip_code, $receiver, $title, $phone, $number,
						$pid,$uid)
	{
		$time = time();
		$data = array('invoice_id' => $invoice_id, 'type' => $type,'money' => $money,
			 'address' => $address, 'zip_code' => $zip_code, 'receiver' => $receiver,
			 'title' => $title, 'phone' => $phone, 'number' => $number,'pid' => $pid, 'uid' => $uid,
			'create_time' => $time, 'modify_time' => $time,'status' => 2, );
		$this->db->flush_cache();
		$this->db->insert('cs_invoice', $data);
		return ($this->db->affected_rows() == 1);
	}


	/**
	 * Project_model::support_project()
	 * 支持项目
	 * 
	 * @param int $uid
	 * @param int $pid
	 * @return bool
	 */
	function support_project($uid, $pid)
	{
		$time = time();
		$data = array('uid' => $uid, 'pid' => $pid, 'create_time' => $time,
			'modify_time' => $time, 'status' => 2, );
		$this->db->flush_cache();
		$this->db->insert('cs_support', $data);
		if ($this->db->affected_rows() != 1)
			return false;
		$this->db->flush_cache();
		$this->db->query("UPDATE cs_project SET support=support+1 WHERE pid=$pid");
		return ($this->db->affected_rows() == 1);
	}


	/**
	 * Project_model::get_project_info()
	 * 获取项目基本信息
	 * 
	 * @param mixed $pid
	 * @return object $info
	 */
	 //此处有坑
	function get_project_info($pid)
	{
		$data = array('pid' => $pid, 'status !=' => 1, 'status !=' => 5);
		$this->db->flush_cache();
		$query = $this->db->get_where('cs_project', $data, 1);
		if ($query->num_rows() != 1)
			return NULL;
		$info = $query->row();
		//根据时间判断真实状态
		$time = time();
		if($info->status == 3 && $info->end_time < $time - 60*60*24) {	//进行中项目如果时间已经结束
			$info->status = 4;	//改为已经结束状态
		}
		
		$info->start_time = date('Y-m-d', $info->start_time);
		$info->end_time = date('Y-m-d', $info->end_time);
		$info->category = $this->get_category_name($info->cid);
		$oinfo = $this->get_organization_info($info->oid);
		$info->oname = $oinfo->oname;
		$info->parent_fund = $oinfo->parent_fund;
		//$info->uname = $this->User_model->get_info($info->uid)->nickname;
		$info->uname = $this->User_model->get_detail_info($info->uid)->realname;
		$info->pics = preg_split("/[,]+/",$info->picurl, 6);
		$this->load->model('Utility_model');
		$info->address = $this->Utility_model->get_address($info->province, $info->city,
			$info->district, ' ');
		if ($info->poss_id != 0) {
			$poss = $this->get_possesion_info($info->poss_id);
			$info->now_money = $poss->now_money / 100.0;
			$info->target_money = $poss->target_money / 100.0;
		}
		return $info;
	}

	/**
	 * Project_model::get_possesion_info()
	 * 获取项目捐钱信息
	 * @param int $poss_id
	 * @return object
	 */
	function get_possesion_info($poss_id)
	{
		$data = array('poss_id' => $poss_id, 'status' => 2);
		$this->db->flush_cache();
		$query = $this->db->get_where('cs_possession', $data);
		if ($query->num_rows() != 1)
			return NULL;
		return $query->row();
	}

	/**
	 * Project_model::get_item_info()
	 * 获取项目捐物信息
	 * @param int $iid
	 * @return object
	 */
	function get_item_info($iid)
	{
		$data = array('iid' => $iid, 'status' => 2);
		$this->db->flush_cache();
		$query = $this->db->get_where('cs_item', $data);
		if ($query->num_rows() != 1)
			return NULL;
		return $query->row();
	}

	/**
	 * Project_model::get_volunteerinfo()
	 * 获取项目招募志愿者信息
	 * @param int $vi_id
	 * @return object
	 */
	function get_volunteerinfo($vi_id)
	{
		$data = array('vi_id' => $vi_id, 'status' => 2);
		$this->db->flush_cache();
		$query = $this->db->get_where('cs_volunteer_info', $data);
		if ($query->num_rows() != 1)
			return NULL;
		return $query->row();
	}

	

	/**
	 * Project_model::get_message_list()
	 * 获取项目留言板留言
	 * @param int $pid
	 * @param int $pageno
	 * @param int $pagesize
	 * @return array
	 */
	function get_message_list($pid, $pageno=1, $pagesize=10)
	{
		$data = array('pid' => $pid, 'status' => 2, 'announce' => 1);
		$this->db->flush_cache();
		$this->db->order_by('create_time', 'desc');
		$this->db->limit($pagesize, $pagesize * ($pageno - 1));
		$query = $this->db->get_where('cs_message', $data);
		if ($query->num_rows() == 0)
			return NULL;
		$message_list = array();
		foreach ($query->result() as $row) {
			$message = $row;
			if ($row->anonymous == 1 || $row->uid == 0) {
				$message->nickname = '匿名';
			} else {
				$message->nickname = $this->User_model->get_info($row->uid)->nickname;
			}
			$message->create_time = date('Y-m-d H:i:s', $row->create_time);
			$message_list[] = $message;
		}
		return $message_list;
	}
	
	/**
	 * Project_model::get_message_counts()
	 * 获取项目留言板条数
	 * @param mixed $pid
	 * @return int
	 */
	function get_message_counts($pid)
	{
		$this->db->flush_cache();
		$this->db->where(array('pid' => $pid, 'announce' => 1, 'status' => 2));
		return $this->db->count_all_results('cs_message');
	}

	/**
	 * 获取项目留言板条数
	 * @param int $pid
	 * @return int
	 */ 
	function get_message_list_count($pid)
	{
		$data = array('pid' => $pid, 'status' => 2, 'announce' => 1);
		$this->db->flush_cache();
		$query = $this->db->get_where('cs_message', $data);
		return $query->num_rows();
	}

	/**
	 * Project_model::get_invoice_list()
	 * 获项目发票申请列表
	 * 
	 * @param mixed $pid
	 * @param mixed $pageno
	 * @param mixed $pagesize
	 * @return
	 */
	function get_invoice_list($pid, $pageno, $pagesize, $start_time = 0, $end_time = 0)
	{
		$data = array('pid' => $pid, 'status' => 3); // 3 表示有效
		$this->db->flush_cache();
		if ($start_time && $end_time && $start_time < $end_time) {
			$this->db->where(array('create_time >=' => $start_time,'create_time <=' => $end_time));
		}
		$this->db->limit($pagesize, $pagesize * ($pageno - 1));
		$query = $this->db->get_where('cs_invoice', $data);
		if ($query->num_rows() == 0)
			return NULL;
		$invoice_list = array();
		foreach ($query->result() as $row) {
			$invoice = $row;
			$invoice->nickname = $this->User_model->get_info($row->uid)->nickname;
			$invoice->create_time = date('Y-m-d H:i', $row->create_time);
			$invoice_list[] = $invoice;
		}
		return $invoice_list;
	}
	
	/**
	 * 获取项目所有发票申请列表用于下载
	 * @param int $pid
	 * @return array
	 */ 
	function get_total_invoice_list($pid)
	{
		$data = array('pid' => $pid, 'status' => 3);
		$this->db->flush_cache();
		$query = $this->db->get_where('cs_invoice', $data);
		if ($query->num_rows() == 0)
			return NULL;
		$invoice_list = array();
		foreach ($query->result() as $row) {
			$invoice = $row;
			$invoice->nickname = $this->User_model->get_info($row->uid)->nickname;
			$invoice->create_time = date('Y-m-d H:i', $row->create_time);
			$invoice_list[] = $invoice;
		}
		return $invoice_list;
	}
	
	/**
	 * 获取项目发票列表条数
	 * @param int $pid
	 * @param int $start_time
	 * @param int $end_time
	 * @return int count
	 */ 
	function get_invoice_list_count($pid, $start_time = 0, $end_time = 0)
	{
		$data = array('pid' => $pid, 'status' => 3);
		$this->db->flush_cache();
		if ($start_time && $end_time && $start_time < $end_time) {
			$this->db->where(array('create_time >=' => $start_time,'create_time <=' => $end_time));
		}
		$query = $this->db->get_where('cs_invoice', $data);
		return $query->num_rows();
	}


	/**
	 * Project_model::get_donation_list()
	 * 用于项目数据统计 获取捐款名单列表
	 * 
	 * @param int $pid
	 * @param int $pageno
	 * @param int $pagesize
  	 * @param int $start_time
	 * @param int $end_time
	 * @return array
	 */
	function get_donation_list($pid, $pageno, $pagesize, $start_time = 0, $end_time = 0)
	{
		$data = array('pid' => $pid, 'status' => 2, 'process >=' => 4);
		$this->db->flush_cache();
		if ($start_time && $end_time && $start_time <= $end_time) {
			$this->db->where(array('create_time >=' => $start_time, 'create_time <=' => $end_time));
		}
		$this->db->limit($pagesize, $pagesize * ($pageno - 1));
		$query = $this->db->get_where('cs_donate', $data);
		if ($query->num_rows() == 0)
			return NULL;
		$donate_list = array();
		foreach ($query->result() as $row) {
			$donate = $row;
			if($row->uid != 0) {
				$donate->nickname = $this->User_model->get_info($row->uid)->nickname;
			}else{
				$donate->nickname = '匿名';
			}
			$donate->create_time = date('Y-m-d H:i', $row->create_time);
			$donate->money = $donate->money / 100.0; // 分为单位
			$donate_list[] = $donate;
		}
		return $donate_list;
	}

	/**
	 * 更新捐款信息
	 * @param int $did
	 * @param int $data
	 * @return bool
	 */ 
	function update_donate($did, $data)
	{
		$time = time();
		$data['modify_time'] = $time;
		$this->db->flush_cache();
		$this->db->where('did', $did);
		$this->db->update('cs_donate', $data);
		return ($this->db->affected_rows() == 1);
	}

	/**
	 * 更新捐款进度
	 * @param int $poss_id
	 * @param int $money
	 * @return bool
	 */ 
	function add_poss_money ($poss_id, $money) {
		$this->db->flush_cache();
		$this->db->where('poss_id', $poss_id);
		$poss = $this->db->get('cs_possession')->row();
		$time = time();
		$data = array('now_money' => $poss->now_money + $money, 'modify_time' => $time);
		$this->db->flush_cache();
		$this->db->where('poss_id', $poss_id);
		$this->db->update('cs_possession', $data);
		return ($this->db->affected_rows() == 1);
	}

	/**
	 * 更新总钱数
	 * @param int $money
	 * @return bool
	 */ 
	function add_sum_money ($money) {
		$this->db->flush_cache();
		$this->db->limit(1);
		$sm = $this->db->get('cs_summary')->row();
		$time = time();
		$data = array('money' => $sm->money + $money, 'modify_time' => $time);
		$this->db->flush_cache();
		$this->db->where('smid', $sm->smid);
		$this->db->update('cs_summary', $data);
		return ($this->db->affected_rows() == 1);
	}
	
	/**
	 * 获取项目所有捐款列表用于下载
	 * @param int $pid
	 * @return array
	 */ 
	function get_total_donation_list($pid)
	{
		$data = array('pid' => $pid, 'status' => 2, 'process >=' => 4);
		$this->db->flush_cache();
		$query = $this->db->get_where('cs_donate', $data);
		if ($query->num_rows() == 0)
			return NULL;
		$donate_list = array();
		foreach ($query->result() as $row) {
			//TODO: 优化此处内存
			$donate = $row;
			if ($donate->uid == 0) {
				$donate->nickname = '未注册用户';
			}
			$donate->create_time = date('Y-m-d H:i', $row->create_time);
			$donate->money = $donate->money / 100.0; // 分为单位
			$donate_list[] = $donate;
		}
		return $donate_list;
	}


	/**
	 * Project_model::get_donation_list_count()
	 * 获取项目pid捐助活动的个数
	 * @param int $pid
	 * @param int $start_time
	 * @param int $end_time
	 * @return int count
	 */
	function get_donation_list_count($pid, $start_time = 0, $end_time = 0)
	{
		$this->db->flush_cache();
		if ($start_time && $end_time && $start_time < $end_time) {
			$this->db->where(array('create_time >=' => $start_time,'create_time <=' => $end_time));
		}
		$this->db->where('pid', $pid)->where('status', 2)->where('process >=', 4);
		return $this->db->count_all_results('cs_donate');
		return $query->num_rows();
	}

	/**
	 * Project_model::get_volunteer_list()
	 * 获取项目志愿者列表
	 * @param int $pid
	 * @param int $pageno
	 * @param int $pagesize
	 * @param int $start_time
	 * @param int $end_time
	 * @return array
	 */
	function get_volunteer_list($pid, $pageno, $pagesize, $start_time = 0, $end_time = 0)
	{
		$this->db->flush_cache();
		$this->db->from('cs_volunteer')->where('pid', $pid)->where('status !=', 1);
		if ($start_time && $end_time && $start_time < $end_time) {
			$this->db->where(array('create_time >=' => $start_time,'create_time <=' => $end_time));
		}
		$this->db->limit($pagesize, $pagesize * ($pageno - 1));
		$query = $this->db->get();
		if ($query->num_rows() == 0)
			return NULL;
		$volunteer_list = array();
		foreach ($query->result() as $row) {
			$volunteer = $row;
			$volunteer->nickname = $this->User_model->get_info($row->uid)->nickname;
			$volunteer->create_time = date('Y-m-d H:i', $row->create_time);
			$volunteer->verify_status = '审核中';
			if ($volunteer->status == 3) {
				$volunteer->verify_status = '已通过';
			}
			$this->load->model('Utility_model');
			$volunteer->address = $this->Utility_model->get_address($row->province, $row->
				city, $row->district, ',');
			$volunteer_list[] = $volunteer;
		}
		return $volunteer_list;
	}

	/**
	 * 获取项目所有志愿者用于下载
	 * @param int $pid
	 * @return array
	 */ 
	function get_total_volunteer_list($pid)
	{
		$this->db->flush_cache();
		$this->db->from('cs_volunteer')->where('pid', $pid)->where('status !=', 1);
		$query = $this->db->get();
		if ($query->num_rows() == 0)
			return NULL;
		$volunteer_list = array();
		foreach ($query->result() as $row) {
			$volunteer = $row;
			$volunteer->nickname = $this->User_model->get_info($row->uid)->nickname;
			$volunteer->create_time = date('Y-m-d H:i', $row->create_time);
			$volunteer->verify_status = '尚未通过';
			if ($volunteer->status == 3) {
				$volunteer->verify_status = '已通过';
			}
			$this->load->model('Utility_model');
			$volunteer->address = $this->Utility_model->get_address($row->province, $row->
				city, $row->district, ',');
			$volunteer_list[] = $volunteer;
		}
		return $volunteer_list;
	}
	
	/**
	 * 获取项目志愿者名单个数
	 * @param int $pid
	 * @param int $start_time
	 * @param int $end_time
	 * @return int count
	 */ 
	function get_volunteer_list_count($pid, $start_time, $end_time)
	{
		$this->db->flush_cache();
		$this->db->from('cs_volunteer')->where('pid', $pid)->where('status !=', 1);
		if ($start_time && $end_time && $start_time < $end_time) {
			$this->db->where(array('create_time >=' => $start_time,'create_time <=' => $end_time));
		}
		$query = $this->db->get();
		return $query->num_rows();
	}


	/**
	 * Project_model::get_category_name()
	 * 获取项目类型名
	 * @param int $cid
	 * @return string
	 */
	function get_category_name($cid)
	{
		$data = array('cid' => $cid, 'status' => 2);
		$this->db->flush_cache();
		$query = $this->db->get_where('cs_category', $data, 1);
		if ($query->num_rows() != 1)
			return NULL;
		return $query->row()->name;
	}

	/**
	 * Project_model::get_organization_name()
	 * 获取组织名称
	 * @param int $oid
	 * @return string name
	 */
	function get_organization_name($oid)
	{
		$data = array('oid' => $oid, 'status' => 2);
		$this->db->flush_cache();
		$query = $this->db->get_where('cs_organization', $data, 1);
		if ($query->num_rows() != 1)
			return NULL;
		return $query->row()->oname;
	}
	
	/**
	 * Project_model::get_organization_name()
	 * 获取组织信息
	 * @param int $oid
	 * @return string name
	 */
	function get_organization_info($oid)
	{
		$data = array('oid' => $oid, 'status' => 2);
		$this->db->flush_cache();
		$query = $this->db->get_where('cs_organization', $data, 1);
		if ($query->num_rows() != 1)
			return NULL;
		return $query->row();
	}

	/**
	 * Project_model::get_total_donation_news()
	 * 获取所有项目的捐款动态
	 * @param int $num
	 * @return array
	 */
	function get_total_donation_news($num)
	{
		$data = array('process >=' => 4, 'status' => 2);
		$this->db->flush_cache();
		$this->db->order_by('create_time', 'desc');
		$query = $this->db->get_where('cs_donate', $data, $num);
		if ($query->num_rows() == 0)
			return NULL;
		$news = array();
		foreach ($query->result() as $row) {
			$info = NULL;
			if ($row->anonymous == 1 || $row->uid == 0) {
				$info->nickname = '匿名';
				$info->photo = 'default.jpg';
			} else {
				$info->nickname = $this->User_model->get_info($row->uid)->nickname;
				$info->photo = $this->User_model->get_detail_info($row->uid)->photo;
				if(!$info->photo || $info->photo == '') $info->photo = 'default.jpg';
			}
			$info->money = $row->money / 100.0; // 以分为单位
			$news[] = $info;
		}
		return $news;
	}


	/**
	 * Project_model::get_latest_donation_news()
	 * 获取项目pid最新的捐款动态
	 * @param int $pid
	 * @param int $num
	 * @return array
	 */
	function get_latest_donation_news($pid, $num)
	{
		$data = array('pid' => $pid, 'process >=' => 4, 'status' => 2);
		$this->db->flush_cache();
		$this->db->order_by('create_time', 'desc');
		$query = $this->db->get_where('cs_donate', $data, $num);
		if ($query->num_rows() == 0)	return NULL;
		$news = array();
		foreach ($query->result() as $row) {
			$info = NULL;
			if ($row->anonymous == 1 || $row->uid == 0) {
				$info->nickname = '匿名';
				$info->photo = 'default.jpg';
			} else {
				$info->nickname = $this->User_model->get_info($row->uid)->nickname;
				$info->photo = $this->User_model->get_detail_info($row->uid)->photo;
				if(!$info->photo || $info->photo == '') $info->photo = 'default.jpg';
			}
			$info->money = $row->money / 100.0;
			$news[] = $info;
		}
		return $news;
	}


	/**
	 * Project_model::verify_volunteer()
	 * 获取
	 * @param int $vid
	 * @param int $vi_id
	 * @param int $action 0:通过审核 1:审核不通过
	 * @return bool
	 */
	function verify_volunteer($vid, $vi_id, $action)
	{
		if ($action == 0) {
			$data['status'] = 3;	//通过审核
		} else {
			$data['status'] = 1;	//审核不通过,直接删除项
		}
		$this->db->flush_cache();
		$this->db->where('vid', $vid);
		$this->db->update('cs_volunteer', $data);
		if ($this->db->affected_rows() == 1) { //有了改动
			if ($action == 0) {	 	// 通过审核
				$this->db->query("UPDATE cs_volunteer_info 
								SET now_number=now_number+1 
								WHERE vi_id=$vi_id");
			}
		}
		return TRUE;
	}
	
	/**
	 * Project_model::get_volunteer_uid()
	 * 根据vid获取志愿者uid，用于发送提醒
	 * @param int $vid
	 * @return int uid
	 */
	function get_volunteer_uid($vid) {
		$this->db->flush_cache();
		$this->db->where('vid', $vid);
		$this->db->select('uid');
		$query = $this->db->get('cs_volunteer');
		if($query->num_rows() == 0) return 0;
		else return $query->first_row()->uid;
	}

	
	/**
	 * Project_model::is_project_sponsor()
	 * 判断是否项目的发起者
	 * @param int $uid
	 * @param int $pid
	 * @return bool
	 */
	public function is_project_sponsor($uid, $pid)
	{
		$data = array('uid' => $uid, 'pid' => $pid, 'status != ' => 1);
		$this->db->flush_cache();
		$this->db->from('cs_project')->where($data)->limit(1);
		$query = $this->db->get();
		return ($query->num_rows() == 1);
	}

	
	/**
	 * Project_model::is_project_supporter()
	 * 判断是否是项目的支持者
	 * @param mixed $uid
	 * @param mixed $pid
	 * @return bool
	 */
	public function is_project_supporter($uid, $pid)
	{
		$data = array('uid' => $uid, 'pid' => $pid, 'status' => 2);
		$this->db->flush_cache();
		$this->db->from('cs_support')->where($data)->limit(1);
		$query = $this->db->get();
		return ($query->num_rows() == 1);
	}

	/**
	 * 判断是否是项目的志愿者，返回审核状态
	 * @param int $uid
	 * @param int $pid
	 * @return int 0:not else:status:
	 */
	public function is_project_volunteer($uid, $pid)
	{
		$this->db->flush_cache();
		$this->db->from('cs_volunteer')->where('uid', $uid)->where('pid', $pid)->where('status !=',
			1)->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->row()->status;
		} else {
			return 0;
		}
	}

	
	/**
	 * Project_model::get_my_support_project_num()
	 * 获取指定个数个我支持的项目
	 * @param int $uid
	 * @param int $num
	 * @return array
	 */
	public function get_my_support_project_num($uid, $num,$allow_end_project=FALSE)
	{
		// @to-do 把表连起来判断已经通过且支持的项目，而不是continue
		$data = array('uid' => $uid, 'status' => 2);
		$this->db->flush_cache();
		$this->db->limit($num); //用于首页显示固定个数个
		$this->db->select('pid')->distinct('pid');
		$this->db->order_by('create_time', 'desc'); //支持时间倒序
		$query = $this->db->get_where('cs_support', $data);
		if ($query->num_rows() == 0)
			return NULL;

		$project_list = array();
		foreach ($query->result() as $row) {
			$project = $this->get_project_info($row->pid);
			if(!$project) continue;
			if($project->status == 4 && !$allow_end_project) continue;
			$project_list[] = $project;
		}
		return $project_list;
	}


	/**
	 * Project_model::get_my_support_project()
	 * 获取我支持的项目列表
	 * @param integer $uid
	 * @param integer $pageno
	 * @param integer $pagesize
	 * @return array
	 */
	public function get_my_support_project($uid = 0, $pageno = 1, $pagesize = 10)
	{
		$data = array('uid' => $uid, 'status !=' => 1);
		$this->db->flush_cache();
		$this->db->select('pid')->distinct('pid');
		$this->db->limit($pagesize, $pagesize * ($pageno - 1));
		$this->db->order_by('create_time', 'desc');
		$query = $this->db->get_where('cs_support', $data);
		if ($query->num_rows() == 0)
			return NULL;
		$project_list = array();
		foreach ($query->result() as $row) {
			$project = $this->get_project_info($row->pid);
			if(!$project) continue;
			$project_list[] = $project;
		}
		return $project_list;
	}

	/**
	 * Project_model::get_my_support_project_count()
	 * 获取我支持的项目的个数
	 * @todo 联表查询已经审核通过审核且没有删除的项目
	 * @param integer $uid
	 * @return int
	 */
	public function get_my_support_project_count($uid=0)
	{
		$data = array('uid' => $uid, 'status !=' => 1);
		$this->db->flush_cache();
		$this->db->select('pid')->distinct('pid');
		$query = $this->db->get_where('cs_support', $data);
		return $query->num_rows();
	}


	/**
	 * Project_model::get_my_propose_project()
	 * 获取我发起的项目列表
	 * @param integer $uid
	 * @param integer $status
	 * @param integer $pageno
	 * @param integer $pagesize
	 * @return
	 */
	public function get_my_propose_project($uid, $status = 0, $pageno = 1, $pagesize = 10)
	{
		$time = time();
		$this->db->flush_cache();
		$this->db->where('uid', $uid);
		/*if ($status) {
			$this->db->where('status', $status);
		} else {
			$this->db->where('status !=', 1);
			$this->db->where('status !=', 5);
		}*/
		if ($status != 0) {
			//$this->db->where('status', $status); // 3(进行中) 4(已结束)
			//改用时间控制
			if($status == 2) {
				$this->db->where('status', 2);
			} elseif($status == 3) {	//进行中
				$this->db->where('status !=', 2);
				$this->db->where('status !=', 5);
				$this->db->where('end_time >=',$time - 60*60*24);
			} elseif($status == 4) {	//已结束
				$this->db->where('status !=', 2);
				$this->db->where('status !=', 5);
				$this->db->where('end_time <',$time - 60*60*24);
			}
		} else {
			$this->db->where('status != ', 1); //未删除的所有项目
			//$this->db->where('status != ', 2); //审核中
			//$this->db->where('status != ', 5); //审核未通过
		}
		
		
		$this->db->limit($pagesize, $pagesize * ($pageno - 1));
		$this->db->order_by('create_time', 'desc');
		$query = $this->db->get('cs_project');
		if ($query->num_rows() == 0)
			return NULL;
		foreach ($query->result() as $info) {
			if($info->status == 3 && $info->end_time < $time - 60*60*24) {	//进行中项目如果时间已经结束
				$info->status = 4;	//改为已经结束状态
			}
			
			$info->start_time = date('Y-m-d', $info->start_time);
			$info->end_time = date('Y-m-d', $info->end_time);
			$info->category = $this->get_category_name($info->cid);
			$oinfo = $this->get_organization_info($info->oid);
			$info->oname = $oinfo->oname;
			$info->parent_fund = $oinfo->parent_fund;
			//$info->uname = $this->User_model->get_info($info->uid)->nickname;
			$info->uname = $this->User_model->get_detail_info($info->uid)->realname;
			$info->pics = preg_split("/[,]+/",$info->picurl, 6);
			if ($info->poss_id != 0) {
				$poss = $this->get_possesion_info($info->poss_id);
				$info->now_money = $poss->now_money / 100.0;
				$info->target_money = $poss->target_money / 100.0;
			}
			$project_list []= $info;
		}
		return $project_list;
	}

	
	/**
	 * Project_model::get_my_propose_project_count()
	 * 获取我发起的项目个数
	 * 
	 * @param int $uid
	 * @param int $status
	 * @return int count
	 */
	public function get_my_propose_project_count($uid, $status = 0)
	{
		$time = time();
		$this->db->flush_cache();
		$this->db->where('uid', $uid);
		/*if ($status) {
			$this->db->where('status', $status);
		} else {
			$this->db->where('status !=', 1);
			$this->db->where('status !=', 5);
		}*/
		if ($status != 0) {
			//$this->db->where('status', $status); // 3(进行中) 4(已结束)
			//改用时间控制
			if($status == 2) {
				$this->db->where('status', 2);
			} elseif($status == 3) {	//进行中
				$this->db->where('status !=', 2);
				$this->db->where('status !=', 5);
				$this->db->where('end_time >=',$time - 60*60*24);
			} elseif($status == 4) {	//已结束
				$this->db->where('status !=', 2);
				$this->db->where('status !=', 5);
				$this->db->where('end_time <',$time - 60*60*24);
			}
		} else {
			$this->db->where('status != ', 1); //未删除的所有项目
			//$this->db->where('status != ', 2); //审核中
			//$this->db->where('status != ', 5); //审核未通过
		}
		$query = $this->db->get('cs_project');
		return $query->num_rows();
	}

	/**
	 * Project_model::get_my_donate_project()
	 * 获取我捐助的项目
	 * 
	 * @param int $uid
	 * @param int $pageno
	 * @param int $pagesize
	 * @return array
	 */
	public function get_my_donate_project($uid, $pageno = 1, $pagesize = 10)
	{
		$data = array('uid' => $uid, 'status' => 2, 'process >=' => 4);
		$this->db->flush_cache();
		$this->db->select('pid')->distinct('pid');
		$this->db->limit($pagesize, $pagesize * ($pageno - 1));
		$this->db->order_by('create_time', 'desc');
		$query = $this->db->get_where('cs_donate', $data);
		if ($query->num_rows() == 0)
			return NULL;
		$project_list = array();
		foreach ($query->result() as $row) {
			$project = $this->get_project_info($row->pid);
			if(!$project) continue;
			$project->donate_action_array = $this->get_my_donate_action($row->pid, $uid);
			$project->is_supporter = $this->is_project_supporter($uid, $row->pid);
			$project_list[] = $project;
		}
		return $project_list;
	}

	/**
	 * Project_model::get_my_donate_project_count()
	 * 获取我捐助的项目个数
	 * 
	 * @param int $uid
	 * @param int $pageno
	 * @param int $pagesize
	 * @return int
	 */
	public function get_my_donate_project_count($uid, $pageno = 1, $pagesize = 10)
	{
		$data = array('uid' => $uid, 'status' => 2, 'process >=' => 4);
		$this->db->flush_cache();
		$this->db->select('pid')->distinct('pid');
		$query = $this->db->get_where('cs_donate', $data);
		return $query->num_rows();
	}


	/**
	 * Project_model::get_my_donate_action()
	 * 获取我对某个项目的捐助详情
	 * 
	 * @param int $pid
	 * @param int $uid
	 * @return array
	 */
	public function get_my_donate_action($pid, $uid)
	{
		$data = array('uid' => $uid, 'status' => 2, 'process >=' => 4);
		$this->db->flush_cache();
		$query = $this->db->get_where('cs_donate', $data);
		foreach ($query->result() as $row) {
			$info = NULL;
			$info->create_time = date('Y-m-d H:i', $row->create_time);
			$info->money = $row->money;
			$donate_action_array[] = $info;
		}
		return $donate_action_array;
	}
	
	/**
	 * 获取相同类型的项目
	 * @param int $cid
	 * @param int $pid
	 * @param int $num
	 * @return array
	 */ 
	public function get_related_projects($cid,$pid,$num=5)
	{
		$time = time();
		$this->db->flush_cache();
		$this->db->where('cid', $cid);
		$this->db->where('pid !=', $pid);	//不要推荐自己
		$this->db->where('status', 3);
		$this->db->where('end_time >=',$time - 60*60*24);	//判断时间没有超过
		
		$this->db->order_by('create_time', 'desc');
		$query = $this->db->get('cs_project');
		
		
		if ($query->num_rows() == 0) return NULL;
		
		foreach ($query->result() as $info) {
			$info->start_time = date('Y-m-d', $info->start_time);
			$info->end_time = date('Y-m-d', $info->end_time);
			$info->category = $this->get_category_name($info->cid);
			$info->oname = $this->get_organization_name($info->oid);
			//$info->uname = $this->User_model->get_info($info->uid)->nickname;
			$info->uname = $this->User_model->get_detail_info($info->uid)->realname;
			$info->pics = preg_split("/[,]+/",$info->picurl, 6);
			if ($info->poss_id != 0) {
				$poss = $this->get_possesion_info($info->poss_id);
				$info->now_money = $poss->now_money / 100.0;
				$info->target_money = $poss->target_money / 100.0;
			}
			$project_list []= $info;
		}
		return $project_list;
		return NULL;
	}


	/**
	 * Project_model::get_recmd_project_list()
	 * 获取首页显示的推荐项目列表
	 * 
	 * @param int $num
	 * @return array
	 */
	public function get_recmd_project_list($num,$allow_end_project=FALSE)
	{
		$data = array('status' => 2);
		$this->db->flush_cache();
		$this->db->limit($num); //用于首页显示固定个数个
		$this->db->select('pid,title,description')->distinct('pid');
		$this->db->order_by('create_time', 'desc'); //支持时间倒序
		$query = $this->db->get_where('cs_recmd_project', $data);
		if ($query->num_rows() == 0)
			return NULL;

		$project_list = array();
		foreach ($query->result() as $row) {
			$project = $this->get_project_info($row->pid);
			if(!$project) continue;
			if($project->status == 4 && !$allow_end_project) continue;		//不允许结束项目显示在首页
			$project->title = $row->title;
			$project->short_description = $row->description;
			$project_list[] = $project;
		}
		return $project_list;
	}


	/**
	 * Project_model:get_category_list
	 * 获取项目类别列表 目前只支持一级项目
	 * @return array $category_list
	 */
	public function get_category_list()
	{
		$this->db->flush_cache();
		$query = $this->db->get_where('cs_category', array('parent_id' => 0, 'status' =>
			2));
		$category_list = array();
		foreach ($query->result() as $row) {
			$category_list[] = $row;
		}
		return $category_list;
	}


	/**
	 * Project_model::get_help_list()
	 * 获取我的求助列表
	 * 
	 * @param int $uid
	 * @param int $cid
	 * @param int $province
	 * @param int $type
	 * @param int $status
	 * @param string $order
	 * @param int $pageno
	 * @param int $pagesize
	 * @return
	 */
	public function get_help_list($uid, $cid, $province, $type, $status, $order, $pageno, $pagesize)
	{
		$time = time();
		$this->db->flush_cache();
		if ($cid != 0)
			$this->db->where('cid', $cid);
		if ($province != 0)
			$this->db->where('province', $province);
		if ($status != 0) {
			//$this->db->where('status', $status); // 3(进行中) 4(已结束)
			//改用时间控制
			if($status == 2) {
				$this->db->where('status', 2);
			} elseif($status == 3) {
				$this->db->where('status !=', 2);
				$this->db->where('status !=', 5);
				$this->db->where('end_time >=',$time - 60*60*24);
			} elseif($status == 4) {
				$this->db->where('status !=', 2);
				$this->db->where('status !=', 5);
				$this->db->where('end_time <',$time - 60*60*24);
			}
		} else {
			$this->db->where('status != ', 1); //删除
			$this->db->where('status != ', 2); //审核中
			$this->db->where('status != ', 5); //审核未通过
		}
		if ($type == 1)
			$this->db->where('poss_id != ', 0);
		if ($type == 2)
			$this->db->where('iid != ', 0);
		if ($type == 3)
			$this->db->where('vi_id != ', 0);
		$this->db->order_by($order, 'desc');
		$this->db->limit($pagesize, $pagesize * ($pageno - 1));
		$query = $this->db->get('cs_project');
		if ($query->num_rows() == 0)
			return NULL;

		$project_list = array();
		foreach ($query->result() as $row) {
			$info = $row;
			//根据时间判断真实状态
			if($row->status == 3 && $row->end_time < $time - 60*60*24) {	//进行中项目如果时间已经结束
				$info->status = 4;	//改为已经结束状态
			}
			$this->db->stop_cache();
			$info->start_time = date('Y-m-d', $info->start_time);
			$info->end_time = date('Y-m-d', $info->end_time);
			$info->category = $this->get_category_name($info->cid);
			$info->oname = $this->get_organization_name($info->oid);
			//$info->uname = $this->User_model->get_info($info->uid)->nickname;
			$info->uname = $this->User_model->get_detail_info($info->uid)->realname;
			$info->pics = preg_split("/[,]+/",$info->picurl, 6);
			if ($info->poss_id != 0) {
				$poss = $this->get_possesion_info($info->poss_id);
				$info->now_money = $poss->now_money / 100.0;
				$info->target_money = $poss->target_money / 100.0;
			}
			$info->is_supporter = $this->is_project_supporter($uid, $info->pid);
			$project_list[] = $info;
		}
		return $project_list;
	}

	/**
	 * Project_model:get_help_list_count()
	 * 求助列表项目个数:用于分页
	 * 
	 * @param int $cid
	 * @param int $province
	 * @param int $type
	 * @param int status 3(进行中) 4(已结束)
	 */
	public function get_help_list_count($cid, $province, $type, $status)
	{
		$time = time();
		$this->db->flush_cache();
		if ($cid != 0)
			$this->db->where('cid', $cid);
		if ($province != 0)
			$this->db->where('province', $province);
		if ($status != 0) {
			//$this->db->where('status', $status); // 3(进行中) 4(已结束)
			//改用时间控制
			if($status == 2) {
				$this->db->where('status', 2);
			} elseif($status == 3) {
				$this->db->where('status !=', 2);
				$this->db->where('status !=', 5);
				$this->db->where('end_time >=',$time - 60*60*24);
			} elseif($status == 4) {
				$this->db->where('status !=', 2);
				$this->db->where('status !=', 5);
				$this->db->where('end_time <',$time - 60*60*24);
			}
		} else {
			$this->db->where('status != ', 1); //删除
			$this->db->where('status != ', 2); //审核中
			$this->db->where('status != ', 5); //审核未通过
		}
		if ($type == 1)
			$this->db->where('poss_id != ', 0);
		if ($type == 2)
			$this->db->where('iid != ', 0);
		if ($type == 3)
			$this->db->where('vi_id != ', 0);
		return $this->db->count_all_results('cs_project');
	}

	/**
	 * Project_model::get_sum_info()
	 * 获取统计信息 捐助总人数和总钱数 用于首页更新
	 * 
	 * @return array
	 */
	public function get_sum_info()
	{
		$this->db->flush_cache();
		$this->db->where('status', 2)->limit(1);
		$query = $this->db->get('cs_summary');
		$row = $query->row();
		$sum_info->people = $row->people;
		$sum_info->money = $row->money / 100.0;
		//用户的总人数
		/*$this->db->flush_cache();
		$this->db->select('uid')->where('status', 2);
		$this->db->from('cs_passport');
		$sum_info->people = $this->db->count_all_results();*/
		return $sum_info;
	}

	/**
	 * Project_model::get_sum_info()
	 * 获取统计信息 捐助总人数和总钱数 用于首页更新
	 * 
	 * @return array
	 */
	public function get_donate_info_by_id($did) {
		$this->db->flush_cache();
		$this->db->where('did', $did);
		$query = $this->db->get('cs_donate');
		return $query->row();
	}
}

/* End of file project_model.php */
/* Location: ./application/model/project_model.php */
