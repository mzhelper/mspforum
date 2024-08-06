<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class about extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		/*$q = GetAll("news", array("is_delete"=> "where/0"));
		foreach($q->result_array() as $r) {
			$awal = "./uploads/".$r['image'];
			$akhir = "./uploads/speakers/".$r['image'];
			copy($awal,$akhir);
		}
		die("OK");*/
		$this->overview();
	}
	
	function overview()
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'about_overview';
		$data['val'] = GetAll("contents",array("id"=> "where/1"))->result_array()[0];
		$this->load->view('template', $data);
	}
	
	function committee()
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'about_committee';
		$this->load->view('template', $data);
	}
	
	function welcome_messages($param=NULL)
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'about_welcome_messages';
		$data['param'] = $param;
		$this->load->view('template', $data);
	}
	
	function welcome_messages_detail($slug)
	{
		if(!$slug) redirect(lang_url('about/welcome_messages'));
		$data = GetHeaderFooter();
		$data['val'] = GetAll("news", array("is_delete"=> "where/0", "slug"=> "where/".urldecode($slug)))->result_array()[0];
    $data['main_content'] = 'welcome_detail';
		$this->load->view('template', $data);
	}
	
	function speakers()
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'speakers';
		$data['val'] = GetAll("leaders",array("is_delete"=> "where/0", "urutan"=> "order/asc"));
		$this->load->view('template', $data);
	}
	
	function speakers_detail($slug)
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'welcome_detail';
		$data['val'] = GetAll("leaders",array("is_delete"=> "where/0", "slug"=> "where/".urldecode($slug)))->result_array()[0];
		$this->load->view('template', $data);
	}
	
	function speakers_event($slug)
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'speakers_detail';
		$data['opt_ruangan'] = GetOptAll("calender_lokasi");
		$q = GetAll("calender_cat", array("id_parents"=> "order/asc"));
		foreach($q->result_array() as $r) {
			$warna[$r['id']] = $r['title_eng'];
			$tema[$r['id']] = $r['title'];
		}
		$data['warna'] = $warna;
		$data['opt_tema'] = $tema;
		$data['val'] = GetAll("speakers",array("is_delete"=> "where/0", "slug"=> "where/".urldecode($slug)))->result_array()[0];
		$this->load->view('template', $data);
	}
	
	function profile($id)
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'profile_detail';
		$data['opt_ruangan'] = GetOptAll("calender_lokasi");
		$q = GetAll("calender_cat", array("id_parents"=> "order/asc"));
		foreach($q->result_array() as $r) {
			$warna[$r['id']] = $r['title_eng'];
			$tema[$r['id']] = $r['title'];
		}
		$data['warna'] = $warna;
		$data['opt_tema'] = $tema;
		$data['val'] = GetAll("member",array("is_delete"=> "where/0", "uid"=> "where/".$id))->result_array()[0];
		$this->load->view('template', $data);
	}
	
	function profile_dao($id)
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'profile_detail_dao';
		$data['opt_ruangan'] = GetOptAll("calender_lokasi");
		$q = GetAll("calender_cat", array("id_parents"=> "order/asc"));
		foreach($q->result_array() as $r) {
			$warna[$r['id']] = $r['title_eng'];
			$tema[$r['id']] = $r['title'];
		}
		$data['warna'] = $warna;
		$data['opt_tema'] = $tema;
		$data['val'] = GetAll("member_dao",array("is_delete"=> "where/0", "uid"=> "where/".$id))->result_array()[0];
		$this->load->view('template', $data);
	}
}
?>