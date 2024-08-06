<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
  
	public function main($param=NULL)
	{
	    $not = array("7","8","13","14","15","16","17","18","19");
		if(!in_array($param, $not)) redirect(site_url('home'));
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'user';
    $data['filez'] = 'user';
    $data['functionz'] = 'user';
    $data['labelz'] = 'Registration';
    $data['param'] = $param;
    $this->load->view('template', $data);
	}
    
  function user_list($param=NULL)
  {
  	ini_set('memory_limit', -1);
  	$where="type_reg='".$param."' AND ktp is not NULL AND is_delete=0";
  	$opt_type = GetOptAll("type_reg");
  	$kolom = array("","firstname","lastname","email","type_reg","is_active","create_date","");
  	if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
  	else $ord = " id desc ";
		
		if(isset($_POST['search']['value'])) {
			$src = $_POST['search']['value'];
			if($src) {
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
  		$check = "<a href='".site_url('user/user_detail/'.$uid)."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$uid."' zz='2'></i></a>";
		  $aktif = $r['is_active']=="Active" ? "<span style='color:green;'>Active</span>" : "<span style='color:red;'>InActive</span>";
		  $data[] = array($no, $r['firstname'], $r['lastname'], $r['email'], $opt_type[$r['type_reg']], $aktif, FormatTanggal($r['create_date']), $check);
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
  
  function user_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'user_detail';
    $data['filez'] = 'user';
    $data['functionz'] = 'user';
    $data['labelz'] = 'Registration';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("member", array("uid"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
  
  function user_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("uid", $idz);
				$this->db->update("member", array("is_delete"=> 1));
			}
		}
	}
  
  function user_add()
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
			$ins['firstname'] = $post['firstname'];
			$ins['lastname'] = $post['lastname'];
			$ins['gender'] = $post['gender'];
			$ins['email'] = $post['email'];
			$ins['dob'] = $post['dob'];
			$ins['hp'] = $post['hp'];
			$ins['institusi'] = $post['institusi'];
			$ins['designation'] = $post['designation'];
			$ins['id_country'] = $post['id_country'];
			$ins['kewarganegaraan'] = $post['kewarganegaraan'];
			$ins['dietary'] = $post['dietary'];
			$ins['bio'] = $post['bio'];
			$ins['passport_type'] = $post['passport_type'];
			$ins['passport'] = $post['passport'];
			$ins['passport_exp'] = $post['passport_exp'];
			$ins['passport_place'] = $post['passport_place'];
			$ins['visa_type'] = $post['visa_type'];
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
				if (!$this->upload->do_upload('photo')){
					$ins['photo'] = "";
				} else {
					$image = $this->upload->data();
					$ins['photo'] = $image['file_name'];
				}
				if (!$this->upload->do_upload('ktp')){
					$ins['ktp'] = "";
				} else {
					$ktp 			= $this->upload->data();
					$ins['ktp'] 	= $ktp['file_name'];
				}
				/*if (!$this->upload->do_upload('surat_tugas')){
					$post['surat_tugas'] = "";
				} else {
					$surat_tugas 			= $this->upload->data();
					$post['surat_tugas'] 	= $surat_tugas['file_name'];
				}*/
	    	$ins['create_user_id'] = $admin_id;
				$ins['create_date'] = date("Y-m-d H:i:s");
				$ins['modify_user_id'] = $admin_id;
				$ins['modify_date'] = date("Y-m-d H:i:s");
				if($this->db->insert("member", $ins)) $this->session->set_flashdata("message", "success-Add Success");
	    	else $this->session->set_flashdata("message", "danger-Add Failed");
	    } else {
	    	$record = GetAll('member',array('id'=>'where/'.$cek_id))->row_array();
				if (!$this->upload->do_upload('photo')){
					$ins['photo'] 	= $record['photo'];
				} else {
					$image = $this->upload->data();
					$ins['photo'] 	= $image['file_name'];
				}
				if (!$this->upload->do_upload('ktp')){
					$ins['ktp'] 	= $record['ktp'];
				} else {
					$ktp 			= $this->upload->data();
					$ins['ktp'] 	= $ktp['file_name'];
				}
				/*if (!$this->upload->do_upload('surat_tugas')){
					$post['surat_tugas'] = $record['surat_tugas'];
				} else {
					$surat_tugas 			= $this->upload->data();
					$post['surat_tugas'] 	= $surat_tugas['file_name'];
				}*/
	    	$ins['modify_user_id'] = $admin_id;
				$ins['modify_date'] = date("Y-m-d H:i:s");
				$this->db->where("uid", $param['id']);
	    	if($this->db->update("member", $ins)) $this->session->set_flashdata("message", "success-Edit Success");
	    	else $this->session->set_flashdata("message", "danger-Edit Failed");
	    }
	  }
    redirect(site_url('user/main/'.$post['type_reg']));
  }
  
  function user_hapus()
  {
  	$post = $this->input->post("chk");
  	foreach($post as $key=> $val) {
  		$this->db->where("uid", $key);
			if($this->input->post("del_res")==1) $this->db->update("member", array("is_delete"=> 0));
			else $this->db->update("member", array("is_delete"=> 1));
  	}
  	
  	if($this->input->post("del_res")==1) redirect(site_url('user/main/1'));
  	else redirect(site_url('user/main'));
  }
  
  function user_akt()
  {
  	$post = $this->input->post("chk");
  	foreach($post as $key=> $val) {
  		$this->db->where("uid", $key);
			if($this->input->post("del_res")==1) $this->db->update("member", array("is_active"=> 0));
			else $this->db->update("member", array("is_active"=> 1));
  	}
  	
  	if($this->input->post("del_res")==1) redirect(site_url('user/main/1'));
  	else redirect(site_url('user/main'));
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
		      $message = "Dear ".$post['firstname']." ".$post['lastname'].",<br>";
		      $message .= "Thank you for your interest to participate in HLF MSP 2024, Bali, Sept 01 - 03, 2024.<br><br>"; 
		      $message .= "Please find your account details:<br>";
		      $message .= "<table>";
		      $message .= "<tr><td colspan='2'><br><b>Personal Details</b></td></tr>";
		      $message .= "<tr><td>Name</td><td>: ".$post['firstname']."</td></tr>";
		      //$message .= "<tr><td>Last Name</td><td>: ".$post['lastname']."</td></tr>";
		      //$message .= "<tr><td>Date of Birth</td><td>: ".date("F d, Y", strtotime($post['dob']))."</td></tr>";
		      $message .= "<tr><td>Email</td><td>: ".$post['email']."</td></tr>";
		      $message .= "<tr><td>Institution</td><td>: ".$post['institusi']."</td></tr>";
		      $message .= "<tr><td>Designation</td><td>: ".$post['designation']."</td></tr>";
		      //$message .= "<tr><td>Country</td><td>: ".GetValue("title","country",array("id"=> "where/".$post['id_country']))."</td></tr>";
		      //$message .= "<tr><td colspan='2'><br><b>Registration Details</b></td></tr>";
		      //$message .= "<tr><td>Registration Type</td><td>: ".GetValue("title","type_reg",array("id"=> "where/".$post['type_reg']))."</td></tr>";
		      //$message .= "<tr><td>Username</td><td>: ".$post['email']."</td></tr>";
		      //$message .= "<tr><td>Password</td><td>: ".$pass."</td></tr>";
		      $message .= "</table>";
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
		redirect(site_url('user/main/'.$post['type_reg']));
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
