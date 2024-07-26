<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contents extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->main();
	}
	
	function main($slug="")
	{
		if(!$slug) redirect(site_url('home'));
		$data = GetHeaderFooter();
		$data['main_content'] = 'content';
		$data['val'] = GetAll("contents",array("slug"=> "where/".$slug))->result_array()[0];
		$this->load->view('template', $data);
	}
}
?>