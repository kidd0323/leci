<?php
/**
 * Globalid Model Class
 *
 * @author QiangRunwei <qiangrw@gmail.com>
 * @version	1.0
 */
 
class Globalid extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }
    
    /**
     * get the insert id of table
     * @param string $key
     * @return int id
     */
    function get_insert_id($key)
    {
		$this->db->trans_start();
		$this->db->flush_cache();
   		$query = $this->db->get_where('t_globalid',array('tg_id'=>$key));
 		if ($query->num_rows() > 0 && $query->row()->tg_value >= 0) { 
 			// INC the tg_value
 			$data = array('tg_value' => $query->row()->tg_value +1);	
 			$this->db->where('tg_id',$key);
 			$this->db->update('t_globalid',$data);
		}
		$this->db->trans_complete();
		return $query->row()->tg_value;
    }
}



/* End of file globalid.php */
/* Location: ./application/model/globalid.php */