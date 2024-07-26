<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->main();
	}
	
	function main()
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'news';
		
		$this->load->view('template', $data);
	}
	
	function detail($slug)
	{
		if(!$slug) redirect(lang_url('news'));
		$data = GetHeaderFooter();
		$data['val'] = GetAll("news", array("slug"=> "where/".$slug))->result_array()[0];
    $data['main_content'] = 'news_detail';
		$this->load->view('template', $data);
	}
	
	function documentation()
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'documen';
		
		$this->load->view('template', $data);
	}
}
?>