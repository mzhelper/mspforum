<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'home';
    $data['labelz'] = 'CMS';
		$this->load->view('template', $data);
	}
}
