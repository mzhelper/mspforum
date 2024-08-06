<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main()
	{
	    redirect(site_url('home'));
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'content';
    $data['filez'] = 'content';
    $data['functionz'] = 'content';
    $data['labelz'] = 'Pages';
    $this->load->view('template', $data);
	}
	
	function content_list($trash=0)
  {
  	redirect(site_url('home'));
  	ini_set('memory_limit', -1);
  	$where="1=1";
  	$kolom = array("","title","slug");
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
		
		$query_no_limit = "SELECT * FROM kg_contents WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_contents WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('content/content_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $publish = $r['is_publish'] ? "Published" : "Draft";
		  $data[] = array($no, $r['title'], "contents/".$r['slug'], $publish, $check);
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
  
  function content_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'content_detail';
    $data['filez'] = 'content';
    $data['functionz'] = 'content';
    $data['labelz'] = 'Pages';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("contents", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function content_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("contents", array("is_delete"=> 1));
			}
		}
	}
  
  function content_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    $post = $param = $this->input->post();
		unset($post['id']);
    $post['slug'] = url_title($post['title']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date'] = date("Y-m-d H:i:s");
		if(!isset($post['is_publish'])) $post['is_publish']=0;
		
		//File
		$flz = array("file");
		foreach($flz as $key) {
			$file_up = date("YmdHis").".".$_FILES[$key]['name'];
			$myfile_up	= $_FILES[$key]['tmp_name'];
			$ukuranfile_up = $_FILES[$key]['size'];
			$up_file = "../uploads/".$file_up;
			if($_FILES[$key]['name']) {
				//unlink("../uploads/".$file_up);
				if(copy($myfile_up, $up_file)) {
					$post[$key] = $file_up;
				}
			}
		}
		//print_mz($post);
		$cek_id = GetValue("id","contents",array("id"=> "where/".$param['id']));
		if($admin_id==1) {
			if(!$cek_id) {
	    	if($this->db->insert("contents", $post)) $this->session->set_flashdata("message", "success-Add Success");
	    	else $this->session->set_flashdata("message", "danger-Add Failed");
	    } else {
	    	$this->db->where("id", $param['id']);
	    	if($this->db->update("contents", $post)) $this->session->set_flashdata("message", "success-Edit Success");
	    	else $this->session->set_flashdata("message", "danger-Edit Failed");
	    }
	  }
    redirect(site_url('content/content_detail/'.$cek_id));
  }
}
