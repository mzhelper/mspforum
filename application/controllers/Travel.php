<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class travel extends CI_Controller {
	
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
		$data['main_content'] = 'travel';
		$data['q'] = $q = GetAll("travel",array("urutan"=> "order/asc", "is_publish"=> "where/1"));
		foreach($q->result_array() as $r) {
			$data['val'][$r['id']] = $r;
		}
		$this->load->view('template', $data);
	}
}
?>