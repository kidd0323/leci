<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Admin Controller Class
 *
 * @author LiangFeng <liangfeng1987@gmail.com>
 * @version 1.0
 */
date_default_timezone_set('Asia/Shanghai');
class Admin extends CI_Controller {
    function __constructor()
    {
        parent::__constructor();
    }

    /*
     *index i.e. admin page
     */
    public function index()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        ob_clean(); //clear the empty line
        $data['active'] = array('active', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive');
        $data['title'] = '企业捐款 | 慈善网';
        $data['error_msg'] = "";
        $this->load->view('admin_inc/header', $data);
        $this->load->view('admin/enterprise_donate');
        $this->load->view('admin_inc/footer');
    }

    /*
     *recommend project page 
     */
    public function recommend_project()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        ob_clean(); //clear the empty line
        $data['active'] = array('inactive', 'active', 'inactive', 'inactive', 'inactive', 'inactive');
        $data['title'] = '推荐管理 | 慈善网';
        $this->load->view('admin_inc/header', $data);
        $this->load->view('admin/recommend_project');
        $this->load->view('admin_inc/footer');
    }                                                                       

    /*
     *data statistics page 
     */
    public function data_stat()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        ob_clean(); //clear the empty line
        $data['active'] = array('inactive', 'inactive', 'active', 'inactive', 'inactive', 'inactive');
        $data['title'] = '数据统计 | 慈善网';
        //$data['donate_list'] = $this->admin_model->get_data_stat();
        $data['donate_list'] = $this->admin_model->get_donate_list();
        $data['total_page'] = $this->admin_model->get_donate_page_no();
        $data['begin_date'] = "";
        $data['end_date'] = "";
        $data['category'] = 0;
        $data['pname'] = "";
        $data['type'] = 0;

        $this->load->view('admin_inc/header', $data);
        $this->load->view('admin/data_stat');
        $this->load->view('admin_inc/footer');
    }                                                                       

    /*
     *user info page
     */
    public function user_info()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        ob_clean(); //clear the empty line
        $data['active'] = array('inactive', 'inactive', 'inactive', 'active', 'inactive', 'inactive');
        $data['title'] = '用户信息管理 | 慈善网';
        //get page number from GET request, the default value is 1;
        $data['user_list'] = $this->admin_model->get_user_info_list();
        $data['total_user'] = $this->admin_model->get_user_total_num();
        
        $this->load->view('admin_inc/header', $data);
        $this->load->view('admin/user_info');
        $this->load->view('admin_inc/footer');
    }
    
    /*
     * get a page_no, return user list w.r.t it
     */
     public function get_user_info_list()
     {
     	$page_no = $this->input->get('page');	
     	$data['user_list'] = $this->admin_model->get_user_info_list($page_no);
     	
     	echo json_encode($data);
     }

    /*
     *project info page
     */
    public function project_info()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        ob_clean(); //clear the empty line
        $data['active'] = array('inactive', 'inactive', 'inactive', 'inactive', 'active', 'inactive');
        $data['title'] = '项目审核 | 慈善网';
        $data['project_info_list'] = $this->admin_model->get_project_info_list();

        $this->load->view('admin_inc/header', $data);
        $this->load->view('admin/project_info');
        $this->load->view('admin_inc/footer');
    }

    /*
     *invoice page
     */
    public function invoice()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        ob_clean(); //clear the empty line
        $data['active'] = array('inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'active');
        $data['title'] = '发票申请 | 慈善网';
        $data['invoice_list'] = $this->admin_model->get_invoice_list();

        $this->load->view('admin_inc/header', $data);
        $this->load->view('admin/invoice');
        $this->load->view('admin_inc/footer');
    }

    /*
     *login page
     */
    public function login()
    {
        ob_clean(); //clear the empty line
		$data['active'] = array('inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive');
        $data['title'] = '管理员登陆 | 慈善网';
        $this->load->view('admin_inc/header', $data);
        $this->load->view('admin/login');
		$this->load->view('admin_inc/footer');
    }
	
    /*
     *focus map page
     */
	public function focus_map()
	{
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        ob_clean(); //clear the empty line
        $data['error_msg'] = NULL;
		$data['active'] = array('inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive');		
        $data['title'] = '焦点图 | 慈善网';
        $data['focus_map'] = $this->admin_model->get_focus_map();
        $this->load->view('admin_inc/header', $data);
        $this->load->view('admin/focus_map');
		$this->load->view('admin_inc/footer');
	}
	
    /*
     *recommend page
     */
	public function recommend()
	{
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        ob_clean(); //clear the empty line
        $data['active'] = array('inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive');		
        $data['title'] = '求助推荐 | 慈善网';
        $data['recommend_list'] = $this->admin_model->get_help_recommend_list();
        $data['insert_error_msg'] = NULL;
        $data['modify_error_msg'] = NULL;
        $this->load->view('admin_inc/header', $data);
        $this->load->view('admin/recommend');
		$this->load->view('admin_inc/footer');	
	}
	
    /*
     *callback method to check:
     *1. wheather the admin has logged in
     *2. wheather the input account is an admin account
     *3. is the password matched up with the email address
     */
    public function password_check()
    {
        //access the admin email_address & password from input form
        $email = $this->input->post('email_address');
        $password = $this->input->post('password');

        //check if admin has already logged in 
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            //admin has not logged in
            //check if the account belongs to admin group
            if ($this->admin_model->check_admin_exists($email) !== FALSE)
            {
                //this account belongs to admin group
                $res = $this->admin_model->check_admin_pwd($email, $password);
                //check if email-password pair is valid
                if ($res !== FALSE)
                {
                    // the password is correct
                    return TRUE;
                }
                else
                {
                    // the password is wrong
                    $err_message = "密码错误，请重新输入";
                    $this->form_validation->set_message('password_check', $err_message);
                    return FALSE;
                }
            }
            else
            {
                // this account doesn't belong to admin group
                $err_message = "该账号非管理员账号，请重新登录";
                $this->form_validation->set_message('password_check', $err_message);
                return FALSE;
            }
        }
        else
        {
            //admin has already logged in
            //maybe the error message should not be present in the page ==> redirect('admin')
            //another problem: should user logout before he/she login as another identity?
            $err_message = "管理员已登录，请不要重复登陆";
            $this->form_validation->set_message('password_check', $err_message);
            return FALSE;
        }
    }

	//action
    /*
     *submit login info
     */
	public function submit_login()
	{
        $this->load->library('form_validation');

        $rule_array = array(
            array(
                    'field' => 'email_address',
                    'label' => 'Email Address',
                    'rules' => 'trim|required|valid_email|max_length[32]|xss_clean'
                ),
            array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'trim|required|min_length[6]|max_length[12]|xss_clean|callback_password_check'
            )
        );
        $this->form_validation->set_rules($rule_array);

        //fail to pass form validation, so "redirect" to login page
        if ($this->form_validation->run() === FALSE)
        {	
            $data['error_msg'] = validation_errors();
        }
        //else if success to pass the form validation
        else
        {
            $data['error_msg'] = 'OK';
            redirect('admin', 'refresh');
            return;
        }
        if (! $this->input->is_ajax_request())
        {
            $this->login();
        }
        else
        {
            echo json_encode($data);
        }
	}
	
    /*
     *submit logout request
     */
	public function submit_logout()
	{
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        $this->admin_model->logout();
        redirect('admin/login', 'refresh');
	}

    /*
     *insert focus map into DB
     */
    public function submit_insert_focus_map()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        $valid_config = array(
            array(
                    'field' => 'project_id',
                    'label' => '项目ID',
                    'rules' => 'trim|integer|required|xss_clean|callback_project_id_check'
            )    
        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules($valid_config);

        //cofig of file upload
        $config['upload_path'] = './uploads/admin';
        $config['allowed_types'] = 'gif|png|jpg|bmp|jpeg';
        $config['max_size'] = 1024;
        $config['encrypt_name'] = 'TRUE';

        $this->load->library('upload', $config);
        
        if ($this->form_validation->run() === FALSE)
        {
            $data['error_msg'] = validation_errors();
        }
        else
        {
            if (! $this->upload->do_upload('focus_map_upload'))
            {
                $data['error_msg'] = $this->upload->display_errors('<p>','</p>');
            }
            else
            {
                $upload_data = $this->upload->data();
                $focus_map_name = $upload_data['file_name'];
                $pid = $this->input->post('project_id');
                //obtain a hpid from t_globalid table
                $hpid = $this->Globalid->get_insert_id('hpid');
                $ret = $this->admin_model->insert_focus_map($hpid, $focus_map_name, $pid);

                if ($ret === TRUE)
                {
                    $data['error_msg'] = 'OK';
                    redirect('admin/focus_map', 'refresh');    

                    return;
                }
                else
                {
                    //delete the pic
                    $full_path = $upload_data['full_path'];
                    $this->load->helper('file');
                    delete_files($full_path);
                    $data['error_msg'] = '插入数据库错误，上传文件已删除';
                }
            }
        }

        if (! $this->input->is_ajax_request())
        {
            ob_clean(); //clear the empty line
            $data['active'] = array('inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive');		
            $data['title'] = '焦点图 | 慈善网';
            $data['focus_map'] = $this->admin_model->get_focus_map();
            $this->load->view('admin_inc/header', $data);
            $this->load->view('admin/focus_map');
            $this->load->view('admin_inc/footer');
        }
        else
        {
            echo json_encode($data);
        }
    }

    /*
     *callback method for validation of project_id
     */
    public function project_id_check()
    {
        $project_id = $this->input->post('project_id');

        if ($this->admin_model->check_valid_project($project_id) === FALSE)
        {
            $error_msg = "该项目ID不存在或审核未通过，请重新输入";
            $this->form_validation->set_message('project_id_check', $error_msg);
            return FALSE;
        }

        return TRUE;
    }

    /*
     *callback method for checking if project id exists already
     */
    public function project_exist_check()
    {
        $project_id = $this->input->post('project_id');

        if ($this->admin_model->check_project_exist($project_id) === TRUE)
        {
            $error_msg = "推荐项目中已经存在该项目，请重新输入项目ID";
            $this->form_validation->set_message('project_exist_check', $error_msg);
            return FALSE;
        }

        return TRUE;
    }

    /*
     *modify focus map
     */
    public function submit_modify_focus_map()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        //first to check the form, project_id field
        $valid_config = array(
            array(
                    'field' => 'project_id',
                    'label' => '项目ID',
                    'rules' => 'trim|integer|required|xss_clean|callback_project_id_check'
                )
        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules($valid_config);

        //config of file upload
        $config['upload_path'] = './uploads/admin';
        $config['allowed_types'] = 'gif|png|jpg|bmp|jpeg';
        $config['max_size'] = 500;
        $config['encrypt_name'] = 'TRUE';

        $this->load->library('upload', $config);
        
        if ($this->form_validation->run() === FALSE)
        {
            $data['error_msg'] = validation_errors();
        }
        else
        {
            if (! $this->upload->do_upload('focus_map_upload'))
            {
                $data['error_msg'] = $this->upload->display_errors('<p>','</p>');
            }
            else
            {
                $upload_data = $this->upload->data();
                $focus_map_name = $upload_data['file_name'];
                $hpid = $this->input->post('hpid');
                $pid = $this->input->post('project_id');

                $ret = $this->admin_model->modify_focus_map($hpid, $focus_map_name, $pid);

                if ($ret === TRUE)
                {
                    $data['error_msg'] = 'OK';
                    redirect('admin/focus_map', 'refresh');    

                    return;
                }
                else
                {
                    //delete the pic
                    $full_path = $upload_data['full_path'];
                    $this->load->helper('file');
                    delete_files($full_path);
                    $data['error_msg'] = '修改数据库错误，上传文件已删除';
                }
            }
        }

        if (! $this->input->is_ajax_request())
        {
            ob_clean(); //clear the empty line
            $data['active'] = array('inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive');		
            $data['title'] = '焦点图 | 慈善网';
            $data['focus_map'] = $this->admin_model->get_focus_map();
            $this->load->view('admin_inc/header', $data);
            $this->load->view('admin/focus_map');
            $this->load->view('admin_inc/footer');
        }
        else
        {
            echo json_encode($data);
        }
    }

    /*
     *delete focus map from DB
     */
    public function submit_withdraw_focus_map($hpid)
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        $ret = $this->admin_model->withdraw_focus_map($hpid);
        if ($ret === TRUE)
        {
            $data['error_msg'] = "OK";
            redirect('admin/focus_map', 'refresh');

            return;
        }
        else
        {
            $data['error_msg'] = "删除焦点图失败！";
        }

        if (! $this->input->is_ajax_request())
        {
            ob_clean(); //clear the empty line
            $data['active'] = array('inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive');		
            $data['title'] = '焦点图 | 慈善网';
            $data['focus_map'] = $this->admin_model->get_focus_map();
            $this->load->view('admin_inc/header', $data);
            $this->load->view('admin/focus_map');
            $this->load->view('admin_inc/footer');
        }
        else
        {
            echo json_encode($data);
        }
    }

    /*
     *insert a help recommend 
     */
    public function submit_insert_help_recommend()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        $valid_config = array(
            array(
                    'field' => 'project_id',
                    'label' => '项目ID',
                    'rules' => 'trim|integer|required|xss_clean|callback_project_id_check|callback_project_exist_check'
            )    
        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules($valid_config);

        if ($this->form_validation->run() === FALSE)
        {
            $data['insert_error_msg'] = validation_errors();
        }
        else
        {
            $pid = $this->input->post('project_id');
            //obtain a hpid from t_globalid table
            $rpid = $this->Globalid->get_insert_id('rpid');
            $ret = $this->admin_model->insert_help_recommend($rpid, $pid);

            if ($ret === TRUE)
            {
                $data['insert_error_msg'] = 'OK';
                redirect('admin/recommend', 'refresh');    

                return;
            }
            else
            {
                $data['insert_error_msg'] = '插入数据库错误';
            }
        }

        if(! $this->input->is_ajax_request())
        {
            ob_clean(); //clear the empty line
            $data['active'] = array('inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive');		
            $data['title'] = '求助推荐 | 慈善网';
            $data['recommend_list'] = $this->admin_model->get_help_recommend_list();
            $data['modify_error_msg'] = "";
            $this->load->view('admin_inc/header', $data);
            $this->load->view('admin/recommend');
            $this->load->view('admin_inc/footer');	
        }
        else
        {
            echo json_encode($data);
        }
    }

    /*
     *modify a help recommend
     */
    public function submit_modify_help_recommend()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }
        
        //first to check the form, project_id field
        $valid_config = array(
            array(
                    'field' => 'project_id',
                    'label' => '项目ID',
                    'rules' => 'trim|integer|required|xss_clean|callback_project_id_check'
                ),
            array(
                    'field' => 'description',
                    'label' => '项目描述',
                    'rules' => 'trim|required|max_length[40]|xss_clean'
                )
        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules($valid_config);

        if ($this->form_validation->run() === FALSE)
        {
            $data['modify_error_msg'] = validation_errors();
        }
        else
        {
            $rpid = $this->input->post('rpid');
            $pid = $this->input->post('project_id');
            $desc = $this->input->post('description');
            
            $ret = $this->admin_model->modify_help_recommend($rpid, $pid, $desc); 
            if ($ret === TRUE)
            {
                $data['modify_error_msg'] = 'OK';
                redirect('admin/recommend', 'refresh');    

                return;
            }
            else
            {
                $data['modify_error_msg'] = '修改数据库错误';
            }
        }

        if (! $this->input->is_ajax_request())
        {
            ob_clean(); //clear the empty line
            $data['active'] = array('inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive');		
            $data['title'] = '求助推荐 | 慈善网';
            $data['recommend_list'] = $this->admin_model->get_help_recommend_list();
            $data['insert_error_msg'] = "";
            $this->load->view('admin_inc/header', $data);
            $this->load->view('admin/recommend');
            $this->load->view('admin_inc/footer');	
        }
        else
        {
            echo json_encode($data);
        }
    } 

    /*
     *withdraw a help recommend 
     */
    public function submit_withdraw_help_recommend($rpid)
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        $ret = $this->admin_model->withdraw_help_recommend($rpid);
        if ($ret === TRUE)
        {
            $data['modify_error_msg'] = "OK";
            redirect('admin/recommend', 'refresh');

            return;
        }
        else
        {
            $data['modify_error_msg'] = "删除求助推荐失败！";
        }

        if (! $this->input->is_ajax_request())
        {
            ob_clean(); //clear the empty line
            $data['active'] = array('inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive');		
            $data['title'] = '求助推荐 | 慈善网';
            $data['recommend_list'] = $this->admin_model->get_help_recommend_list();
            $data['insert_error_msg'] = "";
            $this->load->view('admin_inc/header', $data);
            $this->load->view('admin/recommend');
            $this->load->view('admin_inc/footer');	
        }
        else
        {
            echo json_encode($data);
        }
    }

    /*
     *delete a user
     */
    public function submit_del_user($uid)
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }
        
        //transaction can be closed
        //$this->db->trans_start();
        $ret_passport = $this->admin_model->del_passport($uid);
        $ret_user = $this->admin_model->del_user($uid);
        //$this->db->trans_complete();

        if ( $ret_passport && $ret_user )
        {
            $data['error_msg'] = 'OK';
            redirect('admin/user_info', 'refresh');

            return;
        }

        else
        {
            $data['error_msg'] = '删除用户失败';
        }
        
        if (! $this->input->is_ajax_request())
        {
            echo $data['error_msg'];
        }
        else
        {
            echo json_encode($data);
        }
    }

    /*
     *modify a gid for a user
     */
    public function submit_modify_user()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        $gid = $this->input->post('gid');
        $uid = $this->input->post('uid');

        if ($this->admin_model->modify_user($uid, $gid) === TRUE)
        {
            $data['error_msg'] = 'OK';
            redirect('admin/user_info', 'refresh');

            return;
        }
        else
        {
            $data['error_msg'] = '修改用户失败';
        }
        
        if (! $this->input->is_ajax_request())
        {
            echo $data['error_msg'];
        }
        else
        {
            echo json_encode($data);
        }
    }

    /*
     *callback method for valid endtime
     */
    public function end_time_check()
    {
        $begin_time = $this->input->post('begin_date');
        $end_time = $this->input->post('end_date');

        if (strtotime($end_time) > 0 && strtotime($end_time) < strtotime($begin_time))
        {
            $this->form_validation->set_message('end_time_check', '结束时间必须晚于开始时间');
            return FALSE;
        }

        return TRUE;
    }

    public function transfer_no_check()
    {
        $transfer_no = $this->input->post('number');
        $c_transfer_no = $this->input->post('confirm_number');

        if($transfer_no != $c_transfer_no)
        {
            $this->form_validation->set_message('transfer_no_check', '转账单号两次输入不一致');
            return FALSE;
        }
    }

    /*
     *get all donate info (data summary)
     */
    public function submit_get_summary()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        //can be improved
        $valid_time = '^\d{4,4}-\d{1,2}-\d{1,2}$';
        $rule_array = array(
            array(
                'field' => 'begin_date',
                'label' => '开始时间',
                'rules' => 'trim|xss_clean|regex_match[/'.$valid_time.'/]'
            ),
            array(
                'field' => 'end_date',
                'label' => '结束时间',
                'rules' => 'trim|xss_clean|regex_match[/^\d{4,4}-\d{1,2}-\d{1,2}$/]|callback_end_time_check'    
            )
        );
        $this->load->library('form_validation');
        $this->form_validation->set_rules($rule_array);

        if ($this->form_validation->run() === FALSE)
        {
            $data['error_msg'] = validation_errors();
            $donate_list = $this->admin_model->get_donate_list();
            $total_page = $this->admin_model->get_donate_page_no();

            $data['donate_list'] = $donate_list;
            $data['begin_date'] = "";
            $data['end_date'] = "";
            $data['category'] = 0;
            $data['pname'] = "";
            $data['type'] = 0;
        }
        else
        {
            $data['error_msg'] = 'OK';

            $begin_date = $this->input->post('begin_date');
            $end_date = $this->input->post('end_date');
            $category = $this->input->post('category');
            $proj_name = $this->input->post('project_name');
            $user_type = $this->input->post('user_type');

            $begin_time = strtotime($begin_date);
            $end_time = strtotime($end_date);

            if ($begin_date == "")
            {
                $begin_time = 0;
            }

            if ($end_date == "")
            {
                $end_time = 0;
            }

            $donate_list = $this->admin_model->get_donate_list(1, $begin_time, $end_time, $category, $proj_name, $user_type);
            $total_page = $this->admin_model->get_donate_page_no($begin_time, $end_time, $category, $proj_name, $user_type);

            $data['donate_list'] = $donate_list;
            $data['begin_date'] = $begin_date;
            $data['end_date'] = $end_date;
            $data['category'] = $category;
            $data['pname'] = $proj_name;
            $data['type'] = $user_type;
        }

        if (! $this->input->is_ajax_request())
        {
            ob_clean(); //clear the empty line
            $data['active'] = array('inactive', 'inactive', 'active', 'inactive', 'inactive', 'inactive');
            $data['title'] = '数据统计 | 慈善网';
            $data['donate_list'] = $donate_list;
            $data['total_page'] = $total_page;

            $this->load->view('admin_inc/header', $data);
            $this->load->view('admin/data_stat');
            $this->load->view('admin_inc/footer');
        }
        else
        {
            echo json_encode($data);
        }

    }

    /*
     *page segment related
     */
    public function get_summary_per_page()
    {
        $begin_date = $this->input->get('begin_date');
        $end_date = $this->input->get('end_date');
        $category = $this->input->get('category');
        $proj_name = $this->input->get('project_name');
        $user_type = $this->input->get('user_type');
        $page_no = $this->input->get('page');

        $begin_time = strtotime($begin_date);
        $end_time = strtotime($end_date);

        if ($begin_date == "")
        {
            $begin_time = 0;
        }

        if ($end_date == "")
        {
            $end_time = 0;
        }

        $donate_list = $this->admin_model->get_donate_list($page_no, $begin_time, $end_time, $category, $proj_name, $user_type);
        
        //$donate_list = $this->admin_model->get_donate_list(1, -1, -1, 0, "", 0);
        //$total_page = $this->admin_model->get_donate_page_no($begin_time, $end_time, $category, $proj_name, $user_type);
        //$total_page = $this->admin_model->get_donate_page_no(-1, -1, 0, "", 0);

        $data['donate_list'] = $donate_list;
        $data['begin_date'] = $begin_date;
        $data['end_date'] = $end_date;
        $data['category'] = $category;
        $data['pname'] = $proj_name;
        $data['type'] = $user_type;
        //$data['total_page'] = $total_page;

        echo json_encode($data);
    }

    /*
     *get invoice list
     */
    public function submit_get_invoice()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        //can be improved
        $valid_time = '^\d{4,4}-\d{1,2}-\d{1,2}$';
        $rule_array = array(
            array(
                'field' => 'begin_date',
                'label' => '开始时间',
                'rules' => 'trim|xss_clean|regex_match[/'.$valid_time.'/]'
            ),
            array(
                'field' => 'end_date',
                'label' => '结束时间',
                'rules' => 'trim|xss_clean|regex_match[/^\d{4,4}-\d{1,2}-\d{1,2}$/]|callback_end_time_check'    
            )
        );
        $this->load->library('form_validation');
        $this->form_validation->set_rules($rule_array);

        if ($this->form_validation->run() === FALSE)
        {
            $data['error_msg'] = validation_errors();
            $invoice_list = $this->admin_model->get_all_invoice_list();
        }
        else
        {
            $data['error_msg'] = 'OK';

            $begin_date = $this->input->post('begin_date');
            $end_date = $this->input->post('end_date');
            $category = $this->input->post('category');
            $proj_name = $this->input->post('project_name');

            $begin_time = strtotime($begin_date);
            $end_time = strtotime($end_date);

            if ($begin_date == "")
            {
                $begin_time = 0;
            }

            if ($end_date == "")
            {
                $end_time = 0;
            }

            $invoice_list = $this->admin_model->get_invoice_list($begin_time, $end_time, $category, $proj_name);
        }

        if (! $this->input->is_ajax_request())
        {
            ob_clean(); //clear the empty line
            $data['active'] = array('inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'active');
            $data['title'] = '发票申请 | 慈善网';
            $data['invoice_list'] = $invoice_list;

            $this->load->view('admin_inc/header', $data);
            $this->load->view('admin/invoice');
            $this->load->view('admin_inc/footer');
        }
        else
        {
            echo json_encode($data);
        }
    }

    /*
     *get project info list
     */
    public function submit_get_project_info()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        //can be improved
        $valid_time = '^\d{4,4}-\d{1,2}-\d{1,2}$';
        $rule_array = array(
            array(
                'field' => 'begin_date',
                'label' => '开始时间',
                'rules' => 'trim|xss_clean|regex_match[/'.$valid_time.'/]'
            ),
            array(
                'field' => 'end_date',
                'label' => '结束时间',
                'rules' => 'trim|xss_clean|regex_match[/^\d{4,4}-\d{1,2}-\d{1,2}$/]|callback_end_time_check'    
            )
        );
        $this->load->library('form_validation');
        $this->form_validation->set_rules($rule_array);

        if ($this->form_validation->run() === FALSE)
        {
            $data['error_msg'] = validation_errors();
            $project_info_list = $this->admin_model->get_all_project_info_list();
        }
        else
        {
            $data['error_msg'] = 'OK';

            $begin_date = $this->input->post('begin_date');
            $end_date = $this->input->post('end_date');
            $category = $this->input->post('category');
            $proj_name = $this->input->post('project_name');
            $status = $this->input->post('status');

            $begin_time = strtotime($begin_date);
            $end_time = strtotime($end_date);

            if ($begin_date == "")
            {
                $begin_time = 0;
            }

            if ($end_date == "")
            {
                $end_time = 0;
            }

            $project_info_list = $this->admin_model->get_project_info_list($begin_time, $end_time, $category, $proj_name, $status);

            //print var_dump($project_info_list[0]);
            //return;
        }

        if (! $this->input->is_ajax_request())
        {
            ob_clean(); //clear the empty line
            $data['active'] = array('inactive', 'inactive', 'inactive', 'inactive', 'active', 'inactive');
            $data['title'] = '项目审核 | 慈善网';
            $data['project_info_list'] = $project_info_list;

            $this->load->view('admin_inc/header', $data);
            $this->load->view('admin/project_info');
            $this->load->view('admin_inc/footer');
        }
        else
        {
            echo json_encode($data);
        }
    }

    /*
     *clear those projects whose end time passes right now
     */
    public function submit_clear_outofdate_project()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        $today = date('Y-m-d');
        $end_time_bound = strtotime($today);

        $project_info_list = $this->admin_model->get_project_info_list(0, 0, 0, "", 0, $end_time_bound);

        if (! $this->input->is_ajax_request())
        {
            ob_clean(); //clear the empty line
            $data['active'] = array('inactive', 'inactive', 'inactive', 'inactive', 'active', 'inactive');
            $data['title'] = '项目审核 | 慈善网';
            $data['project_info_list'] = $project_info_list;

            $this->load->view('admin_inc/header', $data);
            $this->load->view('admin/project_info');
            $this->load->view('admin_inc/footer');
        }
        else
        {
            echo json_encode($data);
        }
    }

    /*
     *audit user
     *option = 3, audit
     *option = 5, deny 
     */
    public function submit_audit_project($pid, $option)
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }
        if($option == 5)
	        $project_info = $this->Project_model->get_project_info($pid);
        $del_ret = $this->admin_model->audit_project($pid, $option);
        if($option == 3)
	        $project_info = $this->Project_model->get_project_info($pid);

        if($del_ret === TRUE)
        {
            $data['error_msg'] = "OK";
			$nid = $this->Globalid->get_insert_id('nid');
            $title = $project_info->title;
            $uid = $project_info->uid;
			if($option == 3) {
				$content = '您的项目'.$title.'已经通过审核,请您随时关注并反馈项目进展,感谢您对乐慈网的支持!';
			}else{
				$content = '您的项目'.$title.'未通过审核,请您再核查您的项目资料,并希望您再次发起求助,感谢您对乐慈网的支持!';
			}
			$this->Notification_model->insert_notification($nid,$uid,$pid,$content);
            redirect('admin/project_info', 'refresh');
            return;
        }

        else
        {
            $data['error_msg'] = '审核项目失败';
        }

        if (! $this->input->is_ajax_request())
        {
            $this->project_info();
        }
        else
        {
            echo json_encode($data);
        }
    }

    /*
     *insert a enterprise donate
     */
    public function submit_insert_enterprise_donate()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }

        $valid_config = array(
            array(
                    'field' => 'enterprise_name',
                    'label' => '企业名称',
                    'rules' => 'trim|required|xss_clean'
            ),    
            array(
                    'field' => 'project_id',
                    'label' => '项目ID',
                    'rules' => 'trim|required|integer|xss_clean|callback_project_id_check'
            ),    
            array(
                    'field' => 'money',
                    'label' => '捐款金额',
                    'rules' => 'trim|required|regex_match[/^\d*(\.\d{1,2})?$/]|xss_clean'
                    //'rules' => 'trim|required||xss_clean'
            ),    
            array(
                    'field' => 'phone',
                    'label' => '联系方式',
                    'rules' => 'trim|required|regex_match[/^(13|15|18)\d{9}$/]|xss_clean'
                    //'rules' => 'trim|required|xss_clean'
            ),    
            array(
                    'field' => 'number',
                    'label' => '转账单号',
                    'rules' => 'trim|required|alpha_numeric|xss_clean'
            ),    
            array(
                    'field' => 'confirm_number',
                    'label' => '确认转账单号',
                    'rules' => 'trim|required|alpha_numeric|xss_clean|callback_transfer_no_check'
            )    
        );
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules($valid_config);

        if ($this->form_validation->run() === FALSE)
        {
            $data['error_msg'] = validation_errors();
        }
        else
        {
            $enterprise_name = $this->input->post('enterprise_name');
            $project_id = $this->input->post('project_id');
            $money = $this->input->post('money') * 100;
            $phone = $this->input->post('phone');
            $method = $this->input->post('method');
            $number = $this->input->post('number');
            $confirm_number = $this->input->post('confirm_number');
            $bill_no = 0;
            $confirm_bill_no = 0;
            $bank = $this->input->post('bank'); 
            if ($method == 1)
            {
                $bill_no = $this->input->post('bill_no');
                $confirm_bill_no = $this->input->post('confirm_bill_no');
            }
            
            $did = $this->Globalid->get_insert_id('did');
            $ret = $this->admin_model->insert_enterprise_donate($did, $enterprise_name, $project_id, $money, $phone, $method, $number, $bank, $bill_no);

            if ($ret === TRUE)
            {
                $data['error_msg'] = "OK";
                redirect('admin', 'refresh');

                return;
            }
            else
            {
                $data['error_msg'] = "数据插入失败";
            }
        }
        if (! $this->input->is_ajax_request())
        {
            ob_clean(); //clear the empty line
            $data['active'] = array('active', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive');
            $data['title'] = '企业捐款 | 慈善网';
            $this->load->view('admin_inc/header', $data);
            $this->load->view('admin/enterprise_donate');
            $this->load->view('admin_inc/footer');
        }
        else
        {
            echo json_encode($data);
        }
    }

    /*
     *get project name for a pid
     */
    public function get_project_name_by_pid()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }
        
        $pid = $this->input->post('pid');
        $project_name = $this->admin_model->get_project_name_by_pid($pid);
        
        if( $project_name !== FALSE)
        {
            echo $project_name;
            return;
        }
        ob_clean();
        echo "0";
        return;
    }

    /*
     *check if the given name correspond to the enterprise name
     */
    public function check_enterprise_name()
    {
        if ($this->admin_model->check_admin_login() === FALSE)
        {
            redirect('admin/login', 'refresh');
        }
        
        $user_name = $this->input->post('enterprise_name');
        $ret = $this->admin_model->check_enterprise_name($user_name);

        ob_clean();
        echo "".$ret;
        return;
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
