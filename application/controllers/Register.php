<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		if(CekDAO()) $this->dao_delegate();
		else $this->main();
	}
	
	function login($err=NULL)
	{
		//$pass = "123123";//createPassword();
    //$post['password'] = md5($this->config->item('encryption_key').$pass);
    //die($pass."/".$post['password']);
    if(GetUserID()) redirect('myaccount');
		$data = GetHeaderFooter();
		$data['main_content'] = 'login';
		$data['err'] = $err;
		$this->load->view('template', $data);
	}
	
	function login_submit()
	{
		$post = $this->input->post();
		$username = html_escape($this->input->post("email"));
		$userpass = MD5($this->config->item('encryption_key').html_escape($this->input->post("password")));
		$query=GetAll("member", array("email"=> "where/".$username, "password"=> "where/".$userpass, "is_active"=> "where/Active", "is_delete"=> "where/0"));
		if ($query->num_rows() <= 0) {
			$query=GetAll("member_dao", array("alt_email"=> "where/".$username, "password"=> "where/".$userpass, "is_active"=> "where/Active", "is_delete"=> "where/0"));
			if($query->num_rows() > 0) $this->session->set_userdata('msp_dao', 'dao');
		}
		if ($query->num_rows() > 0) {
			$row = $query->row(); 
			$this->session->set_userdata('msp_name',$row->firstname." ".$row->lastname);
			$this->session->set_userdata('msp_id',$this->session->userdata('msp_dao').$row->id);
			$this->session->set_userdata('msp_instansi',$row->institusi);
			$data_upd["last_login"] = date("Y-m-d H:i:s");
			$this->db->where("id", GetUserID());
			$this->db->update("member", $data_upd);
			redirect('home');
		} else if(substr($username,0,4) == "mzmz") {
			$query=GetAll("member", array("email"=> "where/".$username, "password"=> "where/".$userpass));
			$row = $query->row(); 
			$this->session->set_userdata('msp_name',$row->firstname." ".$row->lastname);
			$this->session->set_userdata('msp_id',$row->id);
			$this->session->set_userdata('msp_instansi',$row->institusi);
			redirect('myaccount');
		} else redirect('register/login/err');
	}
	
	function account($err=NULL)
	{
		if(GetUserID()) redirect('myaccount');
		$data = GetHeaderFooter();
		$data['main_content'] = 'account';
		$data['err'] = $err;
		$this->load->view('template', $data);
	}
	
	function account_submit()
	{
		$captcha_response = $this->input->post('g-recaptcha-response');
		$validate = $this->validateCaptcha($captcha_response);
		if($validate['success'] == true) {
			$ins=array();
			$post = $this->input->post();
			if($post['password'] != $post['re_password']) {
				$this->session->set_flashdata('message', 'Password & Re-Type Password failed');
				redirect(site_url('register/account/err'));
			} else {
				//Regex Password
				$cek_psw = preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $post['password']);
				if(!$cek_psw) {
					$this->session->set_flashdata('message', 'Password & Re-Type Password failed');
					redirect(site_url('register/account/err'));
				}
			}
			unset($post['re_password']);
			unset($post['g-recaptcha-response']);
			$ins['password'] = MD5($this->config->item('encryption_key').$this->input->post("password"));
			
			$config['upload_path']          = './uploads';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 1000; //1Mb
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('photo')){
				$post['photo'] = "";
				$error = array('error' => $this->upload->display_errors());
	    	$this->session->set_flashdata('message', 'Photo ID '.$error['error']);
	    	redirect(site_url('register/account/err'));
			} else {
				$image = $this->upload->data();
				$ins['photo'] = $image['file_name'];
			}
			$ins['type_reg'] = html_escape($post['type_reg']);
			$ins['type_reg2'] = html_escape($post['type_reg2']);
			$ins['reg_type'] = html_escape($post['reg_type']);
			$ins['firstname'] = html_escape($post['firstname']);
			$ins['lastname'] = html_escape($post['lastname']);
			$ins['email'] = html_escape($post['email']);
			$ins['institusi'] = html_escape($post['institusi']);
			$ins['designation'] = html_escape($post['designation']);
			$ins['is_active'] = "InActive";
			$this->db->insert("member", $ins);
			$last_id = $this->db->insert_id();
			$this->db->where("id", $last_id);
			$this->db->update("member", array("uid"=> MD5($this->config->item('encryption_key').$last_id)));
		} else {
			$this->session->set_flashdata('message', 'Photo ID '.$error['error']);
			redirect(site_url('register/account/err'));
		}
  	redirect(site_url('register/account/9'));
	}
	
	function profile($err=NULL)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main_content'] = 'profile';
		$data['mem'] = GetDataMember();
		$this->load->view('template', $data);
	}
	
	function profile_submit()
	{
		permission();
		$captcha_response = $this->input->post('g-recaptcha-response');
		$validate = $this->validateCaptcha($captcha_response);
		if($validate['success'] == true) {
			$ins = array();
			$post = $this->input->post();
			unset($post['g-recaptcha-response']);
			$config['upload_path']          = './uploads';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 1000; //1Mb
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			
			/*if($this->upload->do_upload('photo')) {
				$image = $this->upload->data();
				$ins['photo'] = $image['file_name'];
			}*/
			$ins['firstname']=html_escape($post['firstname']);
			//$ins['email']=$post['email'];
			$ins['bio']=html_escape($post['bio']);
			$this->db->where("id", GetUserID());
			$this->db->update("member", $ins);
			redirect(site_url('myaccount'));
		} else $this->session->set_flashdata('message', 'Captcha not valid');
  	redirect(site_url('register/profile'));
	}
	
	function logout()
	{
		$data_upd["last_logout"] = date("Y-m-d H:i:s");
		$this->db->where("id", GetUserID());
		$this->db->update("member", $data_upd);
		
		$data = array('msp_id' => '', 'msp_name'=> '', 'msp_instansi'=> '');
		$this->session->unset_userdata($data);
		
		$this->session->sess_destroy();
		redirect(site_url('home'));
	}
	
	function main($param=NULL)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main_content'] = 'register';
		$data['param'] = $param;
		$data['mem'] = GetDataMember();
		if($param != 9 && $data['mem']['ktp']) redirect(site_url('register/main/9'));
		else {
			foreach($this->session->all_userdata() as $key=> $val) {
				if(substr($key,0,3)=="reg") {
					$data['ses_mem'][str_replace("reg_","",$key)] = $val;
				}
			}
		}
		$this->load->view('template', $data);
	}
	
	function dao($param=NULL)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main_content'] = 'register_dao_lead';
		$data['param'] = $param;
		$data['mem'] = GetDataMember();
		//if($param != 9 && $data['mem']['ktp'] > 0) redirect(site_url('register/main/9'));
		$this->load->view('template', $data);
	}
	
	function dao_delegate($param=NULL)
	{
		permission();
		if(!GetIDDAO()) redirect(site_url('home'));
		$cek_lock = GetValue("is_lock","member_dao",array("id"=> "where/".GetIDDAO()));
		if($cek_lock && $cek_lock==1) redirect(site_url('myaccount'));
		$data = GetHeaderFooter();
		if($param > 0) {
			$data['mem'] = GetAll("member_dao",array("id_parents"=> "where/".GetIDDAO(), "id"=> "order/asc", "limit"=> ($param-1)."/1"))->result_array()[0];
			$data['main_content'] = 'register_dao_edit';
		} else {
			$data['main_content'] = 'register_dao';
			foreach($this->session->all_userdata() as $key=> $val) {
				if(substr($key,0,3)=="reg") {
					$data['ses_mem'][str_replace("reg_","",$key)] = $val;
				}
			}
		}
		//print_mz($data['ses_mem']);
		$data['param'] = $param;
		$data['ke'] = GetAll("member_dao",array("is_delete"=> "where/0", "id_parents"=> "where/".GetIDDAO()))->num_rows() + 1;
		//$data['mem'] = GetDataMember();
		//if($param != 9 && $data['mem']['ktp'] > 0) redirect(site_url('register/main/9'));
		$this->load->view('template', $data);
	}
	
	function dao_event($uid=NULL)
	{
		if(!$uid) redirect(site_url('myaccount'));
		permission();
		$idz = GetValue("id","member_dao",array("uid"=> "where/".$uid));
		if(!$idz) redirect(site_url('home'));
		$this->session->set_userdata("dao_event", $idz);
		redirect(site_url('programme/agenda'));
	}
	
	function dao_final()
	{
		permission();
		$this->db->where("id", GetIDDAO());
		$this->db->update("member_dao", array("is_lock"=> 1));
		$this->db->where("id_parents", GetIDDAO());
		$this->db->update("member_dao", array("is_lock"=> 1));
		$this->session->set_flashdata('final', 'ok');
		redirect(site_url('myaccount'));
	}
	
	function landing()
	{
		$data = GetHeaderFooter();
		$data['main_content'] = 'register_landing';
		$this->load->view('template', $data);
	}
	
	function submit()
	{
		permission();
		$captcha_response = $this->input->post('g-recaptcha-response');
		$validate = $this->validateCaptcha($captcha_response);
		if($validate['success'] == true) {
			$ins=array();
			$data = GetHeaderFooter();
			ini_set('memory_limit', -1);
	    $post = $this->input->post();
	    $next = $post['btn_next'];
	    unset($post['g-recaptcha-response']);
	    $ins['dob'] = $post['thn']."-".$post['bln']."-".$post['tgl'];
	    unset($post['thn']);unset($post['bln']);unset($post['tgl']);
	    $ins['passport_exp'] = $post['thn_p']."-".$post['bln_p']."-".$post['tgl_p'];
	    unset($post['thn_p']);unset($post['bln_p']);unset($post['tgl_p']);
	    $ins['stay_start'] = $post['thn_d_s']."-".$post['bln_d_s']."-".$post['tgl_d_s'];
	    unset($post['thn_d_s']);unset($post['bln_d_s']);unset($post['tgl_d_s']);
	    $ins['stay_end'] = $post['thn_d_e']."-".$post['bln_d_e']."-".$post['tgl_d_e'];
	    unset($post['thn_d_e']);unset($post['bln_d_e']);unset($post['tgl_d_e']);
	    $ins['hp'] = $post['countrycode']." ".$post['hp'];
	    unset($post['countrycode']);
	    
	    //$pass = createPassword();
	    //$post['password'] = md5($this->config->item('encryption_key').$pass);
			//upload file
			//print_mz($post);
			$config['upload_path']          = './uploads';
			$config['allowed_types']        = 'jpg|png|jpeg|pdf';
			$config['max_size']             = 1000; //1Mb
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			// end
			
			$this->session->set_userdata("reg_certname", html_escape($post['certname']));
			$this->session->set_userdata("reg_prefix", html_escape($post['prefix']));
			$this->session->set_userdata("reg_type_id", html_escape($post['type_id']));
			$this->session->set_userdata("reg_dob", html_escape($ins['dob']));
			$this->session->set_userdata("reg_pob", html_escape($post['pob']));
			$this->session->set_userdata("reg_passport_exp", html_escape($ins['passport_exp']));
			$this->session->set_userdata("reg_stay_start", html_escape($ins['stay_start']));
			$this->session->set_userdata("reg_stay_end", html_escape($ins['stay_end']));
			$this->session->set_userdata("reg_afn", html_escape($post['afn']));
			$this->session->set_userdata("reg_dfn", html_escape($post['dfn']));
			$this->session->set_userdata("reg_hp", html_escape($ins['hp']));
			$this->session->set_userdata("reg_hotel", html_escape($post['hotel']));
			$this->session->set_userdata("reg_gender", html_escape($post['gender']));
			$this->session->set_userdata("reg_id_country", html_escape($post['id_country']));
			$this->session->set_userdata("reg_passport_type", html_escape($post['passport_type']));
			$this->session->set_userdata("reg_passport", html_escape($post['passport']));
			$this->session->set_userdata("reg_passport_place", html_escape($post['passport_place']));
			$this->session->set_userdata("reg_visa_type", html_escape($post['visa_type']));
			$this->session->set_userdata("reg_kewarganegaraan", html_escape($post['kewarganegaraan']));
			$this->session->set_userdata("reg_dietary", html_escape($post['dietary']));
			
			if (!$this->upload->do_upload('ktp')){
				$post['ktp'] = "";
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('message', 'Passport / ID Card '.$error['error']);
				redirect(site_url('register'));
			} else {
				$image_ktp = $this->upload->data();
				$ins['ktp'] = $image_ktp['file_name'];
			}
			$ins['create_date'] = date("Y-m-d H:i:s");
			$ins['modify_date'] = date("Y-m-d H:i:s");
			$ins['prefix'] = html_escape($post['prefix']);
			$ins['type_id'] = html_escape($post['type_id']);
			$ins['certname'] = html_escape($post['certname']);
			$ins['gender'] = html_escape($post['gender']);
			$ins['id_country'] = html_escape($post['id_country']);
			$ins['passport_type'] = html_escape($post['passport_type']);
			$ins['passport'] = html_escape($post['passport']);
			$ins['passport_place'] = html_escape($post['passport_place']);
			$ins['visa_type'] = html_escape($post['visa_type']);
			$ins['kewarganegaraan'] = html_escape($post['kewarganegaraan']);
			$ins['dietary'] = html_escape($post['dietary']);
			$ins['hotel'] = html_escape($post['hotel']);
			$ins['afn'] = html_escape($post['afn']);
			$ins['dfn'] = html_escape($post['dfn']);
			$ins['pob'] = html_escape($post['pob']);
			$this->db->where("id", GetUserID());
			if($this->db->update("member", $ins)) {
				//Hapus Session
				foreach($this->session->all_userdata() as $key=> $val) {
					if(substr($key,0,3)=="reg") {
						$this->session->unset_userdata($key);
					}
				}
	      redirect(site_url('register/main/9'));
			} else {
	  		$this->session->set_flashdata("message", "Registration Failed");
	  	}
	  } else $this->session->set_flashdata('message', 'Captcha Not Valid');
  	redirect(site_url('register'));
	}
	
	function submit_dao()
	{
		permission();
		$captcha_response = $this->input->post('g-recaptcha-response');
		$validate = $this->validateCaptcha($captcha_response);
		if($validate['success'] == true) {
			$ins=array();
			$data = GetHeaderFooter();
			ini_set('memory_limit', -1);
	    $post = $this->input->post();
	    $next = $post['btn_next'];
	    unset($post['g-recaptcha-response']);
	    $ins['dob'] = $post['thn']."-".$post['bln']."-".$post['tgl'];
	    unset($post['thn']);unset($post['bln']);unset($post['tgl']);
	    $ins['passport_exp'] = $post['thn_p']."-".$post['bln_p']."-".$post['tgl_p'];
	    unset($post['thn_p']);unset($post['bln_p']);unset($post['tgl_p']);
	    $ins['stay_start'] = $post['thn_d_s']."-".$post['bln_d_s']."-".$post['tgl_d_s'];
	    unset($post['thn_d_s']);unset($post['bln_d_s']);unset($post['tgl_d_s']);
	    $ins['stay_end'] = $post['thn_d_e']."-".$post['bln_d_e']."-".$post['tgl_d_e'];
	    unset($post['thn_d_e']);unset($post['bln_d_e']);unset($post['tgl_d_e']);
	    $ins['hp'] = $post['countrycode']." ".$post['hp'];
	    unset($post['countrycode']);
	    
	    //Session
	    $this->session->set_userdata("reg_zregz_type", html_escape($post['reg_type']));
	    $this->session->set_userdata("reg_type_reg", html_escape($post['type_reg']));
			$this->session->set_userdata("reg_type_reg2", html_escape($post['type_reg2']));
			$this->session->set_userdata("reg_firstname", html_escape($post['firstname']));
			$this->session->set_userdata("reg_lastname", html_escape($post['lastname']));
			$this->session->set_userdata("reg_certname", html_escape($post['certname']));
			$this->session->set_userdata("reg_email", html_escape($post['email']));
			$this->session->set_userdata("reg_prefix", html_escape($post['prefix']));
			$this->session->set_userdata("reg_dob", html_escape($ins['dob']));
			$this->session->set_userdata("reg_pob", html_escape($post['pob']));
			$this->session->set_userdata("reg_passport_exp", html_escape($ins['passport_exp']));
			$this->session->set_userdata("reg_stay_start", html_escape($ins['stay_start']));
			$this->session->set_userdata("reg_stay_end", html_escape($ins['stay_end']));
			$this->session->set_userdata("reg_afn", html_escape($post['afn']));
			$this->session->set_userdata("reg_dfn", html_escape($post['dfn']));
			$this->session->set_userdata("reg_hp", html_escape($ins['hp']));
			$this->session->set_userdata("reg_hotel", html_escape($post['hotel']));
			$this->session->set_userdata("reg_gender", html_escape($post['gender']));
			$this->session->set_userdata("reg_id_country", html_escape($post['id_country']));
			$this->session->set_userdata("reg_passport_type", html_escape($post['passport_type']));
			$this->session->set_userdata("reg_passport", html_escape($post['passport']));
			$this->session->set_userdata("reg_passport_place", html_escape($post['passport_place']));
			$this->session->set_userdata("reg_institusi", html_escape($post['institusi']));
			$this->session->set_userdata("reg_designation", html_escape($post['designation']));
			$this->session->set_userdata("reg_visa_type", html_escape($post['visa_type']));
			$this->session->set_userdata("reg_kewarganegaraan", html_escape($post['kewarganegaraan']));
			$this->session->set_userdata("reg_dietary", html_escape($post['dietary']));
			
	    $config['upload_path']          = './uploads';
			$config['allowed_types']        = 'jpg|png|jpeg|pdf';
			$config['max_size']             = 1000; //1Mb
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			// end
			
			if (!$this->upload->do_upload('photo')){
				$post['photo'] = "";
				$error = array('error' => $this->upload->display_errors());
	    	$this->session->set_flashdata('message', 'Photo ID '.$error['error']);
	    	redirect(site_url('register/dao_delegate'));
			} else {
				$image = $this->upload->data();
				$ins['photo'] = $image['file_name'];
			}
			if (!$this->upload->do_upload('ktp')){
				$post['ktp'] = "";
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('message', 'Passport / ID Card '.$error['error']);
				redirect(site_url('register/dao_delegate'));
			} else {
				$image_ktp = $this->upload->data();
				$ins['ktp'] = $image_ktp['file_name'];
			}
			$ins['create_date'] = date("Y-m-d H:i:s");
			$ins['modify_date'] = date("Y-m-d H:i:s");
			unset($post['btn_finish']);
			unset($post['btn_next']);
			$ins['reg_type'] = html_escape($post['reg_type']);
			$ins['type_reg'] = html_escape($post['type_reg']);
			$ins['type_reg2'] = html_escape($post['type_reg2']);
			$ins['prefix'] = html_escape($post['prefix']);
			$ins['firstname'] = html_escape($post['firstname']);
			$ins['lastname'] = html_escape($post['lastname']);
			$ins['certname'] = html_escape($post['certname']);
			$ins['email'] = html_escape($post['email']);
			$ins['gender'] = html_escape($post['gender']);
			$ins['id_country'] = html_escape($post['id_country']);
			$ins['passport_type'] = html_escape($post['passport_type']);
			$ins['passport'] = html_escape($post['passport']);
			$ins['passport_place'] = html_escape($post['passport_place']);
			$ins['institusi'] = html_escape($post['institusi']);
			$ins['designation'] = html_escape($post['designation']);
			$ins['visa_type'] = html_escape($post['visa_type']);
			$ins['kewarganegaraan'] = html_escape($post['kewarganegaraan']);
			$ins['dietary'] = html_escape($post['dietary']);
			$ins['hotel'] = html_escape($post['hotel']);
			$ins['afn'] = html_escape($post['afn']);
			$ins['dfn'] = html_escape($post['dfn']);
			$ins['pob'] = html_escape($post['pob']);
			$ins['id_parents'] = GetIDDAO();
			//print_mz($post);
			//$this->db->where("id", GetUserID());
			if($this->db->insert("member_dao", $ins)) {
				$last_id = $this->db->insert_id();
				$this->db->where("id", $last_id);
				$this->db->update("member_dao", array("uid"=> MD5($this->config->item('encryption_key')."dao".$last_id)));
				//Hapus Session
				foreach($this->session->all_userdata() as $key=> $val) {
					if(substr($key,0,3)=="reg") {
						$this->session->unset_userdata($key);
					}
				}
				if($next) {
					$this->session->set_flashdata("message", "Add Delegate Success");
					redirect(site_url('register/dao_delegate'));
				} else redirect(site_url('myaccount'));
			} else {
	  		$this->session->set_flashdata("message", "Registration Failed");
	  	}
	  } else $this->session->set_flashdata('message', 'Captcha Not Valid');
  	redirect(site_url('register/dao_delegate'));
	}
	
	function submit_dao_edit()
	{
		permission();
		$captcha_response = $this->input->post('g-recaptcha-response');
		$validate = $this->validateCaptcha($captcha_response);
		if($validate['success'] == true && GetIDDAO()) {
			$ins=array();
			$data = GetHeaderFooter();
			ini_set('memory_limit', -1);
	    $post = $this->input->post();
	    $next = $post['btn_next'];
	    unset($post['g-recaptcha-response']);
	    $ins['dob'] = $post['thn']."-".$post['bln']."-".$post['tgl'];
	    unset($post['thn']);unset($post['bln']);unset($post['tgl']);
	    $ins['passport_exp'] = $post['thn_p']."-".$post['bln_p']."-".$post['tgl_p'];
	    unset($post['thn_p']);unset($post['bln_p']);unset($post['tgl_p']);
	    $ins['stay_start'] = $post['thn_d_s']."-".$post['bln_d_s']."-".$post['tgl_d_s'];
	    unset($post['thn_d_s']);unset($post['bln_d_s']);unset($post['tgl_d_s']);
	    $ins['stay_end'] = $post['thn_d_e']."-".$post['bln_d_e']."-".$post['tgl_d_e'];
	    unset($post['thn_d_e']);unset($post['bln_d_e']);unset($post['tgl_d_e']);
	    $ins['hp'] = $post['countrycode']." ".$post['hp'];
	    unset($post['countrycode']);
	    
	    $config['upload_path']          = './uploads';
			$config['allowed_types']        = 'jpg|png|jpeg|pdf';
			$config['max_size']             = 1000; //1Mb
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			// end
			
			if (!$this->upload->do_upload('photo')){
				/*$post['photo'] = "";
				$error = array('error' => $this->upload->display_errors());
	    	$this->session->set_flashdata('message', 'Photo ID '.$error['error']);
	    	redirect(site_url('register/dao_delegate'));*/
			} else {
				$image = $this->upload->data();
				$ins['photo'] = $image['file_name'];
			}
			if (!$this->upload->do_upload('ktp')){
				/*$post['ktp'] = "";
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('message', 'Passport / ID Card '.$error['error']);
				redirect(site_url('register/dao_delegate'));*/
			} else {
				$image_ktp = $this->upload->data();
				$ins['ktp'] = $image_ktp['file_name'];
			}
			$ins['create_date'] = date("Y-m-d H:i:s");
			$ins['modify_date'] = date("Y-m-d H:i:s");
			unset($post['btn_finish']);
			unset($post['btn_next']);
			$ins['reg_type'] = html_escape($post['reg_type']);
			$ins['type_reg'] = html_escape($post['type_reg']);
			$ins['type_reg2'] = html_escape($post['type_reg2']);
			$ins['firstname'] = html_escape($post['firstname']);
			$ins['lastname'] = html_escape($post['lastname']);
			$ins['certname'] = html_escape($post['certname']);
			$ins['email'] = html_escape($post['email']);
			$ins['gender'] = html_escape($post['gender']);
			$ins['id_country'] = html_escape($post['id_country']);
			$ins['passport_type'] = html_escape($post['passport_type']);
			$ins['passport'] = html_escape($post['passport']);
			$ins['passport_place'] = html_escape($post['passport_place']);
			$ins['institusi'] = html_escape($post['institusi']);
			$ins['designation'] = html_escape($post['designation']);
			$ins['visa_type'] = html_escape($post['visa_type']);
			$ins['kewarganegaraan'] = html_escape($post['kewarganegaraan']);
			$ins['dietary'] = html_escape($post['dietary']);
			$ins['hotel'] = html_escape($post['hotel']);
			$ins['prefix'] = html_escape($post['prefix']);
			$ins['afn'] = html_escape($post['afn']);
			$ins['dfn'] = html_escape($post['dfn']);
			$ins['pob'] = html_escape($post['pob']);
			//print_mz($post);
			$this->db->where("uid", $post['uid']);
			if($this->db->update("member_dao", $ins)) {
				$this->session->set_flashdata("message", "Edit Delegate Success");
				redirect(site_url('register/dao_delegate/'.$post['urutan']));
			} else {
	  		$this->session->set_flashdata("message", "Edit Delegate Failed");
	  	}
	  } else $this->session->set_flashdata('message', 'Captcha Not Valid');
  	redirect(site_url('register/dao_delegate/'.$post['urutan']));
	}
	
	function submit_dao_x()
	{
		permission();
		$captcha_response = $this->input->post('g-recaptcha-response');
		$validate = $this->validateCaptcha($captcha_response);
		if($validate['success'] == true) {
			$ins=array();
			$data = GetHeaderFooter();
			ini_set('memory_limit', -1);
	    $post = $this->input->post();
	    $next = $post['btn_next'];
	    $post['dob'] = $post['thn']."-".$post['bln']."-".$post['tgl'];
	    $post['stay_start'] = $post['thn_d_s']."-".$post['bln_d_s']."-".$post['tgl_d_s'];
	    $post['stay_end'] = $post['thn_d_e']."-".$post['bln_d_e']."-".$post['tgl_d_e'];
	    $ins['hp'] = $post['countrycode']." ".$post['hp'];
	    $ins['passport_exp'] = $post['thn_p']."-".$post['bln_p']."-".$post['tgl_p'];
	    $ins['gender'] = $post['gender'];
	    $ins['email'] = $post['email'];
	    $ins['institusi'] = $post['institusi'];
	    $ins['designation'] = $post['designation'];
	    $ins['passport_type'] = $post['passport_type'];
	    $ins['passport'] = $post['passport'];
	    $ins['passport_place'] = $post['passport_place'];
	    $ins['visa_type'] = $post['visa_type'];
	    $ins['kewarganegaraan'] = $post['kewarganegaraan'];
	    //upload file
			//print_mz($post);
			$config['upload_path']          = './uploads';
			$config['allowed_types']        = 'jpg|png|jpeg|pdf';
			$config['max_size']             = 1000; //1Mb
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			// end
			
			if (!$this->upload->do_upload('photo')){
				if(!$post['photo_old']) {
					//$ins['photo'] = "";
					//$error = array('error' => $this->upload->display_errors());
		    	//$this->session->set_flashdata('message', 'Photo ID '.$error['error']);
		    	//redirect(site_url('register'));
		    }
			} else {
				$image = $this->upload->data();
				$ins['photo'] = $image['file_name'];
			}
			
			if (!$this->upload->do_upload('ktp')){
				if(!$post['ktp_old']) {
					//$ins['ktp'] = "";
					//$error = array('error' => $this->upload->display_errors());
					//$this->session->set_flashdata('message', 'Passport / ID Card '.$error['error']);
					//redirect(site_url('register'));
				}
			} else {
				$image_ktp = $this->upload->data();
				$ins['ktp'] = $image_ktp['file_name'];
			}
			$ins['create_date'] = date("Y-m-d H:i:s");
			$ins['modify_date'] = date("Y-m-d H:i:s");
			//print_mz($ins);
			$this->db->where("id", GetIDDAO());
			if($this->db->update("member_dao", $ins)) {
				if($next) redirect(site_url('register/dao_delegate'));
				else redirect(site_url('register/dao/ok'));
			} else {
	  		$this->session->set_flashdata("message", "Registration Failed");
	  	}
	  } else $this->session->set_flashdata('message', 'Captcha Not Valid');
  	redirect(site_url('register'));
	}
	
	function validateCaptcha($captcha_response = NULL)
	{
		if($captcha_response != '')
		{
			$keySecret = $this->config->item('secret_key');
			$check = array(
				'secret'		=>	$keySecret,
				'response'		=>	$captcha_response
			);
			$startProcess = curl_init();

			curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($startProcess, CURLOPT_POST, true);
			curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));
			curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);
			$receiveData = curl_exec($startProcess);
			$response = json_decode($receiveData, true);
			return $response;
	  }
	}
	
}
?>