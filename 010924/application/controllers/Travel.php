<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'travel';
    $data['filez'] = 'travel';
    $data['functionz'] = 'travel';
    $data['labelz'] = 'Travel Info';
    $this->load->view('template', $data);
	}
	
	function travel_new()
	{
		permission();
    $data = array();
    $data['filez'] = 'travel';
    $data['functionz'] = 'travel';
    $data['labelz'] = 'Travel';
    $this->load->view('travel_new', $data);
	}
	
	function travel_list($trash=0)
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
		
		$query_no_limit = "SELECT * FROM kg_travel WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_travel WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('travel/travel_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $publish = $r['is_publish'] ? "Published" : "Draft";
		  $featured = $r['is_featured'] ? "Yes (".$r['is_featured'].")" : "No";
		  $data[] = array($no, $r['title'], $publish, $check);
	  }
	  
	  $output = array(
	                  "draw" => $_POST['draw'],
	                  "recordsTotal" => $this->db->query($query_no_limit)->num_rows(),
	                  "recordsFiltered" => $this->db->query($query_no_limit)->num_rows(),
	                  "data" => $data
	                 );
	  //output to json format
	  echo json_encode($output);
  }
  
  function travel_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'travel_detail';
    $data['filez'] = 'travel';
    $data['functionz'] = 'travel';
    $data['labelz'] = 'Travel';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("travel", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function travel_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("travel", array("is_delete"=> 1));
			}
		}
	}
  
  function travel_add()
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
			
			$cek_id = GetValue("id","travel",array("id"=> "where/".$param['id']));
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
				if($this->db->insert("travel", $post)) $this->session->set_flashdata("message", "success-Add Success");
	    	else $this->session->set_flashdata("message", "danger-Add Failed");
	    } else {
	    	$record = GetAll('travel',array('id'=>'where/'.$cek_id))->row_array();
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
	    	if($this->db->update("travel", $post)) $this->session->set_flashdata("message", "success-Edit Success");
	    	else $this->session->set_flashdata("message", "danger-Edit Failed");
	    }
	  }
    
    redirect(site_url('travel'));
  }
}
