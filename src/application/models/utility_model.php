<?php
/**
 * Utility Model Class
 *
 * @author QiangRunwei <qiangrw@gmail.com>
 * @version	1.0
 */
 
class Utility_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }
    
    function getAllProvince(){
    	$this->load->config('address');
    	$province = $this->config->item('province');
    	return $province;
    }
    
    function getCityByProvince($province) {
    	$this->load->config('address');
    	$city = $this->config->item('city');
    	return $city[$province];
    }
    
    function getDistrictByCity($province, $city) {
    	$this->load->config('address');
    	$district = $this->config->item('district');
    	return $district[$province][$city];
    }
	
	function get_province_by_id($pid=0)
	{
		if($pid == 0) return '请选择省';
		$this->load->config('address');
		$province = $this->config->item('province');
		return $province[$pid-1];
	}
	
	function get_city_by_id($pid=0,$cid=0)
	{
		if($pid == 0) return '请选择省';
		if($cid == 0) return '请选择市';
		$this->load->config('address');
		$province_name = $this->get_province_by_id($pid);
		$city_array = $this->config->item('city');
		$city_list = $city_array[$province_name];
		
		return $city_list[$cid-1];
	}
	
	function get_district_by_id($pid=0,$cid=0,$did=0)
	{
		if($pid == 0) return '请选择省';
		if($cid == 0) return '请选择市';
		if($did == 0) return '请选择地区';
		
		$this->load->config('address');
		$province_name = $this->get_province_by_id($pid);
		$city_array = $this->config->item('city');
		$city_list = $city_array[$province_name];
		$city_name = $city_list[$cid-1];
		$district_array = $this->config->item('district');
		return $district_array[$province_name][$city_name][$did-1];
	}
	
	function get_address($pid=0,$cid=0,$did=0,$split="")
	{
		if($pid == 0) return '请选择省';
		if($cid == 0) return '请选择市';
		if($did == 0) return '请选择地区';
		
		$this->load->config('address');
		$province_name = $this->get_province_by_id($pid);
		$city_array = $this->config->item('city');
		$city_list = $city_array[$province_name];
		$city_name = $city_list[$cid-1];
		$district_array = $this->config->item('district');
		$district_name = $district_array[$province_name][$city_name][$did-1];
		return $province_name.$split.$city_name.$split.$district_name;
	}
 
}



/* End of file utility.php */
/* Location: ./application/model/utility.php */