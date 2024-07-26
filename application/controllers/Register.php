<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->main();
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
		$username = $this->input->post("email");
		$userpass = MD5($this->config->item('encryption_key').$this->input->post("password"));
		$query=GetAll("member", array("email"=> "where/".$username, "password"=> "where/".$userpass, "is_active"=> "where/Active"));
		if ($query->num_rows() > 0) {
			$row = $query->row(); 
			$this->session->set_userdata('msp_name',$row->firstname." ".$row->lastname);
			$this->session->set_userdata('msp_id',$row->id);
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
			$post = $this->input->post();
			if($post['password'] != $post['re_password']) {
				$this->session->set_flashdata('message', 'Password & Re-Type Password failed');
				redirect(site_url('register/account/err'));
			}
			unset($post['re_password']);
			unset($post['g-recaptcha-response']);
			$post['password'] = MD5($this->config->item('encryption_key').$this->input->post("password"));
			
			$config['upload_path']          = './uploads';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 500; //500Kb
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('photo')){
				$post['photo'] = "";
				$error = array('error' => $this->upload->display_errors());
	    	$this->session->set_flashdata('message', 'Photo ID '.$error['error']);
	    	redirect(site_url('register/account/err'));
			} else {
				$image = $this->upload->data();
				$post['photo'] = $image['file_name'];
			}
			$this->db->insert("member", $post);
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
			$post = $this->input->post();
			unset($post['g-recaptcha-response']);
			$config['upload_path']          = './uploads';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 500; //500Kb
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			
			if($this->upload->do_upload('photo')) {
				$image = $this->upload->data();
				$post['photo'] = $image['file_name'];
			}
			$this->db->where("id", GetUserID());
			$this->db->update("member", $post);
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
		if($param != 9 && $data['mem']['ktp'] > 0) redirect(site_url('register/main/9'));
		$this->load->view('template', $data);
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
			$data = GetHeaderFooter();
			ini_set('memory_limit', -1);
	    $post = $this->input->post();
	    unset($post['g-recaptcha-response']);
	    $post['dob'] = $post['thn']."-".$post['bln']."-".$post['tgl'];
	    unset($post['thn']);unset($post['bln']);unset($post['tgl']);
	    $post['passport_exp'] = $post['thn_p']."-".$post['bln_p']."-".$post['tgl_p'];
	    unset($post['thn_p']);unset($post['bln_p']);unset($post['tgl_p']);
	    $post['hp'] = $post['countrycode']." ".$post['hp'];
	    unset($post['countrycode']);
	    //$pass = createPassword();
	    //$post['password'] = md5($this->config->item('encryption_key').$pass);
			//upload file
			$config['upload_path']          = './uploads';
			$config['allowed_types']        = 'jpg|png|jpeg|pdf';
			$config['max_size']             = 500; //500Kb
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			// end
			
			/*if (!$this->upload->do_upload('photo')){
				//$post['photo'] = "";
				//$error = array('error' => $this->upload->display_errors());
	    	//$this->session->set_flashdata('message', 'Photo ID '.$error['error']);
	    	//redirect(site_url('register'));
			} else {
				$image = $this->upload->data();
				$post['photo'] = $image['file_name'];
			}*/
			if (!$this->upload->do_upload('ktp')){
				$post['ktp'] = "";
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('message', 'Passport / ID Card '.$error['error']);
				redirect(site_url('register'));
			} else {
				$image_ktp = $this->upload->data();
				$post['ktp'] = $image_ktp['file_name'];
			}
			if (!$this->upload->do_upload('surat_tugas')){
				$post['surat_tugas'] = "";
			} else {
				$image_surat_tugas = $this->upload->data();
				$post['surat_tugas'] = $image_surat_tugas['file_name'];
			}
			$post['create_date'] = date("Y-m-d H:i:s");
			$post['modify_date'] = date("Y-m-d H:i:s");
			//print_mz($post);
			$this->db->where("id", GetUserID());
			if($this->db->update("member", $post)) {
	      redirect(site_url('register/main/9'));
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