<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function ruangan()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'master_ruangan';
    $data['filez'] = 'master';
    $data['functionz'] = 'ruangan';
    $data['labelz'] = 'Ruangan';
    $this->load->view('template', $data);
	}
	
	function ruangan_new()
	{
		permission();
    $data = array();
    $data['filez'] = 'master';
    $data['functionz'] = 'ruangan';
    $data['labelz'] = 'Ruangan';
    $this->load->view('ruangan_new', $data);
	}
	
	function ruangan_list($trash=0)
  {
  	ini_set('memory_limit', -1);
  	$where="1";
  	$kolom = array("","title","is_publish");
  	if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
  	else $ord = " id desc ";
		
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
		
		$query_no_limit = "SELECT * FROM kg_calender_lokasi WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_calender_lokasi WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('master/ruangan_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $publish = $r['is_publish'] ? "Published" : "Draft";
		  $data[] = array($no, $r['title'], $publish, $check);
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
  
  function ruangan_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'master_ruangan_detail';
    $data['filez'] = 'master';
    $data['functionz'] = 'ruangan';
    $data['labelz'] = 'Ruangan';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("calender_lokasi", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function ruangan_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("calender_lokasi", array("is_delete"=> 1));
			}
		}
	}
  
  function ruangan_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    if($admin_id==1) {
			$post = $param = $this->input->post();
			unset($post['id']);
	    $post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			$post['is_delete'] = 0;
			if(!isset($post['is_publish'])) $post['is_publish']=0;
			
			$cek_id = GetValue("id","calender_lokasi",array("id"=> "where/".$param['id']));
			if(!$cek_id) {
				$post['create_user_id'] = $admin_id;
				$post['create_date'] = date("Y-m-d H:i:s");
				$post['modify_user_id'] = $admin_id;
				$post['modify_date'] = date("Y-m-d H:i:s");
				if($this->db->insert("calender_lokasi", $post)) $this->session->set_flashdata("message", "success-Add Success");
	    	else $this->session->set_flashdata("message", "danger-Add Failed");
	    } else {
	    	$post['modify_user_id'] = $admin_id;
				$post['modify_date'] = date("Y-m-d H:i:s");
				$this->db->where("id", $param['id']);
	    	if($this->db->update("calender_lokasi", $post)) $this->session->set_flashdata("message", "success-Edit Success");
	    	else $this->session->set_flashdata("message", "danger-Edit Failed");
	    }
	  }
    redirect(site_url('master/ruangan'));
  }
  
  function image()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'master_image';
    $data['filez'] = 'master';
    $data['functionz'] = 'image';
    $data['labelz'] = 'image';
    $this->load->view('template', $data);
	}
	
	function image_new()
	{
		permission();
    $data = array();
    $data['filez'] = 'master';
    $data['functionz'] = 'image';
    $data['labelz'] = 'image';
    $this->load->view('image_new', $data);
	}
	
	function image_list($trash=0)
  {
  	ini_set('memory_limit', -1);
  	$where="1";
  	$kolom = array("","title","is_publish");
  	if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
  	else $ord = " id desc ";
		
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
		
		$query_no_limit = "SELECT * FROM kg_image WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_image WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('master/image_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $data[] = array($no, $r['title'], $r['link'], $check);
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
  
  function image_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'master_image_detail';
    $data['filez'] = 'master';
    $data['functionz'] = 'image';
    $data['labelz'] = 'image';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("image", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function image_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("image", array("is_delete"=> 1));
			}
		}
	}
  
  function image_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    if($admin_id==1) {
			$post = $param = $this->input->post();
			unset($post['id']);
	    $post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			$post['is_delete'] = 0;
			
			// upload file
			$config['upload_path']          = $this->config->item('path_upload');
			$config['allowed_types']        = 'jpg|png|jpeg|pdf';
			$config['max_size']             = 50000;
			$this->load->library('upload', $config);
			// end
			
			$cek_id = GetValue("id","image",array("id"=> "where/".$param['id']));
			if(!$cek_id) {
				if (!$this->upload->do_upload('image')){
					$post['image'] = "";
				} else {
					$image = $this->upload->data();
					$post['image'] = $image['file_name'];
					$post['link'] = str_replace("admin/","",base_url()."uploads/".$post['image']);
				}			
				$post['create_user_id'] = $admin_id;
				$post['create_date'] = date("Y-m-d H:i:s");
				$post['modify_user_id'] = $admin_id;
				$post['modify_date'] = date("Y-m-d H:i:s");
				if($this->db->insert("image", $post)) $this->session->set_flashdata("message", "success-Add Success");
	    	else $this->session->set_flashdata("message", "danger-Add Failed");
	    } else {
	    	$record = GetAll('image',array('id'=>'where/'.$cek_id))->row_array();
				if (!$this->upload->do_upload('image')){
					$post['image'] 	= $record['image'];
				} else {
					$image = $this->upload->data();
					$post['image'] 	= $image['file_name'];
				}
				$post['link'] = str_replace("admin/","",base_url()."uploads/".$post['image']);
				$post['modify_user_id'] = $admin_id;
				$post['modify_date'] = date("Y-m-d H:i:s");
				$this->db->where("id", $param['id']);
	    	if($this->db->update("image", $post)) $this->session->set_flashdata("message", "success-Edit Success");
	    	else $this->session->set_flashdata("message", "danger-Edit Failed");
	    }
    }
    redirect(site_url('master/image'));
  }
}
