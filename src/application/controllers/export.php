<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Shanghai');
class Export extends CI_Controller {
     function __construct()
     {
         parent::__construct();
  
         // Here you should add some sort of user validation
         // to prevent strangers from pulling your table data
     }
	 
	 /**
	  * make excel files
	  * @param array $fields keys in array
	  * @param array $fields_zh keys zh name in array
	  * @param array $array data array
	  * @param string $filename
	  */ 
	 public function _xls_maker($fields,$fields_zh,$array,$filename)
	 {
		 $this->load->library('PHPExcel');
         $this->load->library('PHPExcel/IOFactory');
         $objPHPExcel = new PHPExcel();
         $objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
         $objPHPExcel->setActiveSheetIndex(0);
  
         // Field names in the first row
         $col = 0;
         foreach ($fields_zh as $field)	{
             $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
             $col++;
         }
  
         // Fetching the table data
         $row = 2;
         foreach($array as $data)
         {
             $col = 0;
             foreach ($fields as $field)
             {
                 $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                 $col++;
             }
  
             $row++;
         }
  
         $objPHPExcel->setActiveSheetIndex(0);
  
         $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
		 ob_clean();
         // Sending headers to force the user to download the file
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename='.$filename.'.xls');
         header('Cache-Control: max-age=0');
         $objWriter->save('php://output');
	 }
	 
	 public function download_daily_report($pid)
	 {
		$uid = $this->User_model->check_user_login();
		if($uid <=0 || !$this->Project_model->is_project_sponsor($uid,$pid)) {
			echo 'Permission Denied';
			return;
		}
		$fields_zh = array('捐助时间','捐助人昵称','捐助金额');
		$fields = array('create_time','nickname','money');
		$array = $this->Project_model->get_total_donation_list($pid);
		$filename = 'cishan_daily_report_'.$pid.'_'.time();
		$this->_xls_maker($fields,$fields_zh,$array,$filename);
	 }
	 
	 public function download_volunteer_list($pid)
	 {
	 	$uid = $this->User_model->check_user_login();
		if($uid <=0 || !$this->Project_model->is_project_sponsor($uid,$pid)) {
			echo 'Permission Denied';
			return;
		}
		$fields_zh = array('昵称','真实姓名','联系方式','身份证号码','所在城市','报名时间','申请理由','审核状态');
		$fields = array('nickname','realname','phone','idcard','address','create_time','description','verify_status');
		$array = $this->Project_model->get_total_volunteer_list($pid);
		$filename = 'cishan_volunteer_list_'.$pid.'_'.time();
		$this->_xls_maker($fields,$fields_zh,$array,$filename);
	 }
	 
	 public function download_invoice_list($pid)
	 {
	 	$uid = $this->User_model->check_user_login();
		if($uid <=0 || !$this->Project_model->is_project_sponsor($uid,$pid)) {
			echo 'Permission Denied';
			return;
		}
		$fields_zh = array('用户名','发票抬头','联系方式','寄送地址','邮编','申请时间');
		$fields = array('nickname','type','phone','address','zip_code','create_time');
		$array = $this->Project_model->get_total_invoice_list($pid);
		$filename = 'cishan_invoice_list_'.$pid.'_'.time();
		$this->_xls_maker($fields,$fields_zh,$array,$filename);
	 }
	 
	 
  
     function index($table_name)
     {
         $query = $this->db->get($table_name);
  
         if(!$query)	return false;
  
         // Starting the PHPExcel library
         $this->load->library('PHPExcel');
         $this->load->library('PHPExcel/IOFactory');
  
         $objPHPExcel = new PHPExcel();
         $objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
         $objPHPExcel->setActiveSheetIndex(0);
  
         // Field names in the first row
         $fields = $query->list_fields();
         $col = 0;
         foreach ($fields as $field)	{
             $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
             $col++;
         }
  
         // Fetching the table data
         $row = 2;
         foreach($query->result() as $data)
         {
             $col = 0;
             foreach ($fields as $field)
             {
                 $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                 $col++;
             }
  
             $row++;
         }
  
         $objPHPExcel->setActiveSheetIndex(0);
  
         $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
		 ob_clean();
         // Sending headers to force the user to download the file
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename="cishan_'.date('dMy').'.xls"');
         header('Cache-Control: max-age=0');
         $objWriter->save('php://output');
     }
	 
	 function download_admin_invoice_list()
     {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            echo 'Permission Denied';
            return;
        }

        $fields_zh = array('发票单号','申请时间','捐助项目类型','捐助项目ID','用户名','发票抬头','联系方式','寄送地址','邮编');
        $fields = array('invoice_num','apply_time','type','project_name','project_id','nickname','title','phone','address', 'zip_code');
        $array = $this->admin_model->get_all_invoice_list();
        $filename = 'cishan_donate_list_'.time();
        $this->_xls_maker($fields,$fields_zh,$array,$filename);
     }
	 
	 public function download_data_stat()
     {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            echo 'Permission Denied';
            return;
        }

        $fields_zh = array('捐助时间','捐助项目类型','捐助项目名称','捐助项目ID','捐助人昵称','捐助金额','捐助人联系方式');
        $fields = array('create_time','type','project_name','project_id','nickname','money', 'phone');
        $array = $this->admin_model->get_data_stat();
        $filename = 'cishan_data_stat_'.time();
        $this->_xls_maker($fields,$fields_zh,$array,$filename);
     }
  
 }

/* End of file export.php */
/* Location: ./application/controllers/export.php */