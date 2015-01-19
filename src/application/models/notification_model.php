<?php
/**
 * Notification Model Class
 *
 * @author QiangRunwei <qiangrw@gmail.com>
 * @version	1.0
 */
 
class Notification_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }
		
	/**
	 * insert notification to db
	 * @param int $uid
	 * @param int $pid
	 * @param string content
	 * @return bool
	 */ 
	function insert_notification($nid,$uid,$pid,$content)
	{
		$time = time();
		$data = array('nid'=>$nid,'uid'=>$uid,'pid'=>$pid,'content'=>$content,
						'status'=>2,'create_time'=>$time,'modify_time'=>$time);
		$this->db->flush_cache();
		$this->db->insert('cs_notification',$data);
		return ($this->db->affected_rows() == 1);
	}
	
	/**
	 * 读取消息，标记为已读
	 * @param int $nid
	 * @return bool
	 */ 
	function read_notification($nid)
	{
		$modify_time = time();
		$data = array('status' => 3,'modify_time'=>$modify_time);
		$this->db->flush_cache();
		$this->db->where('nid',$nid);
		$this->db->update('cs_notification',$data);
		return ($this->db->affected_rows() == 1);
	}

	/**
	 * 获取我的消息列表
	 * @param int $uid
	 * @param int $pageno
	 * @param int $page_size
	 * @return array 
	 */ 
	function get_notification_list($uid,$pageno=1,$pagesize=10) 
	{
		$data = array('uid'=>$uid,'status !='=>1);
		$this->db->flush_cache();
		$this->db->order_by('create_time','desc');
		$this->db->limit($pagesize,$pagesize*($pageno-1));
		$query = $this->db->get_where('cs_notification',$data);
		if($query->num_rows() == 0) return NULL;
		$notification_list = array();
		foreach($query->result() as $row) {
			$row->create_time = date('Y-m-d H:i',$row->create_time);
			$notification_list []= $row;
		}

		//查看的通知设置为已读
		$time = time();
		$data = array('status' => 3,'modify_time'=>$time);
		$this->db->flush_cache();
		$this->db->where('uid' ,$uid);
		$this->db->where('status !=',1);
		$this->db->order_by('create_time','desc');
		$this->db->limit($pagesize*$pageno);
		$this->db->update('cs_notification',$data);
		
		return $notification_list;
	}
	
	/**
	 * 获取所有消息的个数
	 * @param int $uid
	 * @return int
	 */ 
	function get_notification_count($uid)
	{
		$this->db->flush_cache();
		$this->db->where('uid',$uid);
		$this->db->where('status !=',1);
		return $this->db->count_all_results('cs_notification');
	}
	
	/**
	 * 获取未读消息的个数
	 * @param int $uid
	 * @return int
	 */ 
	function get_unread_notification_count($uid) 
	{
		$this->db->flush_cache();
		$this->db->where('uid',$uid);
		$this->db->where('status',2);
		return $this->db->count_all_results('cs_notification');
	}	
}


/* End of file notification_model.php */
/* Location: ./application/model/notification_model.php */