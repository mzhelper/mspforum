<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'news';
    $data['filez'] = 'news';
    $data['functionz'] = 'news';
    $data['labelz'] = 'News';
    $this->load->view('template', $data);
	}
	
	function news_new()
	{
		permission();
    $data = array();
    $data['filez'] = 'news';
    $data['functionz'] = 'news';
    $data['labelz'] = 'News';
    $this->load->view('news_new', $data);
	}
	
	function news_list($trash=0)
  {
  	ini_set('memory_limit', -1);
  	$cat = GetOptNewsCat();
  	$where="1";
  	$kolom = array("","title","","is_publish","");
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
		
		$query_no_limit = "SELECT * FROM kg_news WHERE id_news_cat=1 AND is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_news WHERE id_news_cat=1 AND is_delete=0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('news/news_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $publish = $r['is_publish'] ? "Published" : "Draft";
		  $featured = $r['is_featured'] ? "Yes (".$r['is_featured'].")" : "No";
		  $data[] = array($no, $r['title'], $cat[$r['id_news_cat']], $r['publish_date'], $publish, $check);
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
  
  function news_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'news_detail';
    $data['filez'] = 'news';
    $data['functionz'] = 'news';
    $data['labelz'] = 'News';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("news", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function news_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("news", array("is_delete"=> 1));
			}
		}
	}
  
  function news_add()
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
			
			$cek_id = GetValue("id","news",array("id"=> "where/".$param['id']));
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
				if($this->db->insert("news", $post)) $this->session->set_flashdata("message", "success-Add Success");
	    	else $this->session->set_flashdata("message", "danger-Add Failed");
	    } else {
	    	$record = GetAll('news',array('id'=>'where/'.$cek_id))->row_array();
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
	    	if($this->db->update("news", $post)) $this->session->set_flashdata("message", "success-Edit Success");
	    	else $this->session->set_flashdata("message", "danger-Edit Failed");
	    }
	  }
    redirect(site_url('news'));
  }
  
  function news_cat()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'news_cat';
    $data['filez'] = 'news';
    $data['functionz'] = 'news_cat';
    $data['labelz'] = 'Kategory';
    $this->load->view('template', $data);
	}
  
  function news_cat_list($trash=0)
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
		
		$query_no_limit = "SELECT * FROM kg_news_cat WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_news_cat WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('news/news_cat_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $data[] = array($no, $r['title'], $check);
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
  
  function news_cat_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'news_cat_detail';
    $data['filez'] = 'news';
    $data['functionz'] = 'news_cat';
    $data['labelz'] = 'Kategory';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("news_cat", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function news_cat_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("news_cat", array("is_delete"=> 1));
			}
		}
	}
  
  function news_cat_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    $post = $param = $this->input->post();
unset($post['id']);
		if(!isset($post['is_publish'])) $post['is_publish']=0;
		
		$cek_id = GetValue("id","news_cat",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
    	$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("news_cat", $post)) $this->session->set_flashdata("message", "success-Add Success");
    	else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
    	$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
    	if($this->db->update("news_cat", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    redirect(site_url('news/news_cat'));
  }
}
