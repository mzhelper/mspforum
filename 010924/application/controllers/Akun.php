<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
  
	public function main($param=NULL)
	{
		/*$q = GetAll("member");
		foreach($q->result_array() as $r) {
			$uid = MD5($this->config->item('encryption_key').$r['id']);
			$this->db->where("id", $r['id']);
			$this->db->update("member", array("uid"=> $uid));
		}
		die();*/
		permission();
		$not = array("7","8","13","14","15","16","17","18","19");
		if(!in_array($param, $not)) redirect(site_url('home'));
    $data = GetHeaderFooter();
    $data['main'] = 'akun';
    $data['filez'] = 'akun';
    $data['functionz'] = 'akun';
    $data['labelz'] = 'Create Account';
    $data['param'] = $param;
    $this->load->view('template', $data);
	}
    
  function akun_list($param=NULL)
  {
  	ini_set('memory_limit', -1);
  	$where="type_reg='".$param."' AND is_delete=0";
  	$opt_type = GetOptAll("type_reg");
  	$kolom = array("","firstname","lastname","email","type_reg","is_active","create_date","");
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
		
		$query_no_limit = "SELECT * FROM kg_member WHERE ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_member WHERE ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	$uid = $r['uid'];
  		$check = "<a href='".site_url('akun/akun_detail/'.$uid)."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$uid."' zz='2'></i></a>";
		  $aktif = $r['is_active']=="Active" ? "<span style='color:green;'>Active</span>" : "<span style='color:red;'>InActive</span>";
		  if($r['is_active']=="Active") $check .= "&nbsp;&nbsp;<a href='".site_url('akun/kirim_aktivasi/'.$uid)."'><i class='icon icon-envelope'></i></a>";
		  $data[] = array($no, $r['firstname'], $r['email'], $opt_type[$r['type_reg']], $r['institusi'], $r['designation'], $aktif, FormatTanggal($r['create_date']), $check);
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
  
  function akun_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'akun_detail';
    $data['filez'] = 'akun';
    $data['functionz'] = 'akun';
    $data['labelz'] = 'Create Account';
    $data['id'] = $id;
    if($id) {
    	//$q = GetAll("member", array("id"=> "where/".$id))->result_array()[0];
    	$q = GetAll("member", array("uid"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
  
  function akun_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("uid", $idz);
				$this->db->update("member", array("is_delete"=> 1));
			}
		}
	}
  
  function akun_add()
  {
    ini_set('memory_limit', -1);
    $admin_id=permission();
    if($admin_id==1) {
	    $ins=array();
	    $post = $param = $this->input->post();
			unset($post['id']);
			$ins['modify_user_id'] = $admin_id;
			$ins['modify_date'] = date("Y-m-d H:i:s");
			$ins['is_delete'] = 0;
			$ins['is_active']="Active";
			if(!isset($post['is_active'])) $ins['is_active']="InActive";
			
			// upload file
			$config['upload_path']          = $this->config->item('path_upload');
			$config['allowed_types']        = 'jpg|png|jpeg|pdf';
			$config['max_size']             = 500;
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			// end
			
			$cek_id = GetValue("id","member",array("uid"=> "where/".$param['id']));
			if(!$cek_id) {
	    	$ins['create_user_id'] = $admin_id;
				$ins['create_date'] = date("Y-m-d H:i:s");
				$ins['modify_user_id'] = $admin_id;
				$ins['modify_date'] = date("Y-m-d H:i:s");
				if($this->db->insert("member", $ins)) $this->session->set_flashdata("message", "success-Add Success");
	    	else $this->session->set_flashdata("message", "danger-Add Failed");
	    } else {
	    	$ins['modify_user_id'] = $admin_id;
				$ins['modify_date'] = date("Y-m-d H:i:s");
				$this->db->where("uid", $param['id']);
	    	if($this->db->update("member", $ins)) $this->session->set_flashdata("message", "success-Edit Success");
	    	else $this->session->set_flashdata("message", "danger-Edit Failed");
	    }
	  }
    redirect(site_url('akun/main/'.$post['type_reg']));
  }
  
  function akun_hapus()
  {
  	$post = $this->input->post("chk");
  	foreach($post as $key=> $val) {
  		$this->db->where("uid", $key);
			if($this->input->post("del_res")==1) $this->db->update("member", array("is_delete"=> 0));
			else $this->db->update("member", array("is_delete"=> 1));
  	}
  	
  	if($this->input->post("del_res")==1) redirect(site_url('akun/main/1'));
  	else redirect(site_url('akun/main'));
  }
  
  function akun_akt()
  {
  	$post = $this->input->post("chk");
  	foreach($post as $key=> $val) {
  		$this->db->where("uid", $key);
			if($this->input->post("del_res")==1) $this->db->update("member", array("is_active"=> 0));
			else $this->db->update("member", array("is_active"=> 1));
  	}
  	
  	if($this->input->post("del_res")==1) redirect(site_url('akun/main/1'));
  	else redirect(site_url('akun/main'));
  }
	
	function kirim_aktivasi($idz)
	{
		if($idz) {
			$q = GetAll("member", array("uid"=> "where/".$idz));
			if($q->num_rows() > 0) {
				foreach($q->result_array() as $r) {
					$post = $r;
					/*$pass = $this->createPassword();
			    $post['password'] = md5('mzhelper'.$pass);
			    $this->db->where("id", $idz);
			    $this->db->update("member",array("password"=> $post['password']));*/
			    $config=array();
		      $config['wordwrap'] = TRUE;
		    	$config['mailtype'] = 'html';
		    	$config['protocol'] = 'smtp';
		    	$config['smtp_host'] = 'localhost';
		    	$config['smtp_port'] = 25;
		    	$config['charset'] = "utf-8";
		    	$config['newline'] = '\r\n';
		    	$config['crlf'] = '\r\n';
		    	
		    	$this->load->library('email', $config);
		      $this->email->initialize($config);
		      $email = $post['email'];
		      $subject="HLF MSP 2024 - Account Activation";
		      $message = "Dear ".$post['firstname'].",<br>";
		      $message .= "Congratulations, your account is now active. Please log in using the following link :<br>"; 
		      $message .= "<a href='https://mspforum.id/register/login'>https://mspforum.id/register/login</a><br><br>";
		      //$message .= "For accreditation letter requests, please access the link below :<br>"; 
		      //$message .= "<a href='https://mspforum.id/register'>https://mspforum.id/register</a><br><br>";
		      $message .= "For accreditation letter requests, please click 'Register Now' on the homepage after logging in the website <a href='https://mspforum.id'>mspforum.id</a>";
		      $message .= "<br><br>";
		      $message .= 'Best regards,<br>';
		      $message .= 'Secretariat HLF MSP 2024<br>';
		      //die($message);
			    $this->email->from('registration@mspforum.id');
		      $this->email->to($email);
		      $this->email->bcc("mazhtersevents@gmail.com");
		      $this->email->subject($subject);
		      $this->email->message($message);
		      //$this->email->attach($path_pdf);
		      //$this->email->set_newline("\r\n");
		      $send = $this->email->send();
				}
			}			
		}
		redirect(site_url('akun/main/'.$post['type_reg']));
	}
	
	function createPassword()
	{
		$pass = "";
		$jum = rand(1,7);
		
		//Huruf
		$huruf = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ";
		for($i=1;$i<=$jum;$i++)
		{
			$pass .= substr($huruf,rand(0,46),1);
		}
		
		//Angka
		$angka = "23456789";
		for($i=1;$i<=8-$jum;$i++)
		{
			$pass .= substr($angka,rand(0,7),1);
		}
		
		return $pass;
	}
}
