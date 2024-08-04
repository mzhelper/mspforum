<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Media extends CI_Controller
{
		function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->main();
    }

    function main($trash=0)
    {
	    permission();
	    $data = GetHeaderFooter();
	    $data['main'] = 'media';
	    $data['trash'] = $trash;
	    $this->load->view('template', $data);
    }
    
    function media_list($trash=0)
	  {
	  	ini_set('memory_limit', -1);
	  	$where=1;
	  	$kolom = array("","title","","create_date");
	  	if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
	  	else $ord = " create_date desc ";
			
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
			
			$query_no_limit = "SELECT * FROM idn_media WHERE is_delete=".$trash." AND ".$where." ORDER BY ".$ord;
			$query = "SELECT * FROM idn_media WHERE is_delete=".$trash." AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
	  	$list = $this->db->query($query);
	  	$data = array();
		  $no = $_POST['start'];
		  foreach ($list->result_array() as $r) {
		  	$no++;
		  	$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
			  $aktif = $r['is_active'] ? "Aktif" : "Belum";
			  if($trash) {
			  	$check = "<a href=''><i class='akt icon icon-restore' rel='".$r['id']."' zz='3'></i></a>";
			  } else {
			  	$check = "&nbsp;&nbsp;<a target='_blank' href='".$r['link']."'><i class='icon icon-eye'></i></a>&nbsp;&nbsp;<a href='".site_url('media/media_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>&nbsp;&nbsp;<a href=''><i class='akt icon icon-copy' rel='".$r['id']."' zz='8' alt='".$r['link']."'></i></a>";
			  }
			  $data[] = array($chk, $r['title'], $r['link'], $r['create_date'], $check);
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
	  
	  function media_detail($id=0)
		{
			permission();
	    $data = GetHeaderFooter();
	    $data['main'] = 'media_detail';
	    $data['id'] = $id;
	    if($id) {
	    	$q = GetAll("media", array("id"=> "where/".$id))->result_array()[0];
	    	$data['val'] = $q;
	    } else $data['val'] = array();
	    $this->load->view('template', $data);
		}
	  
	  function media_aktif()
		{
			$idz = $this->input->post("idz");
			if($idz) {
				if($this->input->post("akt")==2) {
					$this->db->where("id", $idz);
					$this->db->update("media", array("is_delete"=> 1));
				} else if($this->input->post("akt")==3) {
					$this->db->where("id", $idz);
					$this->db->update("media", array("is_delete"=> 0));
				} else {
					$akt = $this->input->post("akt")==1 ? 0 : 1;
					$this->db->where("id", $idz);
					$this->db->update("media", array("is_active"=> $akt));
				}
			}
		}
	  
	  function media_add()
	  {
	    $media_id=permission();
	    if($admin_id==1) {
				$post = $this->input->post();
				$post['modify_user_id'] = $media_id;
				$post['modify_date'] = date("Y-m-d H:i:s");
				
				//File
				$key="file";
				$file_up = $_FILES[$key]['name'];
				$myfile_up	= $_FILES[$key]['tmp_name'];
				$ukuranfile_up = $_FILES[$key]['size'];
				$up_file = "../uploads/".$file_up;
				if($_FILES[$key]['name']) {
					//if($ukuranfile_up < (1024 * 1024 * 15)) {
					//die($myfile_up."S".$up_file);
						//unlink("../uploads/".$file_up);
						if(copy($myfile_up, $up_file)) {
							$post['file'] = $post['file_old'] = $file_up;
						}
					//}
				}
				$post['link'] = str_replace("admin/","",base_url()."uploads/".$post['file_old']);
				unset($post['file_old']);
		    if(!$post['id']) {
		    	if($this->db->insert("media", $post)) $this->session->set_flashdata("message", "success-Add Success");
		    	else $this->session->set_flashdata("message", "danger-Add Failed");
		    } else {
		    	$this->db->where("id", $post['id']);
		    	if($this->db->update("media", $post)) $this->session->set_flashdata("message", "success-Edit Success");
		    	else $this->session->set_flashdata("message", "danger-Edit Failed");
		    }
		  }
	    redirect(site_url('media/main'));
	  }
	  
	  function media_hapus()
	  {
	  	$post = $this->input->post("chk");
	  	foreach($post as $key=> $val) {
	  		$this->db->where("id", $key);
				if($this->input->post("del_res")==1) $this->db->update("media", array("is_delete"=> 0));
				else $this->db->update("media", array("is_delete"=> 1));
	  	}
	  	
	  	if($this->input->post("del_res")==1) redirect(site_url('media/main/1'));
	  	else redirect(site_url('media/main'));
	  }
	  
	  function media_hapus_permanen()
	  {
	  	$post = $this->input->post("chk");
	  	foreach($post as $key=> $val) {
	  		$q = GetAll("media", array("id"=> "where/".$key))->result_array()[0];
	  		if($this->db->insert("media_delete", $q)) {
	  			$this->db->where("id", $key);
	  			$this->db->delete("media");
	  		}
	  	}
	  	
	  	redirect(site_url('media/main/1'));
	  }
}

?>