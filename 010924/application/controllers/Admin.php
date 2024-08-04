<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
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
    	redirect(site_url('home'));
	    permission();
	    $data = GetHeaderFooter();
	    $data['main'] = 'admin';
	    $data['trash'] = $trash;
	    $this->load->view('template', $data);
    }
    
    function admin_list($trash=0)
	  {
	  	ini_set('memory_limit', -1);
	  	$opt_grup=GetOptGrup();
	  	$where="1=1";
	  	$kolom = array("name");
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
			
			$query_no_limit = "SELECT * FROM admin WHERE is_delete=".$trash." AND ".$where." ORDER BY ".$ord;
			$query = "SELECT * FROM admin WHERE is_delete=".$trash." AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
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
			  	$check = $r['is_active'] ? "<i class='akt icon icon-times-circle' rel='".$r['id']."' zz='1'></i>" : "<i class='akt icon icon-check-circle' rel='".$r['id']."' zz='0'></i>";
			  	$check .= "&nbsp;&nbsp;<a href='".site_url('admin/admin_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			  }
			  $data[] = array($chk, $r['name'], $opt_grup[$r['id_admin_grup']], $aktif, $check);
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
	  
	  function admin_detail($id=0)
		{
			permission();
	    $data = GetHeaderFooter();
	    $data['main'] = 'admin_detail';
	    $data['id'] = $id;
	    if($id) {
	    	$q = GetAll("admin", array("id"=> "where/".$id))->result_array()[0];
	    	$data['val'] = $q;
	    } else $data['val'] = array();
	    $this->load->view('template', $data);
		}
	  
	  function admin_aktif()
		{
			$idz = $this->input->post("idz");
			if($idz) {
				if($this->input->post("akt")==2) {
					$this->db->where("id", $idz);
					$this->db->update("admin", array("is_delete"=> 1));
				} else if($this->input->post("akt")==3) {
					$this->db->where("id", $idz);
					$this->db->update("admin", array("is_delete"=> 0));
				} else {
					$akt = $this->input->post("akt")==1 ? 0 : 1;
					$this->db->where("id", $idz);
					$this->db->update("admin", array("is_active"=> $akt));
				}
			}
		}
	  
	  function admin_add()
	  {
	    $admin_id=permission();
    	if($admin_id==1) {
		    $post = $param = $this->input->post();
				unset($post['id']);
				$post['modify_user_id'] = $admin_id;
				$post['modify_date'] = date("Y-m-d H:i:s");
				
				//File
				/*$key="file";
				$file_up = $_FILES[$key]['name'];
				$myfile_up	= $_FILES[$key]['tmp_name'];
				$ukuranfile_up = $_FILES[$key]['size'];
				$up_file = "../idea/uploads/".$file_up;
				$up_file = "../uploads/".$file_up;
				if($_FILES[$key]['name']) {
					//if($ukuranfile_up < (1024 * 1024 * 15)) {
					//die($myfile_up."S".$up_file);
						unlink("../uploads/".$file_up);
						if(copy($myfile_up, $up_file)) {
							$post['keterangan'] = $file_up;
						}
					//}
				}*/
				
		    if(!$param['id']) {
		    	if($this->db->insert("admin", $post)) $this->session->set_flashdata("message", "success-Add Success");
		    	else $this->session->set_flashdata("message", "danger-Add Failed");
		    } else {
		    	$this->db->where("id", $param['id']);
		    	if($this->db->update("admin", $post)) $this->session->set_flashdata("message", "success-Edit Success");
		    	else $this->session->set_flashdata("message", "danger-Edit Failed");
		    }
		  }
	    redirect(site_url('admin/main'));
	  }
	  
	  function admin_hapus()
	  {
	  	$post = $this->input->post("chk");
	  	foreach($post as $key=> $val) {
	  		$this->db->where("id", $key);
				if($this->input->post("del_res")==1) $this->db->update("admin", array("is_delete"=> 0));
				else $this->db->update("admin", array("is_delete"=> 1));
	  	}
	  	
	  	if($this->input->post("del_res")==1) redirect(site_url('admin/main/1'));
	  	else redirect(site_url('admin/main'));
	  }
	  
	  function import($survei_id=NULL)
    {
	    $idz=permission();
	    $data = GetHeaderFooter();
	    $data['main'] = 'admin_import';
	    $xls = "";$i=0;
	    $key="file";
	    if(isset($_FILES[$key]['name'])) {
	    	$file_up = $_FILES[$key]['name'];
				$myfile_up	= $_FILES[$key]['tmp_name'];
				$ukuranfile_up = $_FILES[$key]['size'];
				$up_file = "./uploads/".date("YmdHis")."_".$file_up;
				if($_FILES[$key]['name']) {
					if(copy($myfile_up, $up_file)) {
						$this->load->library('excel');
						$objPHPExcel = PHPExcel_IOFactory::load($up_file);
						$log=array();
						$objPHPExcel->setActiveSheetIndex(0);
						$exl = $objPHPExcel->getActiveSheet();
						$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();
						$kar=$row=$head=array();
						$urut=0;$temp_area="";
						for($b=2;$b<=$highestRow;$b++){
							$upd['id_admin_grup'] = $exl->getCell('D'.$b)->getValue();
							if($upd['id_admin_grup']=="Administrator") $upd['id_admin_grup']=1;
							else $upd['id_admin_grup']=2;
							$upd['username'] = $exl->getCell('A'.$b)->getValue();
							$upd['userpass'] = $exl->getCell('B'.$b)->getValue();
							$upd['name'] = $exl->getCell('C'.$b)->getValue();
							$upd['is_active'] = $exl->getCell('E'.$b)->getValue();
							if($upd['is_active']=="Aktif") $upd['is_active'] = "Active";
							else $upd['is_active'] = "InActive";
							$cek = GetValue("id","admin",array("username"=> "where/".$upd['username']));
							if($cek) {
								$upd['modify_user_id'] = $idz;
								$upd['modify_date'] = date("Y-m-d H:i:s");
								$this->db->where("id", $cek);
								$this->db->update("admin", $upd);
							} else {
								$upd['create_user_id'] = $idz;
								$upd['create_date'] = date("Y-m-d H:i:s");
								$this->db->insert("admin", $upd);
							}
							$i++;
							$xls .= $upd['name']."<br>";
						}
						$xls = "<b>".$i." User Berhasil ditambahkan/diubah</b><br>".$xls;
					}
				}
	    }
	    $data['rdd'] = $xls;
	    $this->load->view('template', $data);
    }
}

?>