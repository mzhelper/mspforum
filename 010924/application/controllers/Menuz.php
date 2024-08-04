<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menuz extends CI_Controller {
	
	function index()
  {
      $this->top();
  }
	
	function top()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'menu_top';
    $data['filez'] = 'menuz';
    $data['functionz'] = 'top';
    $data['labelz'] = 'Top Menu';
    $this->load->view('template', $data);
	}
  
  function top_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'menu_top_detail';
    $data['filez'] = 'menuz';
    $data['functionz'] = 'top';
    $data['labelz'] = 'Top Menu';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("menu_top", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function top_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			$is_publish = GetValue("is_publish","menu_top",array("id"=> "where/".$idz));
			$publish = $is_publish ? 0 : 1;
			$this->db->where("id", $idz);
			$this->db->update("menu_top", array("is_publish"=> $publish));
			/*
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("menu_top", array("is_delete"=> 1));
			}*/
		}
	}
	
	function top_updown()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			$q = GetAll("menu_top",array("id"=> "where/".$idz))->result_array()[0];
			$id_parents=$q['id_parents'];
			$urutan=$q['urutan'];
			if($this->input->post("param")=="up") {
				$urut = $urutan > 1 ? $urutan-1 : $urutan;
			} else {
				$urut = $urutan+1;
			}
			//Cek Urutan terakhir
			$cek = GetValue("id","menu_top",array("urutan"=> "where/".$urut, "id_parents"=> "where/".$id_parents));
			if($cek) {
				//Update Urutan Lama
				$this->db->where("urutan", $urut);
				$this->db->where("id_parents", $id_parents);
				$this->db->update("menu_top", array("urutan"=> $urutan));
				//Update Urutan Baru
				$this->db->where("id", $idz);
				$this->db->update("menu_top", array("urutan"=> $urut));
			}
		}
	}
  
  function top_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    $post = $param = $this->input->post();
unset($post['id']);
		if(!isset($post['is_publish'])) $post['is_publish']=0;
		
		$cek_id = GetValue("id","menu_top",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
    	$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			$urut = GetValue("urutan","menu_top",array("id_parents"=> "where/".$post['id_parents'], "urutan"=> "order/desc", "limit"=> "0/1"));
			$post['urutan'] = $urut+1;
			if($this->db->insert("menu_top", $post)) $this->session->set_flashdata("message", "success-Add Success");
    	else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
    	$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			//Cek Id Parents Perubahan
			$parents = GetValue("id_parents","menu_top",array("id"=> "where/".$param['id']));
			if($parents!=$post['id_parents']) {
				//$urut = GetValue("urutan","menu_top",array("id_parents"=> "where/".$post['id_parents'], "urutan"=> "order/desc", "limit"=> "0/1"));
				//$post['urutan'] = $urut+1;
			}			
			$this->db->where("id", $param['id']);
    	if($this->db->update("menu_top", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    redirect(site_url('menuz/top'));
  }
  
  function bottom()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'menu_bottom';
    $data['filez'] = 'menuz';
    $data['functionz'] = 'bottom';
    $data['labelz'] = 'Bottom Menu';
    $this->load->view('template', $data);
	}
  
  function bottom_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'menu_bottom_detail';
    $data['filez'] = 'menuz';
    $data['functionz'] = 'bottom';
    $data['labelz'] = 'bottom Menu';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("menu_bottom", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function bottom_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			$is_publish = GetValue("is_publish","menu_bottom",array("id"=> "where/".$idz));
			$publish = $is_publish ? 0 : 1;
			$this->db->where("id", $idz);
			$this->db->update("menu_bottom", array("is_publish"=> $publish));
			/*
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("menu_bottom", array("is_delete"=> 1));
			}*/
		}
	}
	
	function bottom_updown()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			$q = GetAll("menu_bottom",array("id"=> "where/".$idz))->result_array()[0];
			$id_parents=$q['id_parents'];
			$urutan=$q['urutan'];
			if($this->input->post("param")=="up") {
				$urut = $urutan > 1 ? $urutan-1 : $urutan;
			} else {
				$urut = $urutan+1;
			}
			//Cek Urutan terakhir
			$cek = GetValue("id","menu_bottom",array("urutan"=> "where/".$urut, "id_parents"=> "where/".$id_parents));
			if($cek) {
				//Update Urutan Lama
				$this->db->where("urutan", $urut);
				$this->db->where("id_parents", $id_parents);
				$this->db->update("menu_bottom", array("urutan"=> $urutan));
				//Update Urutan Baru
				$this->db->where("id", $idz);
				$this->db->update("menu_bottom", array("urutan"=> $urut));
			}
		}
	}
  
  function bottom_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    $post = $param = $this->input->post();
unset($post['id']);
		if(!isset($post['is_publish'])) $post['is_publish']=0;
		
		$cek_id = GetValue("id","menu_bottom",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
    	$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			$urut = GetValue("urutan","menu_bottom",array("id_parents"=> "where/".$post['id_parents'], "urutan"=> "order/desc", "limit"=> "0/1"));
			$post['urutan'] = $urut+1;
			if($this->db->insert("menu_bottom", $post)) $this->session->set_flashdata("message", "success-Add Success");
    	else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
    	$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			//Cek Id Parents Perubahan
			$parents = GetValue("id_parents","menu_bottom",array("id"=> "where/".$param['id']));
			if($parents!=$post['id_parents']) {
				$urut = GetValue("urutan","menu_bottom",array("id_parents"=> "where/".$post['id_parents'], "urutan"=> "order/desc", "limit"=> "0/1"));
				$post['urutan'] = $urut+1;
			}			
			$this->db->where("id", $param['id']);
    	if($this->db->update("menu_bottom", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    redirect(site_url('menuz/bottom'));
  }
}
