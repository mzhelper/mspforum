<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->main();
	}
	
	function main($id_menu="")
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'home';
		
		$this->load->view('template', $data);
	}
}
?>