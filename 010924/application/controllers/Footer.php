<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Footer extends CI_Controller
{
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
	    permission();
	    $data = GetHeaderFooter();
	    $data['main'] = 'footer_add';
	    $data['val'] = GetAll("footer", array("id"=> "where/1"))->result_array()[0];
	    $this->load->view('template', $data);
    }
    
    function add()
	  {
	    $admin_id=permission();
	    $post = $param = $this->input->post();
unset($post['id']);
    	$this->db->where("id", $param['id']);
    	if($this->db->update("footer", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
	    redirect(site_url('footer/main'));
	  }
}

?>