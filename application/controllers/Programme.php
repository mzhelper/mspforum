<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class programme extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->all();
	}
	
	function all()
	{
		$data = GetHeaderFooter();
		$data['val'] = GetAll("contents",array("id"=> "where/2"))->result_array()[0];
		$data['main_content'] = 'programme_all';
		$this->load->view('template', $data);
	}
	
	function lop()
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'programme_jop';
		$q = $this->db->query("select * from kg_calender where is_publish='1' order by id desc");
    $event_list=array();
    foreach($q->result_array() as $r) {
    	$event_list[] = "{title: '".$r['title']."', url: '".site_url('events/detail/'.$r['id'])."', start: '".$r['publish_date']."', end: '".$r['publish_date']."'}";
    }
    //print_mz($event_list);
    $data['event_list'] = join(",",$event_list);   
    $this->load->view('template', $data);
	}
	
	function agenda($param=NULL)
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'programme_agenda';
		$data['opt_ruangan'] = GetOptAll("calender_lokasi");
		$q = GetAll("calender_cat", array("id_parents"=> "order/asc"));
		foreach($q->result_array() as $r) {
			$warna[$r['id']] = $r['title_eng'];
			$tema[$r['id']] = $r['title'];
		}
		$data['warna'] = $warna;
		$data['opt_tema'] = $tema;
		$data['param'] = $param;
		if($param==1) $data['day1'] = GetAll("calender",array("is_delete"=> "where/0", "start_date"=> "like/2024-09-01", "start_date "=> "order/asc"));
		else if($param==2) $data['day1'] = GetAll("calender",array("is_delete"=> "where/0", "start_date"=> "like/2024-09-02", "start_date "=> "order/asc"));
		else if($param==3) $data['day1'] = GetAll("calender",array("is_delete"=> "where/0", "start_date"=> "like/2024-09-03", "start_date "=> "order/asc"));
		else if($param > 90) {
			$new_param=$param-90;
			$data['day1'] = GetAll("calender",array("is_delete"=> "where/0", "id_calender_cat"=> "where/".$new_param, "start_date "=> "order/asc"));
		} else $data['day1'] = GetAll("calender",array("is_delete"=> "where/0", "start_date "=> "order/asc"));
		//$data['day1'] = GetAll("calender",array("is_delete"=> "where/0", "start_date"=> "like/2024-09-01", "start_date "=> "order/asc","start_date  "=> "group", "end_date"=> "group", "id_lokasi"=> "group"));
		//$data['day1_lokasi'] = GetAll("calender",array("is_delete"=> "where/0", "start_date"=> "like/2024-09-01", "id_lokasi"=> "group", "id_lokasi "=> "order/asc"));
		//$data['day2'] = GetAll("calender",array("is_delete"=> "where/0", "start_date"=> "like/2024-09-02", "start_date "=> "order/asc","start_date  "=> "group", "end_date"=> "group", "id_lokasi"=> "group"));
		//$data['day2_lokasi'] = GetAll("calender",array("is_delete"=> "where/0", "start_date"=> "like/2024-09-02", "id_lokasi"=> "group", "id_lokasi "=> "order/asc"));
		//$data['day3'] = GetAll("calender",array("is_delete"=> "where/0", "start_date"=> "like/2024-09-03", "start_date "=> "order/asc","start_date  "=> "group", "end_date"=> "group", "id_lokasi"=> "group"));
		//$data['day3_lokasi'] = GetAll("calender",array("is_delete"=> "where/0", "start_date"=> "like/2024-09-03", "id_lokasi"=> "group", "id_lokasi "=> "order/asc"));
		$this->load->view('template', $data);
	}
	
	function agenda_detail($id)
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'programme_agenda_detail';
		$data['opt_speaker'] = GetOptAll("speakers");
		$data['opt_ruangan'] = GetOptAll("calender_lokasi");
		$data['opt_tema'] = GetOptAll("calender_cat");
		if($id > 0) $data['val'] = GetAll("calender",array("id"=> "where/".$id))->result_array()[0];
		else $data['val'] = GetAll("calender",array("slug"=> "where/".$id))->result_array()[0];
		$data['tema'] = "biru";
		if($data['val']['id_calender_cat']==1) $data['tema'] = "biru";
		else if($data['val']['id_calender_cat']==2) $data['tema'] = "merah";
		else if($data['val']['id_calender_cat']==3) $data['tema'] = "gelap";
		else if($data['val']['id_calender_cat']==4) $data['tema'] = "jingga";
		$hari="-";
		if(preg_match_all("/2024-09-01/",$data['val']['start_date'])) $hari="Sunday, 1 September 2024";
		else if(preg_match_all("/2024-09-02/",$data['val']['start_date'])) $hari="Monday, 2 September 2024";
		else if(preg_match_all("/2024-09-03/",$data['val']['start_date'])) $hari="Tuesday, 3 September 2024";
		$data['hari'] = $hari;
		$this->load->view('template', $data);
	}
	
	function forum()
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'programme_forum';
		$data['val'] = GetAll("contents",array("id"=> "where/2"))->result_array()[0];
		$this->load->view('template', $data);
	}
	
	function nonforum()
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'programme_nonforum';
		$data['val'] = GetAll("contents",array("id"=> "where/3"))->result_array()[0];
		$this->load->view('template', $data);
	}
	
	function add_side($param=0)
	{
		$id_mem = permission();
		$id_cal = $this->input->post("param");
		$cek = GetValue("id", "side_event", array("id_calender"=> "where/".$id_cal, "id_member"=> "where/".$id_mem));
		if($cek) {
			if($param==1) $post = array("is_delete"=> 1, "status"=> "Reject");
			else $post = array("is_delete"=> 0, "status"=> "Pending");
			$this->db->where("id", $cek);
			if($this->db->update("side_event", $post)) echo "ok";
			else echo "no";
		} else {
			$post = array("id_member"=> $id_mem, "id_calender"=> $id_cal, "status"=> "Pending");
			if($this->db->insert("side_event", $post)) echo "ok";
			else echo "no";
		}
	}
}
?>