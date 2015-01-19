<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Address extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	public static function getAllProvince() {
		return $this->Utility_model->getAllProvince();
	} 
	
	public static function getCityByProvince($city) {
		return $this->Utility_model->getCityByProvince($city);
	}
	
	public static function getDistrictByCity($province, $city) {
		return $this->Utility_model->getDistrictByCity($province, $city);
	}
}

?>