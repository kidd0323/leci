<?php
/**
 * Admin Model Class
 *
 * @author LiangFeng <liangfeng1987@gmail.com>
 * @version 1.0
 */
class Admin_model extends CI_Model {
	function __constructor()
	{
		parent::__constructor();
	}
	
    /*
     *check if the admin has already logged in
     */
	public function check_admin_login()
	{
        return $this->session->userdata('admin_id');
	}
	
    /*
     *check if admin account exists
     */
	public function check_admin_exists($email)
    {
        $valid_gid = 1;
        $status = 2;
		$this->db->flush_cache();
        $query = $this->db
                      ->where('email', $email)
                      ->where('gid', $valid_gid)
                      ->where('status', $status)
                      ->limit(1)
                      ->get('cs_passport');

        if ($query->num_rows() > 0)
        {
            return TRUE;
        }

        return FALSE;
	}
	
    /*
     *check if the password is matched up with the email address
     */
	public function check_admin_pwd($email, $password)
	{
        $this->db->flush_cache();
		$query = $this->db
					  ->where('email', $email)
				      ->where('password', sha1($password))
					  ->limit(1)
				      ->get('cs_passport');
		
        if($query->num_rows() > 0)
        {
            //modify the session
            $user_data = array(
                'uid' => $query->row()->uid,
                'admin_id' => $query->row()->uid,
                'nickname' => $query->row()->nickname
                );    

            $this->session->set_userdata($user_data);

            return TRUE;
		}
		
		return FALSE;
	}

    /*
     *logout, destroy the session
     */
    public function logout()
    {
        $this->session->sess_destroy();

        return TRUE;
    }

    /*
     *get focus map to display in table
     */
    public function get_focus_map()
    {
        $root = $this->config->item('root');
        $status = 2;
		$this->db->flush_cache();
        $query = $this->db
                      ->where('status', $status)
                      ->get('cs_head_picture');

        if ($query->num_rows() == 0)
        {
            return FALSE;
        }

        $focus_map_list = array();
                       
        foreach($query->result() as $row)
        {
            $focus_map = NULL;
            $focus_map->hpid = $row->hpid;
            $focus_map->project_id = $row->pid;
            $focus_map->pic_url = $root."/uploads/admin/".$row->pic_url;
            $focus_map->last_modify_time = date('Y-m-d H:i:s', $row->modify_time);
			$this->db->flush_cache();
            $sub_query = $this->db
                              ->where('uid', $row->cuid)
                              ->where('status', $status)
                              ->get('cs_passport');
            //$focus_map->create_admin_name = $row->nickname;
            if ($sub_query->num_rows() == 1)
            {
                $focus_map->create_admin_name = $sub_query->row()->nickname;
                $focus_map_list [] = $focus_map;
            }
        }

        return $focus_map_list;
    }

    /*
     *check if the project ID exists
     */
    public function check_valid_project($project_id) 
    {
		$this->db->flush_cache();
        $query = $this->db
                      ->where('pid', $project_id)
                      ->where('status', 3)
                      ->limit(1)
                      ->get('cs_project');

        if ($query->num_rows() == 1)
        {
            return TRUE;
        }

        return FALSE;
    }

    /*
     *check if the project is already in the recommend project
     */
    public function check_project_exist($project_id)
    {
		$this->db->flush_cache();
        $query = $this->db
                      ->where('pid', $project_id)
                      ->where('status', 3)
                      ->limit(1)
                      ->get('cs_recmd_project');

        if ($query->num_rows() == 1)
        {
            return TRUE;
        }

        return FALSE;
    }

    /*
     *insert focus mapd method
     */
    public function insert_focus_map($hpid, $pic_url, $pid)
    {
        $cuid = $this->session->userdata('admin_id');
        $create_time = strtotime("now");
        $status = 2;

        $insert_data = array(
            'hpid' => $hpid,
            'pid' => $pid,
            'cuid' => $cuid,
            'pic_url' => $pic_url,
            'create_time' => $create_time,
            'modify_time' => $create_time,
            'status' => $status
        );
		$this->db->flush_cache();
        $this->db->insert('cs_head_picture', $insert_data);
        
        if($this->db->affected_rows() == 1)
        {
            return TRUE;
        }

        return FALSE;
    }

    /*
     *modify focus map method
     */
    public function modify_focus_map($hpid, $pic_url, $pid)
    {
        $now_time = strtotime('now');

        $update_array = array(
                        'pic_url' => $pic_url,
                        'pid' => $pid,
                        'modify_time' => $now_time
                        );
		$this->db->flush_cache();
        $this->db->where('hpid', $hpid);
        $this->db->update('cs_head_picture', $update_array);

        if ($this->db->affected_rows() == 1)
        {
            return TRUE;
        }

        return FALSE;
    }

    /*
     *delete the focus map
     */
    public function withdraw_focus_map($hpid)
    {
        $del_array = array(
                        'status' => 1
                    );
		$this->db->flush_cache();
        $this->db->where('hpid', $hpid);
        $this->db->update('cs_head_picture', $del_array);
        
        if($this->db->affected_rows() == 1)
        {
            return TRUE;
        }

        return FALSE;
    }

    /*
     *get help recommend list
     */
    public function get_help_recommend_list()
    {
        $status = 2;
		$this->db->flush_cache();
        $query = $this->db
                      ->where('status', $status)
                      ->get('cs_recmd_project');

        if ($query->num_rows() == 0)
        {
            return FALSE;
        }

        $help_recmd_list = array();
        foreach ($query->result() as $row)
        {
            $help_recmd = NULL;
            $help_recmd->rpid = $row->rpid;
            $help_recmd->project_id = $row->pid;
            $help_recmd->title = $row->title;
            $help_recmd->description = $row->description;
            $help_recmd->modify_time = date('Y-m-d H:i:s', $row->modify_time);
			$this->db->flush_cache();
            $sub_query = $this->db
                              ->where('uid', $row->cuid)
                              ->where('status', $status)
                              ->get('cs_passport');

            if($sub_query->num_rows() == 1)
            {
                $help_recmd->create_admin_name = $sub_query->row()->nickname;
                $help_recmd_list [] = $help_recmd;
            }       
        }

        return $help_recmd_list;
    }

    /*
     *insert a help recommend
     */
    public function insert_help_recommend($rpid, $pid)
    {
        $cuid = $this->session->userdata('admin_id');
        $create_time = strtotime('now');
        $status = 2;

        //get title and short description from cs_project
		$this->db->flush_cache();
        $query = $this->db
                      ->where('pid', $pid)
                      ->where('status', 3)
                      ->limit(1)
                      ->get('cs_project');
        
        if ($query->num_rows() == 0)
        {
            return FALSE;
        }

        $title = $query->row()->title;
        $desc = $query->row()->short_description;

        $insert_data = array(
            'rpid' => $rpid,
            'pid' => $pid,
            'cuid' => $cuid,
            'title' => $title,
            'description' => $desc,
            'create_time' => $create_time,
            'modify_time' => $create_time,
            'status' => $status
        );
		$this->db->flush_cache();
        $this->db->insert('cs_recmd_project', $insert_data);

        if($this->db->affected_rows() == 1)
        {
            return TRUE;
        }

        return FALSE;
    }

    /*
     *modify help recommend
     */
    public function modify_help_recommend($rpid, $pid, $description)
    {
        $status = 3;
        $now_time = strtotime('now'); 
        // get the corresponding title for given $pid, it supposed to 
        // get help from Project_model, but it doesn't have title info
        // it must be refined in the next version
		$this->db->flush_cache();
        $query = $this->db
                      ->where('pid', $pid)
                      ->where('status', $status)
                      ->limit(1)
                      ->get('cs_project');
        
        if ($query->num_rows() == 0)
        {
            return FALSE;
        }

        $update_array = array(
                       'pid' => $pid,
                       'title' => $query->row()->title,
                       'description' => $description,
                       'modify_time' => $now_time
                   );
		$this->db->flush_cache();
        $this->db->where('rpid', $rpid);
        $this->db->update('cs_recmd_project', $update_array);

        if ($this->db->affected_rows() == 1)
        {
            return TRUE;
        }

        return FALSE;
    }

    /*
     *delete the help recommend
     */
    public function withdraw_help_recommend($rpid)
    {
        $del_array = array(
                        'status' => 1
                    );
		$this->db->flush_cache();
        $this->db->where('rpid', $rpid);
        $this->db->update('cs_recmd_project', $del_array);

        if ($this->db->affected_rows() == 1)
        {
            return TRUE;
        }

        return FALSE;
    }

    /*
     *get all user info
     *discarded!
     */
    public function delete_get_user_list()
    {
		$this->db->flush_cache();
        $this->db->select('cs_passport.*, cs_user.idcard, cs_user.phone');
        $this->db->from('cs_passport');
        $this->db->join('cs_user', 'cs_passport.uid=cs_user.uid');
        $this->db->where('cs_passport.status', 2);
        $this->db->where('cs_user.status', 2);

        $query = $this->db->get();

        $user_list = array();

        foreach ($query->result() as $row)
        {
            $user = NULL;
            $user->uid = $row->uid;
            $user->email = $row->email;
            $user->create_time = date('Y-m-d H:i:s', $row->create_time);
            $user->nickname = $row->nickname;
            $user->idcard = $row->idcard;
            $user->phone = $row->phone;

            $user_list [] = $user;
        }

        return $user_list;
    }

    /*
     *get all user list
     */
    public function get_user_list()
    {
		$this->db->flush_cache();
        $query = $this->db
                      ->where('status', 2)
                      ->get('cs_passport');

        $user_list = array();

        foreach ($query->result() as $row)
        {
            $user = NULL;
            $user->uid = $row->uid;
            $user->email = $row->email;
            $user->create_time = date('Y-m-d H:i:s', $row->create_time);
            $user->nickname = $row->nickname;
            $user->gid = $row->gid;
			$this->db->flush_cache();
            $sub_query = $this->db
                              ->where('uid', $row->uid)
                              ->where('status', 2)
                              ->limit(1)
                              ->get('cs_user');
            
            if ($sub_query->num_rows() == 1)
            {
                $user->idcard = $sub_query->row()->idcard;
                $user->phone = $sub_query->row()->phone;
            }

            else
            {
                $user->idcard = "";
                $user->phone = "";
            }

            $user_list [] = $user;
        }

        return $user_list;
    }

    /*
     *get user information list per page
     *add by @liangfen AT 2012-6-2
     */
    public function get_user_info_list($page_no = 1)
    {
        //load pagination config
        $this->load->config('pagination');
        $per_page = $this->config->item('user_per_page');

        //flush DB cache
        $this->db->flush_cache();

        //SQL query
        $query = $this->db
                      ->where('status', 2)
                      ->limit($per_page, $per_page * ($page_no - 1))
                      ->get('cs_passport');

        $user_list = array();

        foreach ($query->result() as $row)
        {
            $user = NULL;
            $user->uid = $row->uid;
            $user->email = $row->email;
            $user->create_time = date('Y-m-d H:i:s', $row->create_time);
            $user->nickname = $row->nickname;
            $user->gid = $row->gid;
			$this->db->flush_cache();
            $sub_query = $this->db
                              ->where('uid', $row->uid)
                              ->where('status', 2)
                              ->limit(1)
                              ->get('cs_user');
            
            if ($sub_query->num_rows() == 1)
            {
                $user->idcard = $sub_query->row()->idcard;
                $user->phone = $sub_query->row()->phone;
            }

            else
            {
                $user->idcard = "";
                $user->phone = "";
            }

            $user_list [] = $user;
        }

        return $user_list;
    }

    /*
     *get total user number
     *add by @liangfeng AT 2012-6-2
     */
    public function get_user_total_num()
    {
        //load pagination config
        $this->load->config('pagination');
        $per_page = $this->config->item('user_per_page');

        //flush the DB
        $this->db->flush_cache();

        //SQL query
        $query = $this->db
                      ->where('status', 2)
                      ->get('cs_passport');

        $total_page = $query->num_rows() / $per_page;
        return $total_page;
    }

    /*
     *delete a record in cs_passport
     */
    public function del_passport($uid)
    {
        $del_array = array(
                        'status' => 1
                    );
		$this->db->flush_cache();
        $this->db->where('uid', $uid);
        $this->db->update('cs_passport', $del_array);
        
        if($this->db->affected_rows() == 1)
        {
            return TRUE;
        }

        return FALSE;
    }

    /*
     *modify a gid for user
     */
    public function modify_user($uid, $gid)
    {
        $update_array = array(
            'gid' => $gid    
        ); 
		$this->db->flush_cache();
        $this->db->where('uid', $uid);
        $this->db->update('cs_passport', $update_array);

        if($this->db->affected_rows() == 1)
        {
            return TRUE;
        }

        return FALSE;
    }

    /*
     *delete a record in cs_user
     */
    public function del_user($uid)
    {
		$this->db->flush_cache();
        $query = $this->db
                      ->where('uid', $uid)
                      ->get('cs_user');

        if ($query->num_rows() == 0)
        {
            return TRUE;
        }

        $del_array = array(
                        'status' => 1
                    );
		$this->db->flush_cache();
        $this->db->where('uid', $uid);
        $this->db->update('cs_user', $del_array);
        
        if($this->db->affected_rows() == 1)
        {
            return TRUE;
        }

        return FALSE;
    }

    /*
     *get donate list w.r.t cs_donate, cs_category, cs_project
     */
    public function get_data_stat()
    {
		$this->db->flush_cache();
        $this->db->select('cs_donate.*, cs_category.name AS cname, cs_project.pid, cs_project.title');
        $this->db->from('cs_donate');
        $this->db->join('cs_project', 'cs_donate.pid=cs_project.pid', 'left'); 
        $this->db->join('cs_category', 'cs_project.cid=cs_category.cid', 'left');
        $this->db->where('cs_donate.status', 2);

        $query = $this->db->get();
        $donate_list = array();

        foreach($query->result() as $row)
        {
            $donate = NULL;
            $donate->create_time = date('Y-m-d H:i:s', $row->create_time);
            $donate->type = $row->cname;
            $donate->project_name = $row->title;
            $donate->project_id = $row->pid;
            $donate->nickname = $row->name;
            $donate->user_type = $row->type;
            $donate->money = $row->money;
            $donate->phone = $row->phone;

            $donate_list [] = $donate;
        }

        return $donate_list;
    }

    /*
     *get donate list by begin_time, end_time, category and project_name
     */
    public function get_donate_list($page_no = 1, $begin_time=-1, $end_time=-1, $category=0, $project_name="", $user_type = 0)
    {
        $this->load->config('pagination');
        $per_page = $this->config->item('donate_per_page');
		$this->db->flush_cache();
        $this->db->select('cs_donate.*, cs_category.name AS cname, cs_project.pid, cs_project.title');
        $this->db->from('cs_donate');
        $this->db->join('cs_project', 'cs_donate.pid=cs_project.pid', 'left'); 
        $this->db->join('cs_category', 'cs_project.cid=cs_category.cid', 'left');
        $this->db->where('cs_donate.status', 2);
        $this->db->where('cs_donate.process >=', 4);

        if($project_name != "")
        {
            $this->db->like('cs_project.title', $project_name);
        }

        if ($category > 0)
        {
            $this->db->where('cs_category.cid', $category);
        }

        if ($user_type > 0)
        {
            $this->db->where('cs_donate.type', $user_type);
        }

        if ($begin_time > 0)
        {
            $this->db->where('cs_donate.create_time >', $begin_time);
        }

        if ($end_time > 0)
        {
            $end_time += 86400;
            $this->db->where('cs_donate.create_time <', $end_time);
        }

        $this->db->limit($per_page, $per_page * ($page_no - 1));

        $query = $this->db->get();
        $donate_list = array();

        foreach($query->result() as $row)
        {
            $donate = NULL;
            $donate->create_time = date('Y-m-d H:i:s', $row->create_time);
            $donate->type = $row->cname;
            $donate->project_name = $row->title;
            $donate->project_id = $row->pid;
            $donate->nickname = $row->name;
            $donate->user_type = $row->type;
            $donate->money = $row->money / 100.0;
            $donate->phone = $row->phone;

            $donate_list [] = $donate;
        }

        return $donate_list;
    }

    /*
     *get the number of the donate list
     */
    public function get_donate_page_no($begin_time=-1, $end_time=-1, $category=0, $project_name="", $user_type = 0)
    {
        $this->load->config('pagination');
        $per_page = $this->config->item('donate_per_page');
		$this->db->flush_cache();
        $this->db->select('cs_donate.*, cs_category.name AS cname, cs_project.pid, cs_project.title');
        $this->db->from('cs_donate');
        $this->db->join('cs_project', 'cs_donate.pid=cs_project.pid', 'left'); 
        $this->db->join('cs_category', 'cs_project.cid=cs_category.cid', 'left');
        $this->db->where('cs_donate.status', 2);
        $this->db->where('cs_donate.process >=', 4);

        if($project_name != "")
        {
            $this->db->like('cs_project.title', $project_name);
        }

        if ($category > 0)
        {
            $this->db->where('cs_category.cid', $category);
        }

        if ($user_type > 0)
        {
            $this->db->where('cs_donate.type', $user_type);
        }

        if ($begin_time > 0)
        {
            $this->db->where('cs_donate.create_time >', $begin_time);
        }

        if ($end_time > 0)
        {
            $end_time += 86400;
            $this->db->where('cs_donate.create_time <', $end_time);
        }

        $query = $this->db->get();
        $total_page = $query->num_rows() / $per_page;

        return $total_page;
    }

    /*
     *get invoice list by begin_time, end_time, category, project_name
     */
    public function get_invoice_list($begin_time=0, $end_time=0, $category=0, $project_name="")
    {
		$this->db->flush_cache();
        $this->db->select('cs_invoice.*, cs_category.name, cs_project.pid, cs_project.title AS ptitle');
        $this->db->from('cs_invoice');
        $this->db->join('cs_project', 'cs_invoice.pid=cs_project.pid', 'left'); 
        $this->db->join('cs_category', 'cs_project.cid=cs_category.cid', 'left');
        $this->db->where('cs_invoice.status', 3);

        if ($project_name != "")
        {
            $this->db->like('cs_project.title', $project_name);
        }

        if ($category > 0)
        {
            $this->db->where('cs_category.cid', $category);
        }

        if ($begin_time > 0)
        {
            $this->db->where('cs_invoice.create_time >', $begin_time);
        }

        if($end_time > 0) 
        {
            $end_time += 86400;
            $this->db->where('cs_invoice.create_time <', $end_time);
        }

        $query = $this->db->get();
        $invoice_list = array();

        foreach($query->result() as $row)
        {
            $invoice = NULL;
            $invoice->invoice_num = $row->number;
            $invoice->apply_time = date('Y-m-d H:i:s', $row->create_time);
            $invoice->type = $row->name;
            $invoice->project_name = $row->ptitle;
            $invoice->project_id = $row->pid;
            $invoice->nickname = $row->receiver;
            $invoice->title = $row->title;
            $invoice->phone = $row->phone;
            $invoice->address = $row->address;
            $invoice->zip_code = $row->zip_code;

            $invoice_list [] = $invoice;
        }

        return $invoice_list;
    }

    /*
     *get project info list
     */
    public function get_project_info_list($begin_time=0, $end_time=0, $category=0, $project_name="", $status=0, $bound_time=0)
    {
        $root_url = $this->config->item('root');
		$this->db->flush_cache();
        $this->db->select('cs_project.*, cs_category.name, cs_passport.nickname');
        $this->db->from('cs_project');
        $this->db->join('cs_category', 'cs_project.cid=cs_category.cid', 'left');
        $this->db->join('cs_passport', 'cs_project.uid=cs_passport.uid', 'left');
        if ($project_name != "")
        {
            $this->db->like('cs_project.title', $project_name);
        }

        if ($category > 0)
        {
            $this->db->where('cs_category.cid', $category);
        }
        if ($status > 0)
        {
            $this->db->where('cs_project.status', $status);
        }

        if ($begin_time > 0)
        {
            $this->db->where('cs_project.start_time >', $begin_time);
        }

        if ($end_time > 0)
        {
            $end_time += 86400;
            $this->db->where('cs_project.end_time <', $end_time);
        }

        if ($bound_time > 0)
        {
            $this->db->where('cs_project.end_time >=', $bound_time);
        }

        $query = $this->db->get();
        $project_info_list = array();

        foreach($query->result() as $row)
        {
            $project_info = NULL;

            $project_info->nickname = $row->nickname;
            $project_info->start_time = date('Y-m-d H:i:s', $row->start_time);
            $project_info->end_time = date('Y-m-d H:i:s', $row->end_time);
            $project_info->project_id = $row->pid;
            $project_info->type = $row->name;
            $project_info->material = $root_url.'/uploads/application/'.$row->application_file;
            $project_info->project_name = $row->title;
            $project_info->project_desc = $row->short_description;
            $pic = explode(',', $row->picurl);
            //$project_info->image = $root_url.'/uploads/project/'.$pic[0];
            //foreach every picture
            $pic_array = array();
            foreach($pic as $pic_instant)
            {
                if ($pic_instant != "")
                $pic_array [] = $root_url.'/uploads/project/'.$pic_instant;
            }
            $project_info->image = $pic_array;

            $project_info->assist_obj = $row->assist_object;
            $project_info->status = $row->status;

            //possess related
            if ($row->poss_id != 0)
            {
                $poss_query = $this->db
                                   ->where('poss_id', $row->poss_id)
                                   ->limit(1)
                                   ->get('cs_possession');
                $project_info->money = $poss_query->row()->target_money / 100.0;
            }
            else
            {
                $project_info->money = "没有捐款请求";
            }

            //item related
            if ($row->iid != 0)
            {
                $item_query = $this->db
                                   ->where('iid', $row->iid)                
                                   ->limit(1)
                                   ->get('cs_item');
                $project_info->address = $item_query->row()->address;
            }
            else
            {
                $project_info->address = "没有捐物请求";
            }

            //volunteer related
            if ($row->vi_id != 0)
            {
                $volun_query = $this->db
                                    ->where('vi_id', $row->vi_id)
                                    ->limit(1)
                                    ->get('cs_volunteer_info');
                $project_info->volunteer_num = $volun_query->row()->number;
            }
            else
            {
                $project_info->volunteer_num = "没有志愿者信息";
            }

            $project_info_list [] = $project_info;
        }

        return $project_info_list;
    }

    /*
     *audit project
     */
    public function audit_project($pid, $status)
    {
        $audit_array = array(
                        'status' => $status
                    );
		$this->db->flush_cache();
        $this->db->where('pid', $pid);
        $this->db->update('cs_project', $audit_array);
        
        if($this->db->affected_rows() == 1)
        {
            if ($status == 5)
            {
                $del_array = array(
                                'status' => 1    
                );

                $this->db->where('pid', $pid);
                $this->db->update('cs_recmd_project', $del_array);
            }

            return TRUE;
        }

        return FALSE;
    }

    /*
     *delete a help recommend when reject a project
     */
    public function delete_help_recommend_by_pid($pid)
    {
        $del_array = array(
                        'status' => 1
                    );
		$this->db->flush_cache();
        $this->db->where('pid', $pid);
        $this->db->update('cs_recmd_project', $del_array);

        if ($this->db->affected_rows() == 1)
        {
            return TRUE;
        }

        return FALSE;
    }

    /*
     *get project name for a given pid
     */
    public function get_project_name_by_pid($pid)
    {
		$this->db->flush_cache();
        $query = $this->db
                      ->where('pid', $pid)
                      ->where('poss_id > ', 0)
                      ->where('status', 3)
                      ->limit(1)
                      ->get('cs_project');

        if ($query->num_rows() == 0)
        {
            return FALSE;
        }
        
        return $query->row()->title;
    }

    /*
     *get user type by the given user name
     */
    public function check_enterprise_name($user_name)
    {
		$this->db->flush_cache();
        $query = $this->db
                      ->where('nickname', $user_name)
                      ->where('status', 2)
                      ->get('cs_passport');

        if ($query->num_rows() == 0)
        {
            return -1;
        }
		$this->db->flush_cache();
        $query = $this->db
                      ->where('nickname', $user_name)
                      ->where('gid', 3)
                      ->where('status', 2)
                      ->get('cs_passport');
        if ($query->num_rows() == 0)
        {
            return 0;
        }

        return 1;
    }

    /*
     *insert enterprise donate
     */
    public function insert_enterprise_donate($did, $enterprise_name, $project_id, $money, $phone, $method, $number, $bank, $bill_no)
    {
        $create_time = strtotime("now");
        $status = 2;
		$this->db->flush_cache();
        $query = $this->db
                      ->where('nickname', $enterprise_name)
                      ->where('gid', 3)
                      ->limit(1)
                      ->get('cs_passport');
		$this->db->flush_cache();
        $another_query = $this->db
                              ->where('status', 2)
                              ->order_by('create_time', 'desc')
                              ->limit(1)
                              ->get('cs_summary');
		$this->db->flush_cache();
        $third_query = $this->db
                            ->where('pid', $project_id)
                            ->limit(1)
                            ->get('cs_project');

        if ($query->num_rows() == 0)
        {
            return FALSE;
        }

        if ($another_query->num_rows() == 0)
        {
            return FALSE;
        }

        if ($third_query->num_rows() == 0)
        {
            return FALSE;
        }

        $poss_id = $third_query->row()->poss_id;

        if ($poss_id == 0)
        {
            return FALSE;
        }
		$this->db->flush_cache();
        $four_query = $this->db
                           ->where('poss_id', $poss_id)
                           ->limit(1)
                           ->get('cs_possession');

        if ($four_query->num_rows() == 0)
        {
            return FALSE;
        }

        $now_money = $four_query->row()->now_money;
        $now_money += $money; 

        $uid = $query->row()->uid;

        if ($method == 2)
        {
            $provider = 3;
        }
        else
        {
            $provider = 4;
        }

        $summary_id = $another_query->row()->smid;
        $total_money = $another_query->row()->money;
        $total_money += $money;
        $summary_time = strtotime("now");

        $insert_data = array(
            'did' => $did,
            'type' => 2,
            'uid' => $uid,
            'anonymous' => 2,
            'pid' => $project_id,
            'money' => $money,
            'name' => $enterprise_name,
            'phone' => $phone,
            'process' => 4,
            'process_info' => "成功",
            'provider' => $provider,
            'bank' => $bank,
            'provider_bill' => $number,
            'donate_bill' => $bill_no,
            'create_time' => $create_time,
            'modify_time' => $create_time,
            'status' => $status 
        );

        $update_data = array(
            'money' => $total_money,
            'modify_time' => $summary_time
        );

        $poss_update_data = array(
            'now_money' => $now_money,
            'modify_time' => $summary_time    
        );

        //begin transfer
        $this->db->trans_start();
		$this->db->flush_cache();
        //insert data
        $this->db->insert('cs_donate', $insert_data);
        //update data
        $this->db->where('smid', $summary_id);
        $this->db->update('cs_summary', $update_data);
        $this->db->where('poss_id', $poss_id);
        $this->db->update('cs_possession', $poss_update_data);
        $this->db->trans_complete();

        return TRUE;
    }
}
 
/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */
