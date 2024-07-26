<?php
class Myaccount extends CI_Controller{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		permission();
		$data = GetHeaderFooter();
		$data['mem'] = GetDataMember();
		$data['main_content'] = 'myaccount';
		$data['opt_ruangan'] = GetOptAll("calender_lokasi");
		$q = GetAll("calender_cat", array("id_parents"=> "order/asc"));
		foreach($q->result_array() as $r) {
			$warna[$r['id']] = $r['title_eng'];
			$tema[$r['id']] = $r['title'];
		}
		$data['warna'] = $warna;
		$data['opt_tema'] = $tema;
		$this->load->view('template',$data);
	}
	
	function invitation_letter()
	{
		$mem = GetAll("member", array("id"=> "where/".GetUserID()))->result_array()[0];
		$name = $mem['prefix']." ".$mem['firstname']." ".$mem['lastname'];
    ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)
    $html = $this->load->view('pdf/invitation_letter', $mem, true); // render the view into HTML
    $this->load->library('pdf');
    $pdf = $this->pdf->load();
    //$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure ;)
    $pdf->WriteHTML($html); // write the HTML into the PDF
    $pdf->Output('Inviation Letter - '.$name, 'D'); // save to file because we can
	}
	
	function kwitansi($no_inv=NULL)
	{
		$memz = GetAll("member", array("reason_free"=> "where/".$no_inv));
	  if($memz->num_rows()==0) $memz = GetAll("member_temp", array("reg_no"=> "where/".$no_inv));
		$mem = $memz->result_array()[0];
		$name = $mem['firstname'];
    ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)
    $html = $this->load->view('pdf/kwitansi', $mem, true);
    //die($html);
    $this->load->library('pdf');
    $pdf = $this->pdf->load();
    //$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure ;)
    $pdf->WriteHTML($html); // write the HTML into the PDF
    $pdf->Output('Kwitansi - '.$name.'.pdf', 'D'); // save to file because we can
	}
	
	function nametag($id_mem=0) {
		$data=array();
		if(!$id_mem) $id_mem=GetUserID();
		$q = GetAll("member", array("id"=> "where/".$id_mem))->result_array();
		$data['mem'] = $q[0];
		$data['nama'] = $data['mem']['firstname'];//." ".$data['mem']['lastname'];
		if($data['mem']['type']==0) $data['dpc_dpw'] = "DPP PATELKI";
		else $data['dpc_dpw'] = $data['mem']['dpc_dpw'];
		$data['congress'] = GetValue("title","simposium",array("id"=> "where/".$data['mem']['type']));
		//Data Kedua
		$qq = GetAll("member_temp", array("id_parents"=> "where/".$id_mem));
		foreach($qq->result_array() as $rr) {
			if($rr['payment_method']=="Bank Transfer" || $rr['payment_method']=="Free" || $rr['payment_method']=="settlement") {
				$data['congress'] .= "<br>".GetValue("title","simposium",array("id"=> "where/".$rr['type']));
			}
		}
		/*$data['kegiatan'] = "<ul style='margin-top:0px;padding-left:15px;'>";
		if($data['mem']['type']==44 || $data['mem']['type']==45 || $data['mem']['type']==46) {
			$exp = explode(", ",$data['congress']);
			foreach($exp as $e) {
				$data['kegiatan'] .= "<li style='list-style:circle;'>".$e."</li>";
			}
		} else {
			$exp = explode(" + ",$data['congress']);
			foreach($exp as $e) {
				$data['kegiatan'] .= "<li style='list-style:circle;'>".$e."</li>";
			}
		}
		$data['kegiatan'] .= "</ul>";*/
		$data['kegiatan'] = "";
		
		
		//set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = './qr/temp/';
    //html PNG location prefix
    $PNG_WEB_DIR = './qr/temp/';

    include "./qr/qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    $filename = $PNG_TEMP_DIR.'test.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 6;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);

		//$_REQUEST['data']="Muhammad Irwansyah / Komunigrafik / mazh.irwansyah@gmail.com";
		$_REQUEST['data']=$data['nama']." / ".$data['mem']['reg_no']." / ".$data['mem']['email'];
    if (isset($_REQUEST['data'])) { 
    
        //it's very important!
        if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');
            
        // user data
        $filename = $PNG_TEMP_DIR.$data['mem']['id'].'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 0);    
    }
    
    //display generated file
    //echo "<img src='".$PNG_WEB_DIR.basename($filename)."' style='position:absolute;left:380px;top:480px;'/>";
		
		ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)
    $html = $this->load->view('pdf/nametag_member',$data, true);
    //die($html);
    $this->load->library('pdf');
    $pdf = $this->pdf->load();
    $pdf->WriteHTML($html); // write the HTML into the PDF
    $pdf->Output('Nametag - '.$data['nama'].'.pdf', 'D'); // save to file because we can
	}
	
	function nametag_khusus() {
		$data=array();
		$id_mem=GetUserID();
		$q = GetAll("nametag");
		ini_set('memory_limit','512M'); // boost the memory limit if it's low ;)
    $this->load->library('pdf');
    $pdf = $this->pdf->load();
    include "./qr/qrlib.php";
	  foreach($q->result_array() as $r) {
	  	$PNG_TEMP_DIR = './qr/temp/';
	    $PNG_WEB_DIR = './qr/temp/';
	    if (!file_exists($PNG_TEMP_DIR)) mkdir($PNG_TEMP_DIR);
	    $filename = $PNG_TEMP_DIR.'test.png';
	    $errorCorrectionLevel = 'L';
	    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
	        $errorCorrectionLevel = $_REQUEST['level'];    
	
	    $matrixPointSize = 6;
	    if (isset($_REQUEST['size']))
	        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
	    $kode = 2000+$r['id'];	
			$_REQUEST['data']=$r['nama']." / ".$kode."-RAK-XV";
	    if (isset($_REQUEST['data'])) { 	    
	        if (trim($_REQUEST['data']) == '')
	            die('data cannot be empty! <a href="?">back</a>');
	        $filename = $PNG_TEMP_DIR.$kode.'.png';
	        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 0);    
	    }
	  	$data = array("nama"=> $r['nama'], "jabatan"=> $r['jabatan'], "info"=> $r['info'], "kode"=> $kode);
			$html = $this->load->view('pdf/nametag_khusus',$data, true);
			//die($html);
	    $pdf->WriteHTML($html);
	  }
    $pdf->Output('Nametag Khusus.pdf', 'D'); // save to file because we can
	}
	
	function vanilla($type=1) {
		$typez=array("1"=> "VIP KONSUMEN", "2"=> "REGULER", "3"=> "FRESH", "4"=> "FRESH OFFICE", "5"=> "INFLUENCER", "6"=> "REKANAN", "7"=> "MEDIA", "9"=> "INFLUENCER BARU");
		include "./qr/qrlib.php";
		$conn=mysqli_connect("localhost","root","","event_vanilla");
		$data=array();
		$no=$temp_kode=0;
		$q = mysqli_query($conn, "Select * from e_peserta where type='".$type."' order by id");
		while($r = mysqli_fetch_array($q)) {
			if($temp_kode != $r['type']) {$temp_kode=$r['type'];$no=0;}
			$no++;
			$kode = ($r['type']*1000) + $no;
			mysqli_query($conn, "update e_peserta set kode='".$kode."' where id='".$r['id']."'");
			
			$PNG_TEMP_DIR = './qr/temp/'.$r['type'];
			$PNG_WEB_DIR = './qr/temp/'.$r['type'];
			if (!file_exists($PNG_TEMP_DIR))
			    mkdir($PNG_TEMP_DIR);
			$filename = $PNG_TEMP_DIR.'test.png';
			$errorCorrectionLevel = 'H';
			if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
			    $errorCorrectionLevel = $_REQUEST['level'];    
			$matrixPointSize = 10;
			if (isset($_REQUEST['size']))
			    $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
	
			$_REQUEST['data']=ucwords($r['nama'])." / ".$kode;
	    if (isset($_REQUEST['data'])) {
	    
	        //it's very important!
	        if (trim($_REQUEST['data']) == '')
	            die('data cannot be empty! <a href="?">back</a>');
	            
	        // user data
	        $filename = $PNG_TEMP_DIR.'/'.$r['nama'].'.png';
	        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 0);    
	    }
	    
	    ini_set('memory_limit','1032M'); // boost the memory limit if it's low ;)
	    $html = $this->load->view('pdf/vanilla',$r, true);
	    //die($html);
	    $this->load->library('pdf');
	    $pdf = $this->pdf->load();
	    $pdf->WriteHTML($html); // write the HTML into the PDF
	    $pdf->Output('./uploads/vanilla/'.$typez[$r['type']].'/'.$typez[$r['type']].' - '.ucwords($r['nama']).'.pdf', 'D'); // save to file because we can
	    //die();
	  }
	}
	
	function serti($no_inv=NULL) {
		if($no_inv) {
			$data=array();
			$q = GetAll("member", array("reason_free"=> "where/".$no_inv));
		  if($q->num_rows()==0) $q = GetAll("member_temp", array("reg_no"=> "where/".$no_inv));
			$data['mem'] = $q->result_array()[0];
			$data['jenis'] = "PESERTA";
			$data['nama'] = $data['mem']['firstname'];//." ".$data['mem']['lastname'];
			if($data['mem']['type']==0) $data['dpc_dpw'] = "DPP PATELKI";
			else $data['dpc_dpw'] = $data['mem']['dpc_dpw'];
			$type = $data['mem']['type'];
			$nomor=array();
			if(!$type) $type=16;
			if($type==1 || $type==8) {
				$list_serti = array(1);
				$nomor[]="02";
			} else if($type==2 || $type==6) {
				$list_serti = array(2);
				$nomor[]="01";
			} else if($type==3 || $type==7) {
				$list_serti = array(3);
				$nomor[]="01";
			} else if($type==4 || $type==9 || $type==10) {
				$list_serti = array(1,2);
				$nomor[]="02";
				$nomor[]="01";
			} else if($type==5 || $type==11 || $type==12) {
				$list_serti = array(1,3);
				$nomor[]="02";
				$nomor[]="01";
			} else if($type==13 || $type==14) {
				$list_serti = array(1,4);
				$nomor[]="02";
				$nomor[]="02";
			}

			$this->load->library('pdf');
	    $pdf = $this->pdf->load();
	    foreach($list_serti as $key=> $ls) {
		    $nol="00000";
		    $data['serti'] = $ls;
		    $urut = substr($nol,0,strlen($data['mem']['id'])*-1);
				$data['nomor'] = $nomor[$key].".DPP.".$data['mem']['nap'].".".$urut.$data['mem']['id'];
				//print_mz($data);
				ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)
		    $html = $this->load->view('sertifikat',$data, true);
		    //die($html);
		    $pdf->AddPage('L');
		    $pdf->WriteHTML($html); // write the HTML into the PDF
		  }
	    $pdf->Output('Sertifikat - '.$data['nama'].'.pdf', 'D');
	  }
	}
}