<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calender extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main($param=NULL)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'calender';
    $data['filez'] = 'calender';
    $data['functionz'] = 'calender';
    $data['labelz'] = 'Event Agenda';
    $data['param'] = $param;
    $this->load->view('template', $data);
	}
	
	function calender_new()
	{
		permission();
    $data = array();
    $data['filez'] = 'calender';
    $data['functionz'] = 'calender';
    $data['labelz'] = 'Calender';
    $this->load->view('calender_new', $data);
	}
	
	function calender_list($param=0)
  {
  	ini_set('memory_limit', -1);
  	$cat = GetOptCalenderCat();
  	$lokasi = GetOptCalenderLokasi();
  	$where="id_calender_cat='".$param."'";
  	$kolom = array("","title","","","start_date","end_date","is_publish","kuota");
  	if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
  	else $ord = " start_date desc ";
		
		if(isset($_POST['search']['value'])) {
			$src = $_POST['search']['value'];
			if($src) {
				$src=$this->db->escape_like_str($src);
				$w_like=array();
				foreach($kolom as $val) {
					if($val) $w_like[] = $val." LIKE '%".$src."%'";
				}
				$where = "(".join(" OR ", $w_like).")";
			}
		}
		
		$query_no_limit = "SELECT * FROM kg_calender WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_calender WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('calender/calender_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  //$check .= "&nbsp;&nbsp;<a href='".site_url('calender/side_event/'.$r['id'])."'><i class='icon icon-edit'></i></a>";
		  $publish = $r['is_publish'] ? "Published" : "Draft";
		  $approve = GetAll("side_event",array("id_calender"=> "where/".$r['id'], "status"=> "where/Approve"))->num_rows();
		  $pending = GetAll("side_event",array("id_calender"=> "where/".$r['id'], "status"=> "where/Pending"))->num_rows();
		  $approve += GetAll("side_event_dao",array("id_calender"=> "where/".$r['id'], "status"=> "where/Approve"))->num_rows();
		  $pending += GetAll("side_event_dao",array("id_calender"=> "where/".$r['id'], "status"=> "where/Pending"))->num_rows();
		  $kuota = "<a href='".site_url('calender/side_event/'.$r['id'])."'>".$r['kuota']." | ".$approve." | ".$pending."</a>";
		  //$data[] = array($no, $r['title'], $cat[$r['id_calender_cat']], $lokasi[$r['id_lokasi']], $r['start_date'], $r['end_date'], $kuota, $publish, $check);
		  $data[] = array($no, $r['title'], $lokasi[$r['id_lokasi']], $r['start_date'], $r['end_date'], $kuota, $publish, $check);
	  }
	  
	  $output = array(
	                  "draw" => html_escape($_POST['draw']),
	                  "recordsTotal" => $this->db->query($query_no_limit)->num_rows(),
	                  "recordsFiltered" => $this->db->query($query_no_limit)->num_rows(),
	                  "data" => $data
	                 );
	  //output to json format
	  echo json_encode($output);
  }
  
  function calender_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'calender_detail';
    $data['filez'] = 'calender';
    $data['functionz'] = 'calender';
    $data['labelz'] = 'Event Agenda';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("calender", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function calender_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("calender", array("is_delete"=> 1));
			}
		}
	}
  
  function calender_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    $post = $param = $this->input->post();
    if($admin_id==1) {
		    $post = $param = $this->input->post();
			unset($post['id']);
	    $post['slug'] = url_title($post['title']);
			$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			$post['is_delete'] = 0;
			if(!isset($post['is_publish'])) $post['is_publish']=0;
			if(!isset($post['is_featured'])) $post['is_featured']=0;
			$atas=array();
	    foreach($post['pembicara'] as $at) {
	    	$atas[] = "-".$at."-";
	    }
	    $post['headline'] = join(",",$atas);
	    unset($post['pembicara']);
			//print_mz($post);
			// upload file
			$config['upload_path']          = $this->config->item('path_upload');
			$config['allowed_types']        = 'jpg|png|jpeg|pdf';
			$config['max_size']             = 50000;
			$this->load->library('upload', $config);
			// end
			
			$cek_id = GetValue("id","calender",array("id"=> "where/".$param['id']));
			if(!$cek_id) {
				if (!$this->upload->do_upload('image')){
					$post['image'] = "";
				} else {
					$image = $this->upload->data();
					$post['image'] = $image['file_name'];
				}
				if (!$this->upload->do_upload('image_mobile')){
					$post['image_mobile'] = "";
				} else {
					$image_mobile 			= $this->upload->data();
					$post['image_mobile'] 	= $image_mobile['file_name'];
				}
	    	$post['create_user_id'] = $admin_id;
				$post['create_date'] = date("Y-m-d H:i:s");
				$post['modify_user_id'] = $admin_id;
				$post['modify_date'] = date("Y-m-d H:i:s");
				if($this->db->insert("calender", $post)) $this->session->set_flashdata("message", "success-Add Success");
	    	else $this->session->set_flashdata("message", "danger-Add Failed");
	    } else {
	    	$record = GetAll('calender',array('id'=>'where/'.$cek_id))->row_array();
				if (!$this->upload->do_upload('image')){
					$post['image'] 	= $record['image'];
				} else {
					$image = $this->upload->data();
					$post['image'] 	= $image['file_name'];
				}
				if (!$this->upload->do_upload('image_mobile')){
					$post['image_mobile'] 	= $record['image_mobile'];
				} else {
					$image_mobile 			= $this->upload->data();
					$post['image_mobile'] 	= $image_mobile['file_name'];
				}
	    	$post['modify_user_id'] = $admin_id;
				$post['modify_date'] = date("Y-m-d H:i:s");
				$this->db->where("id", $param['id']);
	    	if($this->db->update("calender", $post)) $this->session->set_flashdata("message", "success-Edit Success");
	    	else $this->session->set_flashdata("message", "danger-Edit Failed");
	    }
	  }
    
    redirect(site_url('calender/main/'.$post['id_calender_cat']));
  }
  
  function side_event($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'calender_side';
    $data['filez'] = 'calender';
    $data['functionz'] = 'calender';
    $data['labelz'] = 'Event Agenda';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("calender", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function add_side($param=0)
	{
		permission();
		$id_mem = $this->input->post("idz");
		$id_cal = $this->input->post("param");
		if($param==1) $post = array("is_delete"=> 2, "status"=> "Reject");
		else $post = array("is_delete"=> 0, "status"=> "Approve");
		$this->db->where("id_member", $id_mem);
		$this->db->where("id_calender", $id_cal);
		if($this->db->update("side_event", $post)) echo "ok";
		else echo "no";
	}
	
	function add_side_dao($param=0)
	{
		permission();
		$id_mem = $this->input->post("idz");
		$id_cal = $this->input->post("param");
		if($param==1) $post = array("is_delete"=> 2, "status"=> "Reject");
		else $post = array("is_delete"=> 0, "status"=> "Approve");
		$this->db->where("id_member", $id_mem);
		$this->db->where("id_calender", $id_cal);
		if($this->db->update("side_event_dao", $post)) echo "ok";
		else echo "no";
	}
	
  function calender_cat()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'calender_cat';
    $data['filez'] = 'calender';
    $data['functionz'] = 'calender_cat';
    $data['labelz'] = 'Kategory';
    $this->load->view('template', $data);
	}
  
  function calender_cat_list($trash=0)
  {
  	ini_set('memory_limit', -1);
  	$where="1=1";
  	$kolom = array("","title");
  	if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
  	else $ord = " id asc ";
		
		if(isset($_POST['search']['value'])) {
			$src = $_POST['search']['value'];
			if($src) {
				$src=$this->db->escape_like_str($src);
				$w_like=array();
				foreach($kolom as $val) {
					if($val) $w_like[] = $val." LIKE '%".$src."%'";
				}
				$where = "(".join(" OR ", $w_like).")";
			}
		}
		
		$query_no_limit = "SELECT * FROM kg_calender_cat WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_calender_cat WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('calender/calender_cat_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $data[] = array($no, $r['title'], $check);
	  }
	  
	  $output = array(
	                  "draw" => html_escape($_POST['draw']),
	                  "recordsTotal" => $this->db->query($query_no_limit)->num_rows(),
	                  "recordsFiltered" => $this->db->query($query_no_limit)->num_rows(),
	                  "data" => $data
	                 );
	  //output to json format
	  echo json_encode($output);
  }
  
  function calender_cat_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'calender_cat_detail';
    $data['filez'] = 'calender';
    $data['functionz'] = 'calender_cat';
    $data['labelz'] = 'Kategory';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("calender_cat", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function calender_cat_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("calender_cat", array("is_delete"=> 1));
			}
		}
	}
  
  function calender_cat_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    $post = $param = $this->input->post();
unset($post['id']);
		if(!isset($post['is_publish'])) $post['is_publish']=0;
		
		$cek_id = GetValue("id","calender_cat",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
    	$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("calender_cat", $post)) $this->session->set_flashdata("message", "success-Add Success");
    	else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
    	$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
    	if($this->db->update("calender_cat", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    redirect(site_url('calender/calender_cat'));
  }
}
