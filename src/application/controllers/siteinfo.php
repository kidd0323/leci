<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Shanghai');
/**
 * Siteinfo Class
 *
 * @author QiangRunwei <qiangrw@gmail.com>
 * @version	1.0
 */
class Siteinfo extends CI_Controller {
	function __constructor() 
	{
		parent::__constructor();
	}
	
	function service_items()
	{
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '服务条款 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('siteinfo/service_items');
		$this->load->view('inc/footer');
	}
	function service_info()
	{
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '服务介绍 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('siteinfo/service_info');
		$this->load->view('inc/footer');
	}
	function policy()
	{
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '隐私权政策 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('siteinfo/policy');
		$this->load->view('inc/footer');
	}
	function join_us()
	{
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '加入我们 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('siteinfo/join_us');
		$this->load->view('inc/footer');
	}
	function about()
	{
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '关于我们 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('siteinfo/about');
		$this->load->view('inc/footer');
	}
	
	
	/**
	 * 公益帮助
	 */ 
	function sponser_help()
	{
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '公益帮助 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('siteinfo/sponser_help');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 如何发布求助信息
	 */ 
	function how_to_propose() {
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '如何发布求助信息 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('siteinfo/how_to_propose');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 如何成为公益志愿者 
	 */	 
	function how_to_be_volunteer() {
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '如何成为公益志愿者 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('siteinfo/how_to_be_volunteer');
		$this->load->view('inc/footer');
	}
	
	/**
	 * 我的捐赠记录那里可以查到
	 */	 
	function how_to_find_history() {
		ob_clean();
		$data['active'] = array('inactive','inactive','inactive');
		$data['title'] = '我的捐赠记录那里可以查到 | 乐慈';
		$this->load->view('inc/header',$data);
		$this->load->view('siteinfo/how_to_find_history');
		$this->load->view('inc/footer');
	}
	
	function protocol() {
		ob_clean();
		$data['title'] = '乐慈';
		$this->load->view('siteinfo/protocol',$data);
	}
}

/* End of file siteinfo.php */
/* Location: ./application/controllers/siteinfo.php */