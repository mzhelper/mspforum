<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dao extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
  
	public function main($param=NULL)
	{
		/*$q = GetAll("member_dao");
		foreach($q->result_array() as $r) {
			$uid = MD5($this->config->item('encryption_key')."dao".$r['id']);
			$this->db->where("id", $r['id']);
			$this->db->update("member_dao", array("uid"=> $uid));
		}*/
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'dao';
    $data['filez'] = 'dao';
    $data['functionz'] = 'dao';
    $data['labelz'] = 'DAO';
    $data['param'] = $param;
    $this->load->view('template', $data);
	}
    
  function dao_list($param=NULL)
  {
  	ini_set('memory_limit', -1);
  	$where="(id_parents is NULL OR id_parents=0) AND is_delete=0";
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
		
		$query_no_limit = "SELECT * FROM kg_member_dao WHERE ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_member_dao WHERE ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
  		$uid = $r['uid'];
  		$check = "<a href='".site_url('dao/dao_detail/'.$uid)."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href='".site_url('dao/delegate/'.$uid)."'><i class='icon icon-documents'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href='".site_url('dao/kirim_aktivasi/'.$uid)."'><i class='icon icon-envelope'></i></a>";
		  $check .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$uid."' zz='2'></i></a>";
		  $aktif = $r['is_active']=="Active" ? "<span style='color:green;'>Active</span>" : "<span style='color:red;'>InActive</span>";
		  $data[] = array($no, $r['firstname'], $r['lastname'], $r['email'], $aktif, $check);
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
  
  function dao_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'dao_detail';
    $data['filez'] = 'dao';
    $data['functionz'] = 'dao';
    $data['labelz'] = 'DAO';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("member_dao", array("uid"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
  
  function dao_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("uid", $idz);
				$this->db->update("member_dao", array("is_delete"=> 1));
			}
		}
	}
  
  function dao_add()
  {
    ini_set('memory_limit', -1);
    $admin_id=permission();
    if($admin_id==1) {
    	$ins=array();
	    $post = $param = $this->input->post();
	    //Regex Password
			$cek_psw = preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $post['password']);
			if(!$cek_psw) {
				$this->session->set_flashdata('message', 'Password failed');
				redirect(site_url('dao/dao_detail/0'));
			}
			unset($post['id']);
			$ins['type_reg'] = 5;
			$ins['modify_user_id'] = $admin_id;
			$ins['modify_date'] = date("Y-m-d H:i:s");
			$ins['is_delete'] = 0;
			$ins['firstname'] = html_escape($post['firstname']);
			$ins['lastname'] = html_escape($post['lastname']);
			$ins['email'] = html_escape($post['email']);
			$ins['hp'] = html_escape($post['hp']);
			/*$ins['gender'] = $post['gender'];
			$ins['dob'] = $post['dob'];
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
			$ins['visa_type'] = $post['visa_type'];*/
			
			$ins['alt_email'] = $post['alt_email'];
			if($post['password'] != $post['password_old']) $ins['password'] = MD5($this->config->item('encryption_key').$post['password']);
			unset($post['password_old']);
			$ins['is_active']=$post['is_active'];
			if(!isset($post['is_active'])) $ins['is_active']="InActive";
			else $ins['is_active']="Active";
			if(!isset($post['is_lock'])) $ins['is_lock']=0;
			else $ins['is_lock']=1;
			
			// upload file
			$config['upload_path']          = $this->config->item('path_upload');
			$config['allowed_types']        = 'jpg|png|jpeg|pdf';
			$config['max_size']             = 500;
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			// end
			
			$cek_id = GetValue("id","member_dao",array("uid"=> "where/".$param['id']));
			if(!$cek_id) {
				if (!$this->upload->do_upload('photo')){
					//$post['photo'] = "";
				} else {
					$image = $this->upload->data();
					$ins['photo'] = $image['file_name'];
				}
				if (!$this->upload->do_upload('surat_tugas')){
					//$post['surat_tugas'] = "";
				} else {
					$surat_tugas 			= $this->upload->data();
					$ins['surat_tugas'] 	= $surat_tugas['file_name'];
				}
	    	$ins['create_user_id'] = $admin_id;
				$ins['create_date'] = date("Y-m-d H:i:s");
				$ins['modify_user_id'] = $admin_id;
				$ins['modify_date'] = date("Y-m-d H:i:s");
				if($this->db->insert("member_dao", $ins)) {
					$last_id = $this->db->insert_id();
					$this->db->where("id", $last_id);
					$this->db->update("member_dao", array("uid"=> MD5($this->config->item('encryption_key')."dao".$last_id)));
					$this->session->set_flashdata("message", "success-Add Success");
				}
	    	else $this->session->set_flashdata("message", "danger-Add Failed");
	    } else {
	    	$record = GetAll('member_dao',array('id'=>'where/'.$cek_id))->row_array();
				if (!$this->upload->do_upload('photo')){
					$ins['photo'] 	= $record['photo'];
				} else {
					$image = $this->upload->data();
					$ins['photo'] 	= $image['file_name'];
				}
				if (!$this->upload->do_upload('surat_tugas')){
					$ins['surat_tugas'] 	= $record['surat_tugas'];
				} else {
					$surat_tugas 			= $this->upload->data();
					$ins['surat_tugas'] 	= $surat_tugas['file_name'];
				}
	    	$ins['modify_user_id'] = $admin_id;
				$ins['modify_date'] = date("Y-m-d H:i:s");
				$this->db->where("uid", $param['id']);
	    	if($this->db->update("member_dao", $ins)) $this->session->set_flashdata("message", "success-Edit Success");
	    	else $this->session->set_flashdata("message", "danger-Edit Failed");
	    	
	    	//Unlock
		    $this->db->where("id_parents", $cek_id);
		    $this->db->update("member_dao", array("is_lock"=> $ins['is_lock']));
		    //lastq();
	    }
	  }
    redirect(site_url('dao'));
  }
  
  function dao_hapus()
  {
  	$post = $this->input->post("chk");
  	foreach($post as $key=> $val) {
  		$this->db->where("uid", $key);
			if($this->input->post("del_res")==1) $this->db->update("member_dao", array("is_delete"=> 0));
			else $this->db->update("member_dao", array("is_delete"=> 1));
  	}
  	
  	if($this->input->post("del_res")==1) redirect(site_url('dao/main/1'));
  	else redirect(site_url('dao/main'));
  }
  
  function dao_akt()
  {
  	$post = $this->input->post("chk");
  	foreach($post as $key=> $val) {
  		$this->db->where("uid", $key);
			if($this->input->post("del_res")==1) $this->db->update("member_dao", array("is_active"=> 0));
			else $this->db->update("member_dao", array("is_active"=> 1));
  	}
  	
  	if($this->input->post("del_res")==1) redirect(site_url('dao/main/1'));
  	else redirect(site_url('dao/main'));
  }
  
  function delegate($param=NULL)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'delegate';
    $data['filez'] = 'dao';
    $data['functionz'] = 'delegate';
    $data['labelz'] = 'DAO Delegate';
    $data['param'] = $param;
    $this->load->view('template', $data);
	}
    
  function delegate_list($param=NULL)
  {
  	ini_set('memory_limit', -1);
  	$idz = GetValue("id","member_dao",array("uid"=> "where/".$param));
  	$where="id_parents = ".$idz." AND is_delete=0";
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
		
		$query_no_limit = "SELECT * FROM kg_member_dao WHERE ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_member_dao WHERE ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
  		$uid = $r['uid'];
  		$check = "<a href='".site_url('dao/delegate_detail/'.$uid)."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href='".site_url('dao/kirim_aktivasi_delegate/'.$uid)."'><i class='icon icon-envelope'></i></a>";
		  $check .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$uid."' zz='2'></i></a>";
		  $aktif = $r['is_active']=="Active" ? "<span style='color:green;'>Active</span>" : "<span style='color:red;'>InActive</span>";
		  $data[] = array($no, $r['firstname'], $r['lastname'], $r['email'], $opt_type[$r['type_reg']], $aktif, $check);
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
  
  function delegate_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'delegate_detail';
    $data['filez'] = 'dao';
    $data['functionz'] = 'delegate';
    $data['labelz'] = 'DAO Delegate';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("member_dao", array("uid"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
  
  function delegate_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("uid", $idz);
				$this->db->update("member_dao", array("is_delete"=> 1));
			}
		}
	}
  
  function delegate_add()
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
			
			$ins['alt_email'] = $post['alt_email'];
			if($post['password'] != $post['password_old']) $ins['password'] = MD5($this->config->item('encryption_key').$post['password']);
			unset($post['password_old']);
			$ins['is_active']=$post['is_active'];
			if(!isset($post['is_active'])) $ins['is_active']="InActive";
			
			// upload file
			$config['upload_path']          = $this->config->item('path_upload');
			$config['allowed_types']        = 'jpg|png|jpeg|pdf';
			$config['max_size']             = 500;
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			// end
			
			$cek_id = GetValue("id","member_dao",array("uid"=> "where/".$param['id']));
			if(!$cek_id) {
				if (!$this->upload->do_upload('photo')){
					$post['photo'] = "";
				} else {
					$image = $this->upload->data();
					$ins['photo'] = $image['file_name'];
				}
				if (!$this->upload->do_upload('ktp')){
					$post['ktp'] = "";
				} else {
					$ktp 			= $this->upload->data();
					$ins['ktp'] 	= $ktp['file_name'];
				}
				if (!$this->upload->do_upload('surat_tugas')){
					$post['surat_tugas'] = "";
				} else {
					$surat_tugas 			= $this->upload->data();
					$ins['surat_tugas'] 	= $surat_tugas['file_name'];
				}
	    	$ins['create_user_id'] = $admin_id;
				$ins['create_date'] = date("Y-m-d H:i:s");
				$ins['modify_user_id'] = $admin_id;
				$ins['modify_date'] = date("Y-m-d H:i:s");
				if($this->db->insert("member_dao", $ins)) {
					$last_id = $this->db->insert_id();
					$this->db->where("id", $last_id);
					$this->db->update("member_dao", array("uid"=> MD5($this->config->item('encryption_key')."dao".$last_id)));
					$this->session->set_flashdata("message", "success-Add Success");
				}
	    	else $this->session->set_flashdata("message", "danger-Add Failed");
	    } else {
	    	$record = GetAll('member_dao',array('id'=>'where/'.$cek_id))->row_array();
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
				if (!$this->upload->do_upload('surat_tugas')){
					$ins['surat_tugas'] 	= $record['surat_tugas'];
				} else {
					$surat_tugas 			= $this->upload->data();
					$ins['surat_tugas'] 	= $surat_tugas['file_name'];
				}
	    	$ins['modify_user_id'] = $admin_id;
				$ins['modify_date'] = date("Y-m-d H:i:s");
				$this->db->where("uid", $param['id']);
	    	if($this->db->update("member_dao", $ins)) $this->session->set_flashdata("message", "success-Edit Success");
	    	else $this->session->set_flashdata("message", "danger-Edit Failed");
	    }
	  }
	  $uid_parents = GetValue("uid","member_dao",array("id"=> "where/".$post['id_parents']));
    redirect(site_url('dao/delegate/'.$uid_parents));
  }
  
  function delegate_hapus()
  {
  	$post = $this->input->post("chk");
  	foreach($post as $key=> $val) {
  		$this->db->where("uid", $key);
			if($this->input->post("del_res")==1) $this->db->update("member_dao", array("is_delete"=> 0));
			else $this->db->update("member_dao", array("is_delete"=> 1));
  	}
  	
  	if($this->input->post("del_res")==1) redirect(site_url('dao/main/1'));
  	else redirect(site_url('dao/main'));
  }
  
  function delegate_akt()
  {
  	$post = $this->input->post("chk");
  	foreach($post as $key=> $val) {
  		$this->db->where("uid", $key);
			if($this->input->post("del_res")==1) $this->db->update("member_dao", array("is_active"=> 0));
			else $this->db->update("member_dao", array("is_active"=> 1));
  	}
  	
  	if($this->input->post("del_res")==1) redirect(site_url('dao/main/1'));
  	else redirect(site_url('dao/main'));
  }
	
	function kirim_aktivasi($idz)
	{
		if($idz) {
			$q = GetAll("member_dao", array("uid"=> "where/".$idz));
			if($q->num_rows() > 0) {
				foreach($q->result_array() as $r) {
					$post = $r;
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
		      $message .= "You have invitation to HLF MSP 2024, Bali, Sept 01 - 03, 2024.<br><br>"; 
		      $message .= "Please find attachment for details:<br>";
		      /*$message .= "<table>";
		      $message .= "<tr><td colspan='2'><br><b>Personal Details</b></td></tr>";
		      $message .= "<tr><td>First Name</td><td>: ".$post['firstname']."</td></tr>";
		      $message .= "<tr><td>Last Name</td><td>: ".$post['lastname']."</td></tr>";
		      $message .= "<tr><td>Email</td><td>: ".$post['email']."</td></tr>";
		      $message .= "<tr><td>Phone Number</td><td>: ".$post['hp']."</td></tr>";
		      $message .= "</table>";*/
		      $message .= "<br><br>";
		      $message .= 'Best regards,<br>';
		      $message .= 'Secretariat HLF MSP 2024<br>';
		      //die($message);
			    $this->email->from('no-reply@mspforum.id');
		      $this->email->to($email);
		      $this->email->bcc("mazhtersevents@gmail.com");
		      $this->email->subject($subject);
		      $this->email->message($message);
		      if($post['pdf'] && file_exists($this->config->item('path_upload')."/".$post['pdf'])) $this->email->attach($path_pdf);
		      $send = $this->email->send();
				}
			}			
		}
		redirect(site_url('dao'));
	}
	
	function kirim_aktivasi_delegate($idz)
	{
		if($idz) {
			$q = GetAll("member_dao", array("uid"=> "where/".$idz));
			if($q->num_rows() > 0) {
				foreach($q->result_array() as $r) {
					$post = $r;
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
		      $message .= "You have invitation to HLF MSP 2024, Bali, Sept 01 - 03, 2024.<br><br>"; 
		      $message .= "Please find attachment for details:<br>";
		      /*$message .= "<table>";
		      $message .= "<tr><td colspan='2'><br><b>Personal Details</b></td></tr>";
		      $message .= "<tr><td>First Name</td><td>: ".$post['firstname']."</td></tr>";
		      $message .= "<tr><td>Last Name</td><td>: ".$post['lastname']."</td></tr>";
		      $message .= "<tr><td>Email</td><td>: ".$post['email']."</td></tr>";
		      $message .= "<tr><td>Phone Number</td><td>: ".$post['hp']."</td></tr>";
		      $message .= "</table>";*/
		      $message .= "<br><br>";
		      $message .= 'Best regards,<br>';
		      $message .= 'Secretariat HLF MSP 2024<br>';
		      //die($message);
			    $this->email->from('no-reply@mspforum.id');
		      $this->email->to($email);
		      $this->email->bcc("mazhtersevents@gmail.com");
		      $this->email->subject($subject);
		      $this->email->message($message);
		      if($post['pdf'] && file_exists($this->config->item('path_upload')."/".$post['pdf'])) $this->email->attach($path_pdf);
		      $send = $this->email->send();
				}
			}			
		}
		redirect(site_url('dao'));
	}
}
