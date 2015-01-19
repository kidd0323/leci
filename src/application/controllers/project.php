<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Project Class
 *
 * @author QiangRunwei <qiangrw@gmail.com>
 * @version	1.0
 */
date_default_timezone_set('Asia/Shanghai');
class Project extends CI_Controller {
	function __constructor() 
	{
		parent::__constructor();
	}
	
	
	/**
	 * 检查项目结束时间是否符合要求
	 */ 
	public function end_time_check($end_time)
	{
		$start_time = date("Y-m-d");	// 开始时间设定为今天
		if(strtotime($end_time) - strtotime($start_time) <= 0){
			$this->form_validation->set_message('end_time_check', "结束时间至少在今天之后");
			return FALSE;
		} else {
			return TRUE;
		}
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
	 * 慈善首页
	 */ 
	public function index()
	{
		$data['recmd_projects'] = $this->Project_model->get_recmd_project_list(10,FALSE);
		$data['donation_news'] = $this->Project_model->get_total_donation_news(18);
		$uid = $this->User_model->check_user_login();
		$data['support_projects'] = $this->Project_model->get_my_support_project_num($uid,4,FALSE);
		$data['sum_info'] = $this->Project_model->get_sum_info();
		$data['head_pics'] = $this->Project_model->get_header_pic(10);	//获取头图 最多10张
		
		$money = sprintf("%d",$data['sum_info']->money);
		$new = str_split($money);
		//注意这里有坑:硬编码
		$data['arr_money'] = array_pad($new,-7,'0');

		ob_clean();
		$data['active'] = array('active','inactive','inactive');
		$data['title'] = '首页 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('project/main');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 获取项统计目信息 钱数-参与人数
	 */ 
	public function get_sum_info()
	{
		$data['sum_info'] = $this->Project_model->get_sum_info();
		echo json_encode($data);
	}
	
	
	/**
	 * 公益项目
	 */ 
	public function help_list($cid=0,$province=0,$type=0,$status=3,$order='start_time',$page=1)
	{
		$cid = intval($cid);
		$province = intval($province);
		$type = intval($type);
		$status = intval($status);
		$page = intval($page);
		if($page < 1 || $status <= 1) {
			$this->show_note("您访问的页面不存在");
			return;
		}
		$this->load->library('pagination');
		$this->load->config('pagination');
		$per_page = $this->config->item('help_list_per_page');
		
		$uid = $this->User_model->check_user_login();
		$data['category_list'] = $this->Project_model->get_category_list();
		$data['help_list'] = $this->Project_model->get_help_list($uid,$cid,$province,$type,$status,$order,$page,$per_page);
		
		$config['base_url'] = "index.php/project/help_list/$cid/$province/$type/$status/$order/";
		$config['use_page_numbers'] = TRUE;
		$config['uri_segment'] = 8;
		$config['total_rows'] = $this->Project_model->get_help_list_count($cid,$province,$type,$status);
		$config['per_page'] = $per_page;
		$config['cur_page'] = $page;
		
		$this->pagination->initialize($config);
		$url->cid = $cid;
		$url->province = $province;
		$url->type = $type;
		$url->status = $status;
		$url->order = $order;
		$url->page = $page;
		$data['url'] = $url;
		
		$this->config->load('address');
		$data['province_list'] = $this->config->item('province');
		
		ob_clean();
		$data['active'] = array('inactive','active','inactive');
		$data['title'] = '公益项目 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('project/help_list');
		$this->load->view('inc/footer');
	}
	
	
	/**
	 * 我的公益中心页面
	 */ 
	public function myproject($type=0,$status=0,$page=1)
	{
		// type 1：我捐助的求助，2:我支持的求助 3.我发起的求助
		$type = intval($type);
		// status  项目审核状态
		$this->load->library('pagination');
		$this->load->config('pagination');
		$per_page = $this->config->item('myproject_per_page');
		
		$uid = $this->User_model->check_user_login();
		if($uid <= 0) {		//登录后才能进我的公益中心
			redirect('user/login?url=project/myproject/', 'refresh');	
			return;
		}
		
		$data['donation_news'] = $this->Project_model->get_total_donation_news(18);
		if($type == 0 || $type == 3) {
			$data['propose_projects'] = $this->Project_model->get_my_propose_project($uid,$status,$page,$per_page);
		} else {
			$data['propose_projects'] = NULL;
		}
		if($type == 0 || $type == 1) {
			$data['donate_projects'] = $this->Project_model->get_my_donate_project($uid,$page,$per_page);
		} else {
			$data['donate_projects'] = NULL;
		}
		if($type == 0 || $type == 2) {
			$data['support_projects'] = $this->Project_model->get_my_support_project($uid,$page,$per_page);
		} else {
			$data['support_projects'] = NULL;
		}
		
		if($type != 0) {
			$config['base_url'] = "index.php/project/myproject/$type/$status";
			$config['use_page_numbers'] = TRUE;
			$config['uri_segment'] = 5;
			switch($type) {
				case 1:	$config['total_rows'] = $this->Project_model->get_my_donate_project_count($uid); break;
				case 2:	$config['total_rows'] = $this->Project_model->get_my_support_project_count($uid); break;
				case 3:	$config['total_rows'] = $this->Project_model->get_my_propose_project_count($uid,$status); break;
			}
			$config['per_page'] = $per_page;
			$config['cur_page'] = $page;
			$this->pagination->initialize($config);
		}
		
		$data['type'] = $type;
		$data['status'] = $status;
		ob_clean();
		$data['active'] = array('inactive','inactive','active');
		$data['title'] = '我的公益中心 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('project/myproject');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 项目详情页面
	 */ 
	public function info($pid=0)
	{
		$data['pid'] = intval($pid);
		$data['project'] = $this->Project_model->get_project_info($pid);
		if(empty($data['project'])) {
			ob_clean();
			$data['active'] = array('inactive','inactive','inactive');
			$data['title'] = '该项目不存在 | 乐慈';
			$data['note'] = '您要查看的项目不存在';
			$this->load->view('inc/header',$data);
			$this->load->view('user/note');
			$this->load->view('inc/footer');
			return;
		}
		$data['project']->description = str_replace("\n\n",'</p><p>',$data['project']->description);
		if($data['project']->status == 2) {
			$this->show_note('该项目在审核中,请耐心等待');
			return;
		}
		
		$uid = $this->User_model->check_user_login();
		if($uid > 0) {
			$userinfo = $this->User_model->get_detail_info($uid);
            $data['userinfo'] = array(
                                    'realname' => $userinfo->realname,
                                    'phone' => $userinfo->phone,
                                    'province' => $userinfo->province,
                                    'city' => $userinfo->city,
                                    'district' => $userinfo->district,
                                );
		}else{
            $data['userinfo'] = array(
                                    'realname' => '',
                                    'phone' => '',
                                    'province' => '',
                                    'city' => '',
                                    'district' => '',
                                );
        }
		if(!$data['project']){
			$this->show_note('系统忙，请稍后刷新');
			return;	
		}
		if(!$data['project']->poss_id>0) {
			$data['is_donate'] = FALSE;
		} else {
			$data['is_donate'] = TRUE;
			//$data['possession'] = $this->Project_model->get_possesion_info($data['project']->poss_id);	//move to get_project_info
		}
		if(!$data['project']->iid>0) {
			$data['is_item'] = FALSE;
		} else {
			$data['is_item'] = TRUE;
			$data['item'] = $this->Project_model->get_item_info($data['project']->iid);
		}
		
		if(!$data['project']->vi_id>0) {
			$data['is_volunteerinfo'] = FALSE;
			$data['is_volunteer'] = 0;
		} else {
			$data['is_volunteerinfo'] = TRUE;
			$data['volunteerinfo'] = $this->Project_model->get_volunteerinfo($data['project']->vi_id);			
			$data['is_volunteer'] = $this->Project_model->is_project_volunteer($uid,$pid);
		}
		
		$data['is_sponsor'] = ($data['project']->uid === $uid);	//是否项目发起者
		$data['is_supporter'] = $this->Project_model->is_project_supporter($uid,$pid);
		
		// 获取该项目相关的最新捐款新闻
		$data['news'] = $this->Project_model->get_latest_donation_news($pid,18);
		
		// 获取留言板信息
		$this->load->config('pagination');
		$per_page = $this->config->item('message_per_page');
		$data['message_list'] = $this->Project_model->get_message_list($pid,1,$per_page); 
		$message_counts = $this->Project_model->get_message_counts($pid);
		if($message_counts == 0) $data['message_page'] = 0;
		else $data['message_page'] = (int)( $message_counts / $per_page) + 1;

			
		// 获取捐助历史
		$per_page = $this->config->item('daily_report_per_page');
		$data['donation_list'] = $this->Project_model->get_donation_list($pid,1,$per_page,0,0);
		$data['donation_cur_count'] = count($data['donation_list']);
		$donation_counts = $this->Project_model->get_donation_list_count($pid,0,0);
		if($donation_counts == 0) $data['donation_page'] = 0;
		else 	$data['donation_page'] = (int)($donation_counts / $per_page) + 1; 
		
		
		// 获取发起者反馈 
		$data['sponsor_feedback_list'] = $this->Project_model->get_sponsor_feedback_list($pid);
		
		// 获取志愿者反馈
		$data['volunteer_feedback_list'] = $this->Project_model->get_volunteer_feedback_list($pid);
		
		// 获取推荐项目列表
		$data['related_project_list'] = 
			$this->Project_model->get_related_projects($data['project']->cid,$pid,5);
		
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = $data['project']->title.' | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('project/info');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 项目详情页-获取捐助名单
	 */ 
	public function get_donation_records() 
	{
		$pid = $this->input->get('pid');
		$page = $this->input->get('page');
		if(!$pid || !$page) return;
		
		$this->load->config('pagination');
		$per_page = $this->config->item('daily_report_per_page');
		$data['donation_list'] = $this->Project_model->get_donation_list($pid,$page,$per_page,0,0);
		$data['donation_cur_count'] = count($data['donation_list']);
		$donation_counts = $this->Project_model->get_donation_list_count($pid,0,0);
		if($donation_counts == 0) $data['donation_page'] = 0;
		else 	$data['donation_page'] = (int)($donation_counts / $per_page) + 1; 
		$data['per_page'] = $per_page;
		echo json_encode($data);
	}
	
	/**
	 * 支持项目 AJAX-ONLY
	 */ 
	public function support_project()
	{
		$pid = $this->input->post('pid');
		$uid = $this->User_model->check_user_login();
		//$pid = addslashes(trim($pid));
		if($uid <= 0) {
			$data['error_msg'] = '您尚未登录';
		} else {
			if($this->Project_model->support_project($uid,$pid)) {
				$data['error_msg'] = 'OK';
			} else {
				$data['error_msg'] = '支持项目失败';
			}
		}
		echo json_encode($data);
	}
	
	/**
	 * 项目留言板
	 */ 
	public function message($pid=0,$page=1)
	{
		$data['pid'] = intval($pid);
		$this->load->library('pagination');
		$this->load->config('pagination');
		$per_page = $this->config->item('message_per_page');
		
		$data['message_list'] = $this->Project_model->get_message_list($pid,$page,$per_page);
		
		$config['base_url'] = "index.php/project/message/$pid";
		$config['use_page_numbers'] = TRUE;
		$config['uri_segment'] = 4;
		$config['total_rows'] = $this->Project_model->get_message_list_count($pid); 
		$config['per_page'] = $per_page;
		$config['cur_page'] = $page;
		$this->pagination->initialize($config);
		
		
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '项目留言板 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('project/message');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 获取项目的
	 */ 
	public function get_message()
	{
		$pid = $this->input->get('pid',true);
		$page = $this->input->get('page',true);
		$this->load->config('pagination');
		$per_page = $this->config->item('message_per_page');
		$data['message_list'] = $this->Project_model->get_message_list($pid,$page,$per_page);
		$message_counts = $this->Project_model->get_message_counts($pid);
		if($message_counts == 0) $data['message_page'] = 0;
		else $data['message_page'] = (int)( $message_counts / $per_page) + 1;
		echo json_encode($data);
	}
	
	
	/**
	 * 发布留言 AJAX ONLY
	 */ 
	public function submit_message()
	{
		// 登录后才能留言
		$uid = $this->User_model->check_user_login();
		if($uid <= 0){
			$data['error_msg'] = '您尚未登录';
			echo json_encode($data);
			return;
		}
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$config = array(
					array(
		                 'field'   => 'pid', 
		                 'label'   => '项目ID', 
		                 'rules'   => 'trim|required|integer|xss_clean'
		              ),
					array(
		                 'field'   => 'content', 
		                 'label'   => '留言内容',
		                 'rules'   => 'trim|required|min_length[1]|max_length[256]|xss_clean'
		              ),
				);
	 	$this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
        	$data['error_msg'] = validation_errors();
       	} else {
       		$pid = $this->input->post('pid', true);
       		$content = $this->input->post('content', true);
			$this->_insert_message($uid, $pid, 2, $content, 1);
       		/*
			$this->db->trans_start();
			$mid = $this->Globalid->get_insert_id('mid');
       		$this->Project_model->insert_message($mid,$uid,$pid,2,$content,1);
       		$this->db->trans_complete();*/
       		$data['error_msg'] = 'OK';
       	}
       	echo json_encode($data);
	}
	
	/**
	 * 内部使用 发布留言
	 */ 
	private function _insert_message($uid, $pid, $anonymous, $content, $announce) {
		$mid = $this->Globalid->get_insert_id('mid');
		$this->Project_model->insert_message($mid,$uid,$pid,$anonymous,$content,$announce);
		return TRUE;
	}
	
	/**
	 * 内部使用 插入发票信息 
	 */ 
	private function _insert_invoice($type, $money, $address, $zip_code, $receiver, $title, $phone, $number,$pid,$uid)
	{
		$invoice_id = $this->Globalid->get_insert_id('invoice_id');
		$this->Project_model->insert_invoice($invoice_id, $type, $money,$address, $zip_code, $receiver, $title, 
											$phone, $number,$pid,$uid);
		return $invoice_id;
	}
	
	/**
	 * 内部使用 插入捐款信息
	 */	 
	private function _insert_donate($type,$uid,$anonymous,$pid,$invoice_id,$money,$name,$phone,$process,$provider,$bank)
	{	
		$did = $this->Globalid->get_insert_id('did');
		$this->Project_model->insert_donate($did,$type,$uid,$anonymous,$pid,$invoice_id,$money,$name,$phone,$process,$provider,$bank);
		return $did;
	}
	
	/**
	 * 发布求助页面
	 */ 
	public function propose_assist()
	{
		$this->load->library('form_validation');
		$uid = $this->User_model->check_user_login();
		if($uid <= 0){
			redirect('user/login?url=project/propose_assist', 'refresh');
			return;
		}
		$data['detail_info'] = $this->User_model->get_detail_info($uid);
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '发布求助 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('project/propose_assist');
		$this->load->view('inc/footer');
	}
	
	
	private function file_group($filepath,$filelj,$width,$height){
		$suijishu = rand(100,999);                          //取一个100--999的随机数；
		$xfilej=$filelj;									//time().$suijishu.substr($filelj,7,200);
		$fileljp= $filepath.$filelj;						//图片路径，根据实际情况修改，要相对路径!!!!!!!!!!!!!
		$image=$fileljp;									//图片路径 

		$img=getimagesize($image);							//载入图片的函数   得到图片的信息
		switch($img[2])	{								//判断图片的类型
			case 1:
			$im=@imagecreatefromgif($image);				//载入图片，创建新图片
			break;
			case 2:
			$im=@imagecreatefromjpeg($image);
			break;
			case 3:
			$im=@imagecreatefrompng($image);
			break;
		}
		$width_y=$img[0];
		$height_y=$img[1];
		if($width_y>$height_y){//如果宽大于高
			$width_y_y=$height_y;
			$height_y_y=$height_y;
			$jq_x=($width_y-$height_y)/2;
			$jq_y=0;
		}	elseif($width_y<$height_y){//如果宽小于高
			$height_y_y=$width_y;
			$width_y_y=$width_y;
			$jq_x=0;
			$jq_y=($height_y-$width_y)/2;
		} else if($width_y=$height_y){//如果宽小于高
			$width_y_y=$width_y;
			$height_y_y=$height_y;
			$jq_x=0;
			$jq_y=0;
		}
		$newim=imagecreatetruecolor($width,$height); //剪切图片第一步，建立新图像 x就是宽 ，y就是高//图片大小
		imagecopyresampled($newim,$im,0,0,$jq_x,$jq_y,$width,$height,$width_y_y,$height_y_y);	//这个函数不失真
		$despath = substr($filepath,0,strlen($filepath)-strlen("project/"))."/project_thumb/";
		imagejpeg($newim, $despath.$xfilej, 100);//加个100可以更清晰
		return TRUE;
	}
	
	
	/**
	 * 确认发布求助 FORM ONLY
	 */ 
	public function submit_propose_assist()
	{
		$uid = $this->User_model->check_user_login();
		if($uid <= 0){
			redirect('user/login', 'refresh');
			return;
		}
		
		// process files
		$config['upload_path'] = "./uploads/project";
  		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	 	$config['max_size'] = 5 * 1024;
	  	//$config['max_width']  = '1024';
	  	//$config['max_height']  = '768';
	  	$config['encrypt_name'] = 'TRUE';	// 重命名文件为加密字符串
		$this->load->library('upload', $config);
		
		
		$this->load->library('form_validation');
		$time = time();
		$config = array(
           array(
                 'field'   => 'cid', 
                 'label'   => '项目类型', 
                 'rules'   => 'trim|integer|required|xss_clean'
              ),
           array(
                 'field'   => 'title',
                 'label'   => '项目标题',
                 'rules'   => 'required|min_length[6]|max_length[64]|xss_clean'
              ),
			array(
                 'field'   => 'short_description',
                 'label'   => '项目描述',
                 'rules'   => 'trim|required|min_length[6]|max_length[40]|xss_clean'
              ),
           array(
                 'field'   => 'description',
                 'label'   => '项目描述',
                 'rules'   => 'trim|required|min_length[6]|max_length[10000]|xss_clean'
              ),
           array(
                 'field'   => 'assist_object',
                 'label'   => '捐助对象',
                 'rules'   => 'trim|required|min_length[2]|max_length[32]|xss_clean'
              ),
           array(
                 'field'   => 'province', 
                 'label'   => '捐助区域省份', 
                 'rules'   => 'trim|integer|required|xss_clean'
              ),
           array(
                 'field'   => 'city', 
                 'label'   => '捐助区域城市', 
                 'rules'   => 'trim|integer|required|xss_clean'
              ),
           array(
                 'field'   => 'district', 
                 'label'   => '捐助区域地区', 
                 'rules'   => 'trim|integer|required|xss_clean'
              ),
           array(
           		 'field'   => 'end_time',
                 'label'   => '结束时间',
                 'rules'   => 'trim|required|xss_clean|regex_match[/^\d{4,4}-\d{1,2}-\d{1,2}$/]|callback_end_time_check'
		   		),
			// 联系人信息的规则
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
                 'rules'   => 'trim|required|integer|xss_clean'
              ),
           array(
                 'field'   => 'c_city', 
                 'label'   => '联系人所在城市', 
                 'rules'   => 'trim|required|integer|xss_clean'
              ),
           array(
                 'field'   => 'c_district', 
                 'label'   => '联系人所在地区', 
                 'rules'   => 'trim|required|integer|xss_clean'
              ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
			$data['error_msg'] = validation_errors();
			if($this->input->is_ajax_request()) {
				echo json_encode($data);	
			} else {
				$this->propose_assist();
			}
		} else {
			// 处理文件
			$pic_url = '';
			for($i=1;$i<=5;$i++) {
				$filefield = "pic$i";
				if (is_uploaded_file($_FILES[$filefield]['tmp_name']) ) {
					$upload_ret = $this->upload->do_upload($filefield);
					if(!$upload_ret){
						$data['error_msg'] = $this->upload->display_errors('<p>','</p>');
						$this->show_note($data['error_msg']);
						return;
					} else {
						$file_info = $this->upload->data();
						// 截个thumb头像
						$this->file_group($file_info['file_path'],$file_info['file_name'],150,150);
						$pic_url .= ($file_info['file_name'].",");
					}
				}
			}
			if($pic_url == '') {
				$data['error_msg'] = '请至少传一张相关图片';
				$this->show_note('请至少传一张相关图片');	//temp
				return;
			}
			
			$config['upload_path'] = "./uploads/application";
	  		$config['allowed_types'] = 'gif|jpg|jpeg|png|bmp|zip|rar|7z|doc|docx|ppt|pdf';
		 	$config['max_size'] = 10 * 1024;
		  	$config['encrypt_name'] = 'TRUE';	// 重命名文件为加密字符串
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (is_uploaded_file($_FILES['application_file']['tmp_name']) ) {
				$upload_ret = $this->upload->do_upload('application_file');
				if(!$upload_ret){
					$data['error_msg'] = $this->upload->display_errors('','');
					$this->show_note(' 抱歉，发布求助失败。在上传相关证明文件时出错了:'.$data['error_msg']."<br/> 允许类型:".$config['allowed_types']);
					return;
				} else {
					$file_info = $this->upload->data();
					$application_file = $file_info['file_name'];
				}
			} else {
				$data['error_msg'] = '相关文件必须上传.';
				$this->show_note($data['error_msg']);
				return;
			}
			
			// 处理数据库事务
			$this->db->trans_begin();       //完全自己控制事务
			$start_time = date("Y-m-d");	// 开始时间设定为今天
			$donate = $this->input->post('donate');
			$item = $this->input->post('item');
			$volunteer = $this->input->post('volunteer');
			if(!$donate && !$item && !$volunteer){
				$data['error_msg'] = '捐助类型至少需要选一项';
				$this->show_note($data['error_msg']);
				return;
			}
			$ret = 1;
			// 分别处理三种类型的捐款
			if($donate){
				$config = array(
					 array(
		           		 'field'   => 'target_money',
		                 'label'   => '目标金额',
		                 'rules'   => 'trim|integer|required|xss_clean|less_than[100000000000]'
				   		),
	   				 array(
		           		 'field'   => 'bank_name',
		                 'label'   => '开户银行',
		                 'rules'   => 'trim|required|min_length[1]|max_length[64]|xss_clean'
				   		),
 					 array(
		           		 'field'   => 'account_id',
		                 'label'   => '银行账号',
		                 'rules'   => 'trim|required|min_length[1]|max_length[32]|xss_clean'
				   		),
		   			 array(
		           		 'field'   => 'account_name',
		                 'label'   => '银行账号名',
		                 'rules'   => 'trim|required|min_length[1]|max_length[32]|xss_clean'
				   		),
				);
			 	$this->form_validation->set_rules($config);
		        if ($this->form_validation->run() == FALSE) {
					$data['error_msg'] = validation_errors();
					$this->db->trans_rollback();
					
					if($this->input->is_ajax_request()) {
						echo json_encode($data);	
					} else {
						$this->propose_assist();
					}
					return;
				} else {
					$target_money = $this->input->post('target_money');
					$bank_name = $this->input->post('bank_name');
					$account_id = $this->input->post('account_id');
					$account_name = $this->input->post('account_name');
					$poss_id = $this->Globalid->get_insert_id('poss_id');
					if(!$this->Project_model->insert_possession($poss_id,$account_name,
						$account_id,$bank_name,$target_money * 100)) {	//以分为单位存储
						$ret = 0;	
					}
				}
			} else {
				$poss_id = 0;
			}
			if($item) {
				$config = array(
					 array(
		           		 'field'   => 'receiver',
		                 'label'   => '收件人姓名',
		                 'rules'   => 'trim|required|min_length[1]|max_length[32]|xss_clean'
				   		),
	   				 array(
		           		 'field'   => 'address',
		                 'label'   => '收件地址',
		                 'rules'   => 'trim|required|min_length[1]|max_length[64]|xss_clean'
				   		),
 					 array(
		           		 'field'   => 'zip_code',
		                 'label'   => '邮编',
		                 'rules'   => 'trim|required|min_length[1]|max_length[8]|xss_clean'
				   		),
		   			 array(
		           		 'field'   => 'phone',
		                 'label'   => '联系电话',
		                 'rules'   => 'trim|required|min_length[1]|max_length[16]|xss_clean'
				   		)
				);
			 	$this->form_validation->set_rules($config);
		        if ($this->form_validation->run() == FALSE) {
					$data['error_msg'] = validation_errors();
					$this->db->trans_rollback();
					if($this->input->is_ajax_request()) {
						echo json_encode($data);	
					} else {
						$this->propose_assist();
					}
					return;
				} else {
					$receiver = $this->input->post('receiver');
					$address = $this->input->post('address');
					$zip_code = $this->input->post('zip_code');
					$phone = $this->input->post('phone');
					$iid = $this->Globalid->get_insert_id('iid');
					if(!$this->Project_model->insert_item(
							$iid,$receiver,$address,$zip_code,$phone)){
						$ret = 0;
					}
				}
			} else {
				$iid = 0;
			}
			if($volunteer) {
				$config = array(
				 array(
	           		 'field'   => 'number',
	                 'label'   => '募集人数',
	                 'rules'   => 'trim|required|integer|xss_clean|less_than[100000000]'
			   		)
   				);
   				$this->form_validation->set_rules($config);
		        if ($this->form_validation->run() == FALSE) {
					$data['error_msg'] = validation_errors();
					$this->db->trans_rollback();
					if($this->input->is_ajax_request()) {
						echo json_encode($data);	
					} else {
						$this->propose_assist();
					}
					return;
				} else {
					$number = $this->input->post('number');
					$vi_id = $this->Globalid->get_insert_id('vi_id');
					if(!$this->Project_model->insert_volunteer_info($vi_id,$number)) {
						$ret = 0;
					}
				}
			} else {
				$vi_id = 0;
			}
			// 处理联系人信息 这里数据库暂时有问题
			$c_idcard = $this->input->post('c_idcard');
			$c_realname = $this->input->post('c_realname');
			$c_phone = $this->input->post('c_phone');
			$c_province = $this->input->post('c_province');
			$c_city = $this->input->post('c_city');
			$c_district = $this->input->post('c_district');
			$this->User_model->edit_user_info($uid,$c_idcard,$c_realname,$c_phone,$c_province,
											$c_city,$c_district);
			
			// 处理项目信息
			$title = $this->input->post('title');
			$cid = $this->input->post('cid');
			$oid = 1;	//$this->input->post('oid');	 //执行机构，目前只支持博客基金
			$assist_object = $this->input->post('assist_object');
			$province = $this->input->post('province');
			$city = $this->input->post('city');
			$district = $this->input->post('district');
			$end_time = $this->input->post('end_time');
			$short_description = $this->input->post('short_description');
			$description = $this->input->post('description');
			$pid = $this->Globalid->get_insert_id('pid');
			
			if(!$this->Project_model->insert_project($pid,$uid,$title,$cid,$oid,$assist_object,
				$province,$city,$district,$start_time,$end_time,
				$poss_id,$iid,$vi_id,$pic_url,$application_file,$short_description,$description)) {
				$ret = 0;
				$this->db->trans_rollback();	
			}
			if($ret == 1 && $this->db->trans_status() === TRUE) {
				$data['error_msg'] = 'OK';
				$this->db->trans_commit(); //确认事务正确执行
				if(!$this->input->is_ajax_request()) {
					$this->show_note('求助发布成功，请我们等待审核，审核通过后我们会给您发送站内提醒。');
					return;
				}
			} else {
				$this->db->rollback();
				$data['error_msg'] = '数据库错误,请稍后再试.';
				if(!$this->input->is_ajax_request()) {
					$this->show_note($data['error_msg']);
					return;
				}
			}
		}
		return;
	}
	
	
	
	
	/**
	 * 数据统计
	 */ 
	public function daily_report($pid,$start_time=0,$end_time=0,$page=1)
	{
		$uid = $this->User_model->check_user_login();
		$pid = intval($pid);
		$start_time = intval($start_time);
		$end_time = intval($end_time);
		$page = intval($page);
		if($uid <=0) {
			redirect("user/login?url=project/daily_report/$pid", 'refresh');
			return;
		}
		if(!$this->Project_model->is_project_sponsor($uid,$pid) || $page < 1) {
			$this->show_note("对不起，您无权查看此页");
			return;
		}
		
		$data['pid'] = $pid;
		$data['project_info'] = $this->Project_model->get_project_info($pid);
		if($data['project_info']->status == 2) {
			$this->show_note('该项目在审核中,请耐心等待');
			return;
		}
		if(!$start_time || !$end_time) {
			$start_time = $this->input->get('start_time');
			$end_time = $this->input->get('end_time');
			if(!$start_time || !$end_time) {
				$start_time = $data['project_info']->start_time;
				$end_time = $data['project_info']->end_time;
			}
		}
		
		$data['start_time'] = $start_time;
		$data['end_time'] = $end_time;
		$start_time = strtotime($start_time);
		$end_time = strtotime($end_time) + 60*60*24;	//加一个offset以查到endtime当日的数据
		
		
		$this->load->library('pagination');
		$this->load->config('pagination');
		$per_page = $this->config->item('daily_report_per_page');
		

		
		$data['donate_list'] = $this->Project_model->get_donation_list($pid,$page,$per_page,$start_time,$end_time);
				
		$config['base_url'] = "index.php/project/daily_report/$pid/".$data['start_time']."/".$data['end_time']."/";
		$config['use_page_numbers'] = TRUE;
		$config['uri_segment'] = 6;
		$config['total_rows'] = $this->Project_model->get_donation_list_count($pid,$start_time,$end_time); 
		$config['per_page'] = $per_page;
		$config['cur_page'] = $page;
		$this->pagination->initialize($config);
		
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '数据统计 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('project/daily_report');
		$this->load->view('inc/footer');
	}
	
	public function volunteer_list($pid,$start_time=0,$end_time=0,$page=1)
	{
		$pid = intval($pid);
		$start_time = intval($start_time);
		$end_time = intval($end_time);
		$page = intval($page);
		$uid = $this->User_model->check_user_login();
		if($uid <=0) {
			redirect("user/login?url=project/volunteer_list/$pid", 'refresh');
			return;
		}
		if(!$this->Project_model->is_project_sponsor($uid,$pid) || $page < 1) {
			$this->show_note("对不起，您无权查看此页");
			return;
		}
		
		$data['pid'] = $pid;
		$data['project_info'] = $this->Project_model->get_project_info($pid);
		if($data['project_info']->status == 2) {
			$this->show_note('该项目在审核中,请耐心等待');
			return;
		}
		
		if(!$start_time || !$end_time) {
			$start_time = $this->input->get('start_time');
			$end_time = $this->input->get('end_time');
			if(!$start_time || !$end_time) {
				$start_time = $data['project_info']->start_time;
				$end_time = $data['project_info']->end_time;
			}
		}
		
		$data['start_time'] = $start_time;
		$data['end_time'] = $end_time;
		$start_time = strtotime($start_time);
		$end_time = strtotime($end_time) + 60*60*24;	//加一个offset以查到endtime当日的数据
		
		$this->load->library('pagination');
		$this->load->config('pagination');
		$per_page = $this->config->item('volunteer_list_per_page');
		$data['volunteer_list'] = $this->Project_model->get_volunteer_list($pid,$page,$per_page,$start_time,$end_time);
		
		$config['base_url'] = "index.php/project/volunteer_list/$pid/".$data['start_time']."/".$data['end_time']."/";
		$config['use_page_numbers'] = TRUE;
		$config['uri_segment'] = 6;
		$config['total_rows'] = $this->Project_model->get_volunteer_list_count($pid,$start_time,$end_time); 
		$config['per_page'] = $per_page;
		$config['cur_page'] = $page;
		$this->pagination->initialize($config);
		
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '志愿者名单 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('project/volunteer_list');
		$this->load->view('inc/footer');
	}
	
	public function invoice_list($pid,$start_time=0,$end_time=0,$page=1)
	{
		$pid = intval($pid);
		$start_time = intval($start_time);
		$end_time = intval($end_time);
		$page = intval($page);
		$uid = $this->User_model->check_user_login();
		if($uid <=0) {
			redirect("user/login?url=project/invoice_list/$pid", 'refresh');
			return;
		}
		if(!$this->Project_model->is_project_sponsor($uid,$pid) || $page < 1) {
			$this->show_note("对不起，您无权查看此页");
			return;
		}
		
		$data['pid'] = $pid;
		$data['project_info'] = $this->Project_model->get_project_info($pid);
		if($data['project_info']->status == 2) {
			$this->show_note('该项目在审核中,请耐心等待');
			return;
		}
		
		if(!$start_time || !$end_time) {
			$start_time = $this->input->get('start_time');
			$end_time = $this->input->get('end_time');
			if(!$start_time || !$end_time) {
				$start_time = $data['project_info']->start_time;
				$end_time = $data['project_info']->end_time;
			}
		}
		
		$data['start_time'] = $start_time;
		$data['end_time'] = $end_time;
		$start_time = strtotime($start_time);
		$end_time = strtotime($end_time) + 60*60*24;	//加一个offset以查到endtime当日的数据
		
		$this->load->library('pagination');
		$this->load->config('pagination');
		$per_page = $this->config->item('invoice_list_per_page');
		$data['invoice_list'] = $this->Project_model->get_invoice_list($pid,$page,$per_page,$start_time,$end_time);
		$config['base_url'] = "index.php/project/invoice_list/$pid/".$data['start_time']."/".$data['end_time']."/";;
		$config['uri_segment'] = 6;
		$config['total_rows'] = $this->Project_model->get_invoice_list_count($pid,$start_time,$end_time); 
		$config['per_page'] = $per_page;
		$config['cur_page'] = $page;
		$this->pagination->initialize($config);
		
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '发票申请名单 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('project/invoice_list');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 项目发起者发起反馈
	 */ 
	function post_feedback($pid) 
	{
		$pid = intval($pid);
		$uid = $this->User_model->check_user_login();
		if($uid <=0) {
			redirect('user/login?url=project/post_feedback', 'refresh');
			return;
		}
		if(!$this->Project_model->is_project_sponsor($uid,$pid)) {
			$this->show_note("对不起，您无权查看此页");
			return;
		}
		$data['project_info'] = $this->Project_model->get_project_info($pid);
		if($data['project_info']->status == 2) {
			$this->show_note('该项目在审核中,请耐心等待');
			return;
		}
		$data['error_msg'] = NULL;
		$data['pid'] = $pid;
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '发起者发布项目进展 | 乐慈';
		ob_clean();
		$this->load->view('inc/header',$data);
		$this->load->view('project/post_feedback');
		$this->load->view('inc/footer');
	}
	/**
	 * 确认发布进展 FORM ONLY
	 */ 
	function submit_post_feedback($pid=0)
	{
		$pid = intval($pid);
		$uid = $this->User_model->check_user_login();
		if($uid <=0) {
			redirect('user/login', 'refresh');
			return;
		}
		if(!$this->Project_model->is_project_sponsor($uid,$pid)) {
			$data['error_msg'] = '不是项目发起者,无权进行此操作';
		} else {
			$this->load->library('form_validation');
			$config = array(
	           array(
	                 'field'   => 'fb_content', 
	                 'label'   => '反馈内容', 
	                 'rules'   => 'trim|required|min_length[20]|max_length[10000]|xss_clean'
	              )
	           );
	  		$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE) {
				$data['error_msg'] = validation_errors();
		 	} else {
				$config = NULL;
		 		$config['upload_path'] = "./uploads/feedback";
		  		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			 	$config['max_size'] = 3 * 1024;
			  	$config['encrypt_name'] = 'TRUE';	// 重命名文件为加密字符串
			  	$this->load->library('upload', $config);
				//$this->upload->initialize($config);
				$pic_url = '';
				$data['error_msg'] = '上传文件失败';
				for($i=1;$i<=5;$i++) {
					$filefield = "fb_pic$i";
					if ($_FILES[$filefield]['tmp_name']) {
						$upload_ret = $this->upload->do_upload($filefield);
						if(!$upload_ret){
							ob_clean();
							$data['pid'] = $pid;
							$data['active'] = array('inactive','inactive','inactive');
							$data['title'] = '发起者发布项目进展 | 乐慈';
							$data['project_info'] = $this->Project_model->get_project_info($pid);
							$data['error_msg'] = trim($this->upload->display_errors('',''));
							if($data['error_msg'] == '')  {
								$data['error_msg'] = '上传文件失败，请上传符合条件的文件';
							}
							$this->load->view('inc/header',$data);
							$this->load->view('project/post_feedback');
							$this->load->view('inc/footer');
							return;
						} else {
							$file_info = $this->upload->data();
							if($file_info['file_name'] == '') {
								$data['error_msg'] = '上传文件失败，请上传符合条件的文件';
								ob_clean();
								$data['pid'] = $pid;
								$data['active'] = array('inactive','inactive','inactive');
								$data['title'] = '发起者发布项目进展 | 乐慈';
								$data['project_info'] = $this->Project_model->get_project_info($pid);
								$this->load->view('inc/header',$data);
								$this->load->view('project/post_feedback');
								$this->load->view('inc/footer');
							}
							$pic_url .= ($file_info['file_name'].",");
						}
					}
				}
		 		$this->db->trans_start();
		 		$fb_content = $this->input->post('fb_content');
		 		$sfb_id = $this->Globalid->get_insert_id('sfb_id');
		 		$this->Project_model->insert_sponsor_feedback($sfb_id,$uid,$pid,$pic_url,$fb_content);
		 		$this->db->trans_complete();
		 		$this->show_note('恭喜您，项目进展发布成功了.');
		 		return;
		 	}
		}
		ob_clean();
		$data['pid'] = $pid;
		$data['project_info'] = $this->Project_model->get_project_info($pid);
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '发起者发布项目进展 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('project/post_feedback');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 志愿者发起反馈
	 */ 
	function post_vfeedback($pid=0)
	{
		$pid = intval($pid);
		$uid = $this->User_model->check_user_login();
		if($uid <=0 || $this->Project_model->is_project_volunteer($uid,$pid) != 3) {
			$data['error_msg'] = '不是项目志愿者,无权进行此操作';
		}else{
			$data['error_msg'] = NULL;
		}
		ob_clean();
		$data['pid'] = $pid;
		$data['project_info'] = $this->Project_model->get_project_info($pid);
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '志愿者发布项目进展 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('project/post_vfeedback');
		$this->load->view('inc/footer');
	}
	
	function del_feedback($sfb_id=0,$pid=0) 
	{
		$sfb_id = intval($this->input->get_post('sfb_id'));
		$pid = intval($this->input->get_post('pid'));
		$uid = $this->User_model->check_user_login();
		
		if($uid <=0 || !$this->Project_model->is_project_sponsor($uid, $pid)) {
			$data['error_msg'] = 'Permission Denied';
		} else {
			
			if($this->Project_model->del_sponsor_feedback($sfb_id,$uid,$pid)){
				$data['error_msg'] = 'OK';
			} else {
				$data['error_msg'] = '数据库错误';
			}
		}
		echo json_encode($data);
	}
	
	function del_vfeedback($vfb_id=0,$pid=0)
	{
		$vfb_id = intval($this->input->get_post('vfb_id',true));
		$pid = intval($this->input->get_post('pid',true));
		$uid = $this->User_model->check_user_login();
		if($uid <=0 || !$this->Project_model->is_project_sponsor($uid, $pid)) {
			$data['error_msg'] = 'Permission Denied';
		} else {
			if($this->Project_model->del_volunteer_feedback($vfb_id,$pid)){
				$data['error_msg'] = 'OK';
			} else {
				$data['error_msg'] = '数据库错误';
			}
		}
		echo json_encode($data);
	}
	
	/**
	 * FROM ONLY
	 */ 
	function submit_post_vfeedback($pid=0)
	{
		$pid = intval($pid);
		$uid = $this->User_model->check_user_login();
		if($uid <=0 ) {
			redirect('user/login', 'refresh');
			return;
		}
		//Added by Bryan
		$data['project_info'] = $this->Project_model->get_project_info($pid);
		// 审核后的项目志愿者才有权限发表
		if($this->Project_model->is_project_volunteer($uid,$pid) != 3) {
			$data['error_msg'] = '不是项目志愿者,无权进行此操作';
		} else {
			$this->load->library('form_validation');
			$config = array(
	           array(
	                 'field'   => 'fb_content', 
	                 'label'   => '反馈内容', 
	                 'rules'   => 'trim|required|min_length[20]|max_length[10000]|xss_clean'
	              )
	           );
	  		$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE) {
				$data['error_msg'] = validation_errors();
		 	} else {
		 		$config['upload_path'] = "./uploads/feedback";
		  		$config['allowed_types'] = 'gif|jpg|png|jpeg';
			 	$config['max_size'] = 3 * 1024;
			  	$config['encrypt_name'] = 'TRUE';	// 重命名文件为加密字符串
			  	$this->load->library('upload', $config);
				$pic_url = '';
				for($i=1;$i<=5;$i++) {
					$filefield = "fb_pic$i";
					if ($_FILES[$filefield]['tmp_name']) {
						$upload_ret = $this->upload->do_upload($filefield);
						if(!$upload_ret){
							ob_clean();
							$data['pid'] = $pid;
							$data['active'] = array('inactive','inactive','inactive');
							$data['title'] = '发起者发布项目进展失败 | 乐慈';
							$data['error_msg'] = $this->upload->display_errors('','');
							if($data['error_msg'] == '')  {
								$data['error_msg'] = '上传文件失败，请上传符合条件的文件';
							}
							$this->load->view('inc/header',$data);
							$this->load->view('project/post_vfeedback');
							$this->load->view('inc/footer');
							return;
						} else {
							$file_info = $this->upload->data();
							$pic_url .= ($file_info['file_name'].",");
						}
					}
				}
		 		$this->db->trans_start();
		 		$fb_content = $this->input->post('fb_content');
		 		$vfb_id = $this->Globalid->get_insert_id('vfb_id');
		 		$this->Project_model->insert_volunteer_feedback($vfb_id,$uid,$pid,$pic_url,$fb_content);
		 		$this->db->trans_complete();
		 		$this->show_note('恭喜您，项目进展发布成功了,请等待发起者审核.');
		 		return;
		 	}
		}
		ob_clean();
		$data['pid'] = $pid;
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '发起者发布项目进展 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('project/post_vfeedback');
		$this->load->view('inc/footer');
	}
	
	function audit_vfeedback($pid=0)
	{
		$pid = intval($pid);
		$uid = $this->User_model->check_user_login();
		if($uid <=0) {
			redirect("user/login?url=project/audit_vfeedback/$pid", 'refresh');
			return;
		}
		if(!$this->Project_model->is_project_sponsor($uid,$pid)) {
			$this->show_note("对不起，您无权查看此页");
			return;
		}
		
		$data['pid'] = $pid;
		ob_clean();
		$data['project_info'] = $this->Project_model->get_project_info($pid);
		$data['vfeedback_list'] = $this->Project_model->get_volunteer_feedback($pid);
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '审核志愿者反馈 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('project/audit_vfeedback');
		$this->load->view('inc/footer');
	}
	/**
	 * AJAX ONLY 审查用户反馈
	 */ 
	function verify_vfeedback()
	{
		$pid = intval($this->input->post('pid',true));
		$vfb_id = intval($this->input->post('vfb_id',true));
		$action = intval($this->input->post('action',true));
		if($action && $this->Project_model->verify_vfeedback($pid,$vfb_id,$action)) {
			$data['error_msg'] = 'OK';
		} else {
			$data['error_msg'] = '数据库错误';
		}
		echo json_encode($data);
	}
	
	/**
	 * 确认申请项目志愿者 AJAX-ONLY
	 */ 
	function submit_apply_volunteer()
	{
		$uid = $this->User_model->check_user_login();
		if($uid <= 0){
			$data['error_msg'] = '您尚未登录';
			echo json_encode($data);
			return;	#尚未登录
		}
		$pid = intval($this->input->post('pid',true));
		if($this->Project_model->is_project_sponsor($uid,$pid)) {
			$data['error_msg'] = '抱歉,项目发起者不能申请为志愿者.';
			echo json_encode($data);
			return;
		}
		$this->load->library('form_validation');
		$config = array(
           array(
                 'field'   => 'realname', 
                 'label'   => '真实姓名', 
                 'rules'   => 'trim|required|min_length[2]|max_length[32]|xss_clean'
              ),
           array(
                 'field'   => 'phone', 
                 'label'   => '联系方式', 
                 'rules'   => 'trim|required||max_length[16]|xss_clean'
              ),
           array(
                 'field'   => 'idcard', 
                 'label'   => '身份证号', 
                 'rules'   => 'trim|required||max_length[32]|xss_clean'
              ),
           array(
                 'field'   => 'province', 
                 'label'   => '省份', 
                 'rules'   => 'trim|required|integer|xss_clean'
              ),
           array(
                 'field'   => 'city', 
                 'label'   => '城市', 
                 'rules'   => 'trim|required|integer|xss_clean'
              ),
           array(
                 'field'   => 'district', 
                 'label'   => '地区', 
                 'rules'   => 'trim|required|integer|xss_clean'
              ),
           array(
                 'field'   => 'pid', 
                 'label'   => '项目编号', 
                 'rules'   => 'trim|required|integer|xss_clean'
              ),
           array(
                 'field'   => 'description', 
                 'label'   => '申请理由', 
                 'rules'   => 'trim|required|max_length[128]|xss_clean'
              ),
        );
		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() == FALSE) {
			// @todo 添加项目编号是否存在的检查
			$data['error_msg'] = validation_errors();
	 	} else {
			if($this->Project_model->is_project_volunteer($uid, $pid)) {
				$data['error_msg'] = '不要重复申请';
			} else {
				$this->db->trans_start();
				$pid = $this->input->post('pid');
				$realname = $this->input->post('realname');
				$phone = $this->input->post('phone');
				$idcard = $this->input->post('idcard');
				$province = $this->input->post('province');
				$city = $this->input->post('city');
				$district = $this->input->post('district');
				$description = $this->input->post('description');
				$vid = $this->Globalid->get_insert_id('vid');
				$this->Project_model->insert_volunteer($vid,$pid,$uid,$realname,$phone,$idcard,
															$province,$city,$district,$description);
				$this->db->trans_complete();
				if($this->db->trans_status() == FALSE) {
					$data['error_msg'] = '数据库错误';
				} else {
					$data['error_msg'] = 'OK';
				}
			}
	 	}
	 	echo json_encode($data);
	}
	
	/** 
	 * 项目发起者审核志愿者 
	 */
	 public function verify_volunteer()
	 {
		$vid = intval($this->input->post('vid', true));
		$pid = intval($this->input->post('pid', true));
		$action = intval($this->input->post('action',true));
	 	$uid = $this->User_model->check_user_login();
	 	if($uid <= 0 || !$this->Project_model->is_project_sponsor($uid,$pid)) {
	 		$data['error_msg'] = 'Permission Denied';
	 		echo json_encode($data);
	 		return;
	 	}
	 	$this->db->trans_start();
		//判断是否已经满足要求了
	 	$vi_id = $this->Project_model->get_project_info($pid)->vi_id;
	 	$volunteerinfo = $this->Project_model->get_volunteerinfo($vi_id);
	 	if($volunteerinfo->now_number >= $volunteerinfo->number && $action == 0) {
	 		$data['error_msg'] = '已经招募足够的志愿者了';
	 	} else {
	 		//修改志愿者数据库表，发送消息给志愿者告诉其已经被录用
 		    $this->Project_model->verify_volunteer($vid,$vi_id,$action);
			$to_uid = $this->Project_model->get_volunteer_uid($vid);
		 	$nid = $this->Globalid->get_insert_id('nid');
		 	$project_info = $this->Project_model->get_project_info($pid);
		 	if($action == 0) {	// 通过审核
		 		$content = '您已经被项目'.$project_info->title.'的发起者选为志愿者.';
		 		$this->Notification_model->insert_notification($nid,$to_uid,$pid,$content);
	 		} else {	// 不通过审核 直接删除
	 			$content = '抱歉，您的'.$project_info->title.
				 			'项目志愿者审核未通过.感谢您对项目的支持';
		 		$this->Notification_model->insert_notification($nid,$to_uid,$pid,$content);
	 		}
		 	$data['error_msg'] = 'OK';
	 	}
		$this->db->trans_complete();
		echo json_encode($data);
	 }
	 

	/** 
     *  捐助选择支付方式
	 **/
	 public function select_pay_gateway() {
		$uid = $this->User_model->check_user_login();
		$data['active'] = array('inactive','active','inactive');
		$data['title'] = '选择支付方式 | 乐慈';
		$data['pid'] = intval($this->input->post('pid',true));
		$data['money'] = intval($this->input->post('moneyRadio') * 100,true);
		if($data['money'] > 1000000) {
			$data['note'] = "捐款钱数超过单笔最大限额";
			$this->load->view('inc/header',$data);
			$this->load->view('user/note');
			$this->load->view('inc/footer');
			return;
		}
		$data['phone'] = $this->input->post('phone',true);
		$data['name'] = $this->input->post('realname',true);
		if($data['money'] == 0)
			$data['money'] = intval($this->input->post('moneyText') * 100,true);
		if($data['money'] == 0) {
			$this->info($data['pid']);
			return;
		}
		if($data['pid'])
			$data['project'] = $this->Project_model->get_project_info($data['pid']);
		else {
			$this->info($data['pid']);
			return;
		}
		$oid = $data['project']->oid;
		if($oid > 0)
			$org = $this->Project_model->get_organization_info($oid);
		else {
			$this->info($data['pid']);
			return;
		}
		$data['parent_fund'] = $org->parent_fund;
		$data['oname'] = $org->oname;

		//留言逻辑
		$data['anonymous'] = ($this->input->post('anonymous') == '1') ? 1 : 2;
		$announce = ($this->input->post('msg_sync',true) == '1') ? 1 : 2;
		$content = $this->input->post('content',true);
		$this->_insert_message($uid, $data['pid'], $data['anonymous'], $content, $announce);

		//发票逻辑
		if($this->input->post('need_invoice',true) == '1') {
			$type = intval($this->input->post('invoiceRadio',true));
			if($type == 1 || $type == 2){
				if($type == 1)
					$title = $this->input->post('title',true);
				else
					$title = '个人';
				$phone = $this->input->post('in_phone',true);
				$address = $this->input->post('address',true);
				$receiver = $this->input->post('receiver',true);
				$zip_code = $this->input->post('postcode',true);
				$data['invoice_id'] = $this->_insert_invoice($type, $data['money'], $address, $zip_code, $receiver, $title, $phone, 0, $data['pid'],$uid);
			}
		}else{
			$data['invoice_id'] = '0';
		}

		ob_clean();
		$this->load->view('inc/header',$data);
		$this->load->view('project/pay_gateway');
		$this->load->view('inc/footer');
	 }

	 /** 
	  *  确认支付方式
	  **/
	  public function confirm_pay() {
		$uid = $this->User_model->check_user_login();
		$data['active'] = array('inactive','active','inactive');
		$data['title'] = '确认支付方式 | 乐慈';
		$data['anonymous'] = $this->input->post('anonymous',true);
		$data['invoice_id'] = intval($this->input->post('invoice_id',true));
		$data['pid'] = intval($this->input->post('pid',true));
		$data['phone'] = $this->input->post('phone',true);
		$data['name'] = $this->input->post('name',true);
		if(!$data['pid']){
			redirect('project','refresh');
		}
		$data['money'] = intval($this->input->post('money',true) * 100);
		if($data['money'] == 0) {
			$this->info($data['pid']);
			return;
		}
		if($data['money'] > 1000000) {
			$data['note'] = "捐款钱数超过单笔最大限额";
			$this->load->view('inc/header',$data);
			$this->load->view('user/note');
			$this->load->view('inc/footer');
			return;
		}
		if($data['pid'])
			$data['project'] = $this->Project_model->get_project_info($data['pid']);
		else {
			$this->info($data['pid']);
			return;
		}

		$oid = $data['project']->oid;
		if($oid > 0)
			$org = $this->Project_model->get_organization_info($oid);
		else {
			$this->info($data['pid']);
			return;
		}
		$data['parent_fund'] = $org->parent_fund;
		$data['oname'] = $org->oname;

		$data['bankName'] = $this->input->post('bankName',true);
		if($data['bankName'] == 'zfbye')
			$data['bankName'] = 'Alipay';
		else
			$data['bankName'] = strtoupper($data['bankName']);

		ob_clean();
		$this->load->view('inc/header',$data);
		$this->load->view('project/confirm_pay');
		$this->load->view('inc/footer');
	  }

	/** 
	 *  构造支付请求
	 **/
	public function submit_donate() {
		$this->load->config('alipay');
		$alipay_config = $this->config->item('alipay');

		$data['title'] = '跳转支付页面 | 乐慈';
		$data['active'] = array('inactive','active','inactive');
		$money = $this->input->post('money');
		if($money > 1000000) {
			ob_clean();
			$data['note'] = "捐款钱数超过单笔最大限额";
			$this->load->view('inc/header',$data);
			$this->load->view('user/note');
			$this->load->view('inc/footer');
			return;
		}else{
			//提示跳转
			ob_clean();
			$data['note'] = "正在跳转到支付页面，请稍后";
			$this->load->view('inc/header',$data);
			$this->load->view('user/note');
			$this->load->view('inc/footer');
		}
		//判断支付方式
		$uid = $this->User_model->check_user_login();
		$name = $this->input->post('name',true);
		$pid = intval($this->input->post('pid',true));
		$phone = $this->input->post('phone',true);
		$anonymous = $this->input->post('anonymous',true);
		$invoice_id = intval($this->input->post('invoice_id',true));
		$bankName = $this->input->post('bankName',true);
		if($bankName == 'Alipay'){
			$provider = 1;
		}
		else{
			$provider = 2;
		}
		$project = $this->Project_model->get_project_info($pid);
		$subject = $project->title;
		$body = $project->short_description;
		//生成唯一交易单号
		$did = $this->_insert_donate(1,$uid,$anonymous,$pid,$invoice_id,($money * 100),$name,$phone,1,$provider,$bankName);
		$out_trade_no = date('Ymdhis') . str_pad($did, 20, '0', STR_PAD_LEFT);
		if($provider == 1) {
			$parameter = array(
					"service"			=> "create_donate_trade_p",
					"payment_type"		=> "1",
					"partner"			=> trim($alipay_config['partner']),
					"_input_charset"	=> trim(strtolower($alipay_config['input_charset'])),
					"seller_email"		=> trim($alipay_config['seller_email']),
					"return_url"		=> trim($alipay_config['return_url']),
					"notify_url"		=> trim($alipay_config['notify_url']),
					"out_trade_no"		=> $out_trade_no,
					"subject"			=> $subject,
					"body"				=> $body,
					"total_fee"			=> $money,
					"show_url"			=> 'http://cishan.cn/project/info/' + $pid,
			);

			//构造网络捐赠接口
			$this->load->library('alipay/AlipayService', $alipay_config, 'alipayService');
			$html_text = $this->alipayService->create_donate_trade_p($parameter);
			echo $html_text;
		}
		else{
			ob_clean();
			$data['note'] = "对不起，我们暂时不支持网银支付，请使用支付宝";
			$this->load->view('inc/header',$data);
			$this->load->view('user/note');
			$this->load->view('inc/footer');
		}
	}
	
	/*
	 * 同步通知接口
	 */
	public function return_donate() {
		$this->load->config('alipay');
		$alipay_config = $this->config->item('alipay');
		//新建AlipayNotify对象
		$this->load->library('alipay/AlipayNotify', $alipay_config, 'alipayNotify');
		$verify_result = $this->alipayNotify->verifyReturn();
		$data = array();
        $data['title'] = '支付完成 | 乐慈';
		$data['active'] = array('inactive','active','inactive');
		if($verify_result){
			//验证成功
			$out_trade_no = $this->input->get('out_trade_no', TRUE);	//获取订单号
			$trade_no = $this->input->get('trade_no', TRUE);			//获取支付宝交易号
			$total_fee = $this->input->get('total_fee', TRUE) * 100;	//获取总价格,单位为分
			$donate_id_str = substr($out_trade_no, 14);
			$donate_id = intval($donate_id_str);
			$donate_info = $this->Project_model->get_donate_info_by_id($donate_id);
			$project = $this->Project_model->get_project_info($donate_info->pid);
			$process = $donate_info->process;
			$trade_status = $this->input->get('trade_status', TRUE);
		    if( $trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS'){
				//add by liangfeng
				//if process == 5 return
				if ($process == 5 || $process == 4){
					$data['note'] = "您的捐款已成功！感谢您对'".$project->title."'项目的支持！";
				}else{ //else update process, process_info, modify_time
					$data = array(
								'process' => 5,
								'process_info' => "FINISHED",
								'money' => $total_fee,
								'provider_bill' => $this->input->get('buyer_email', TRUE),
								'donate_bill' => $this->input->get('seller_email', TRUE),
							);
					$this->db->trans_start();
					$this->Project_model->update_donate($donate_id, $data);
					$this->Project_model->add_sum_money($total_fee);
					$this->Project_model->add_poss_money($project->poss_id, $total_fee);
					$this->db->trans_complete();
				}
			}else{
				$data['note'] = "您的捐款存在问题，请您联系我们的客服进行核对";
			}
			$data['note'] = "您的捐款已成功！感谢您对'".$project->title."'项目的支持！";
		}else{
			$data['note'] = "您的请求存在问题，验证失败";
		}
		$this->load->view('inc/header',$data);
		$this->load->view('user/note');
		$this->load->view('inc/footer');
	}

	/*
	 * 异步通知接口
	 */
	 public function notify_donate() {
		$this->load->config('alipay');
		$alipay_config = $this->config->item('alipay');
		//新建AlipayNotify对象
		$this->load->library('alipay/AlipayNotify', $alipay_config, 'alipayNotify');
		$verify_result = $this->alipayNotify->verifyNotify();
		if($verify_result){//验证成功
			$out_trade_no = $this->input->post('out_trade_no', TRUE);	//获取订单号
			$trade_no = $this->input->post('trade_no', TRUE);			//获取支付宝交易号
			$total_fee = $this->input->post('total_fee', TRUE) * 100;	//获取总价格
			//add by liangfeng
			$donate_id_str = substr($out_trade_no, 14);
			$donate_id = intval($donate_id_str);
			$donate_info = $this->Project_model->get_donate_info_by_id($donate_id);
			$process = $donate_info->process;
			$trade_status = $this->input->post('trade_status', TRUE);
			if($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS'){
				//add by liangfeng
				if ($process == 5 || $process == 4){ //if process == 4 return
					echo "success";		//请不要修改或删除
					return;
				}else{ //else update process, process_info, modify_time
					$data = array(
								'process' => 5,
								'process_info' => "FINISHED",
								'money' => $total_fee,
								'provider_bill' => $this->input->post('buyer_email', TRUE),
								'donate_bill' => $this->input->post('seller_email', TRUE),
							);
                    $project = $this->Project_model->get_project_info($donate_info->pid);
					$this->db->trans_start();
					$this->Project_model->update_donate($donate_id, $data);
					$this->Project_model->add_sum_money($total_fee);
					$this->Project_model->add_poss_money($project->poss_id, $total_fee);
					$this->db->trans_complete();
				}
			}else{
				//add by liangfeng
				$data = array(
								'money' => $total_fee,
								'provider_bill' => $this->input->post('buyer_email', TRUE),
								'donate_bill' => $this->input->post('seller_email', TRUE),
							);
				if($trade_status == 'TRADE_CLOSED') {
					$data['process'] = 2;
					$data['process_info'] = 'CLOSED';
				}elseif($trade_status == 'TRADE_PENDING'){
					$data['process'] = 2;
					$data['process_info'] = 'PENDING';
				}
				$this->Project_model->update_donate($donate_id, $data);
			}
			echo "success";		//请不要修改或删除
		}else{ //验证失败
			echo "fail";
		}
	 }
}

/* End of file project.php */
/* Location: ./application/controllers/project.php */
