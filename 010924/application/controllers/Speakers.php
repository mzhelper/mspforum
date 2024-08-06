<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speakers extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'speakers';
    $data['filez'] = 'speakers';
    $data['functionz'] = 'speakers';
    $data['labelz'] = 'Speakers';
    $this->load->view('template', $data);
	}
	
	function speakers_new()
	{
		permission();
    $data = array();
    $data['filez'] = 'speakers';
    $data['functionz'] = 'speakers';
    $data['labelz'] = 'Speakers';
    $this->load->view('speakers_new', $data);
	}
	
	function speakers_list($trash=0)
  {
  	ini_set('memory_limit', -1);
  	$where="1=1";
  	$kolom = array("","title","publish_date","is_publish","urutan");
  	if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
  	else $ord = " publish_date desc ";
		
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
		
		$query_no_limit = "SELECT * FROM kg_speakers WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_speakers WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('speakers/speakers_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $publish = $r['is_publish'] ? "Published" : "Draft";
		  $featured = $r['is_featured'] ? "Yes (".$r['is_featured'].")" : "No";
		  $data[] = array($no, $r['title'], $r['headline'], $publish, $check);
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
  
  function speakers_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'speakers_detail';
    $data['filez'] = 'speakers';
    $data['functionz'] = 'speakers';
    $data['labelz'] = 'Speakers';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("speakers", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function speakers_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("speakers", array("is_delete"=> 1));
			}
		}
	}
  
  function speakers_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    if($admin_id==1) {
	    $post = $param = $this->input->post();
			unset($post['id']);
	    $post['slug'] = url_title($post['title']);
			$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			$post['is_delete'] = 0;
			if(!isset($post['is_publish'])) $post['is_publish']=0;
			if(!isset($post['is_featured'])) $post['is_featured']=0;
			
			// upload file
			$config['upload_path']          = $this->config->item('path_upload');
			$config['allowed_types']        = 'jpg|png|jpeg|pdf';
			$config['max_size']             = 50000;
			$this->load->library('upload', $config);
			// end
			
			$cek_id = GetValue("id","speakers",array("id"=> "where/".$param['id']));
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
				if($this->db->insert("speakers", $post)) $this->session->set_flashdata("message", "success-Add Success");
	    	else $this->session->set_flashdata("message", "danger-Add Failed");
	    } else {
	    	$record = GetAll('speakers',array('id'=>'where/'.$cek_id))->row_array();
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
	    	if($this->db->update("speakers", $post)) $this->session->set_flashdata("message", "success-Edit Success");
	    	else $this->session->set_flashdata("message", "danger-Edit Failed");
	    }
	  }    
    redirect(site_url('speakers'));
  }
}
