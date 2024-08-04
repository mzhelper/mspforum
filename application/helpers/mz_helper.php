<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('print_mz')){	
	function print_mz($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		die();
	}
}

if (!function_exists('lastq')){	
	function lastq()
	{
		$CI =& get_instance();
		die($CI->db->last_query());
	}
}

if (!function_exists('GetUserID')){	
	function GetUserID()
	{
		$CI =& get_instance();
		return $CI->session->userdata("msp_id");
	}
}

if (!function_exists('GetIDDAO')){	
	function GetIDDAO()
	{
		$CI =& get_instance();
		return substr($CI->session->userdata("msp_id"),3);
	}
}

if (!function_exists('CekDAO')){	
	function CekDAO()
	{
		$CI =& get_instance();
		return $CI->session->userdata("msp_dao");
	}
}

if (!function_exists('GetDataMember')){	
	function GetDataMember()
	{
		if(CekDAO()) $q = GetAll("member_dao",array("id"=> "where/".GetIDDAO()));
		else $q = GetAll("member",array("id"=> "where/".GetUserID()));
		$r = $q->result_array();
		return $r[0];
	}
}

if (!function_exists('isMobile')){
	function isMobile(){
		return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
}

function JudulTitik($val,$len=15){
	if(strlen($val) > $len) {
		//$judul = substr($val,0,$len)."...";
	} else $judul = $val;
	$judul = word_limiter($val,$len);
	return $judul;
}

if (!function_exists('createPassword')){	
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

function cekHP() {
	$uri_string = site_url('home/cekHP/');
	echo "<script type='text/javascript' language='JavaScript'>
	window.location=\"$uri_string\"+screen.width;
	</script>";
}
	
if(!function_exists('GetDaystogo')){
	function GetDaystogo($tgl)
	{
		$countdown = (strtotime($tgl) - strtotime(date("Y-m-d"))) / 86400;
		return $countdown;
	}
}
	
function cekAccessMenu($ref_menu)
{
	$CI =& get_instance();
	$CI->db->where("filez",$ref_menu);
	$query = $CI->db->get("user_menu_input");
	return $query;
}

function cekLogin($username,$userpass)
{
	$CI =& get_instance();
	$CI->db->where("username",$username);
	$CI->db->where("userpass",$userpass);
	$query=$CI->db->get("admin");
	return $query;
}
	
if (!function_exists('permission')){
	function permission()
	{
		$CI =& get_instance();
		if(!$CI->session->userdata("msp_id")){
			redirect(site_url("register/login"));
		}
		
		return $CI->session->userdata("msp_id");
	}
}

if (!function_exists('getLang')){
	function getLang()
	{
		$CI =& get_instance();
		if($CI->uri->segment(1)=="en") $CI->session->set_userdata('getLang','_eng');
		else $CI->session->set_userdata('getLang','');
		return $CI->session->userdata("getLang");
	}
}

if (!function_exists('lang_url')){
	function lang_url($uri_string){
		$CI =& get_instance();
		if(getLang()) return site_url('en/'.$uri_string);
		else return site_url('id/'.$uri_string);
	}
}

if (!function_exists('current_lang_url')){
	function current_lang_url($language){
		if($language=="id" || $language=="en") {
			$CI =& get_instance();
			$uri_string = uri_string();
			if (substr($uri_string, 0, 3) == 'en/' || substr($uri_string, 0, 3) == 'id/') $uri_string = substr($uri_string, 3); 
			return site_url($language.'/'.$uri_string);
		}
	}
}

if (!function_exists('GetHeaderFooter')){	
	function GetHeaderFooter($flag_sidebar=NULL)
	{
		$CI =& get_instance();
		$data['header'] = 'header';
		$data['footer'] = 'footer';

		return $data;
	}
}

if (!function_exists('Breadcrumb')){
	function Breadcrumb()
	{
		$CI =& get_instance();
		$breadcrumb = "";//Home
		$flag=1;
		$id_menu = $id_menu_temp = GetValue("id","user_menu", array("filez"=> "where/".$CI->uri->segment(1)));
		if($id_menu)
		{
			while($flag)
			{
				$CI->db->where("id", $id_menu);
				$q = $CI->db->get("user_menu");
				foreach($q->result_array() as $r)
				{
					if($id_menu_temp == $id_menu) $breadcrumb = "<li class='bread_".strtolower($r['title'])."'>".$r['title']."</li>".$breadcrumb;
					else $breadcrumb = "<li class='bread_".strtolower($r['title'])."'><a href='".site_url($r['filez'])."'><b>".$r['title']."</b></a></li>".$breadcrumb;
					$id_menu=$r['id_parents'];
					if($r['id_parents'] == 0) $flag=0;
				}
			}
		}
		
		if($CI->uri->segment(1) == "home" || !$CI->uri->segment(1)) return "<li class='first bread_home'><a>Dashboard</a></li><li class='bread_nas'><a>Nasional</a></li><li>&nbsp;</li>";
		else return "<li class='first bread_home'><a>Dashboard</a></li>".$breadcrumb;
	}
}

if (!function_exists('GetValue')){
	function GetValue($field,$table,$filter=array(),$filter_where_in=array())
	{
		$CI =& get_instance();
		$CI->db->select($field);
		foreach($filter as $key=> $value)
		{
			$exp = explode("/",$value);
			if(isset($exp[1]))
			{
				if($exp[0] == "where") $CI->db->where($key, $exp[1]);
				else if($exp[0] == "like") $CI->db->like($key, $exp[1]);
				else if($exp[0] == "like_after") $CI->db->like($key, $exp[1], 'after');
				else if($exp[0] == "like_before") $CI->db->like($key, $exp[1], 'before');
				else if($exp[0] == "not_like") $CI->db->not_like($key, $exp[1]);
				else if($exp[0] == "not_like_after") $CI->db->not_like($key, $exp[1], 'after');
				else if($exp[0] == "not_like_before") $CI->db->not_like($key, $exp[1], 'before');
				else if($exp[0] == "wherebetween"){
					$xx=explode(',',$exp[1]);
				 $CI->db->where($key.' >=',$xx[0]);
				 $CI->db->where($key.' <=',$xx[1]);
				}
				else if($exp[0] == "order")
				{
					$key = str_replace("=","",$key);
					$CI->db->order_by($key, $exp[1]);
				}
				else if($key == "limit") $CI->db->limit($exp[1], $exp[0]);
			}
			
			if($exp[0] == "group") $CI->db->group_by($key);
		}
		
		foreach($filter_where_in as $key=> $value)
		{
			if(preg_match("/!=/", $key)) $CI->db->where_not_in(str_replace("!=","",$key), $value);
			else $CI->db->where_in($key, $value);
		}
		
		$q = $CI->db->get($table);
		foreach($q->result_array() as $r)
		{
			return $r[$field];
		}
		return 0;
	}
}

if (!function_exists('GetAll')){
	function GetAll($tbl,$filter=array(),$filter_where_in=array())
	{
		$CI =& get_instance();
		foreach($filter as $key=> $value)
		{
			// Multiple Like
			if(is_array($value))
			{
				$key = str_replace(" =","",$key);
				$like="";
				$v=0;
				foreach($value as $r=> $s)
				{
					$v++;
					$exp = explode("/",$s);
					if(isset($exp[1]))
					{
						if($exp[0] == "like")
						{
							if($key == "tanggal" || $key == "tahun")
							{
								$key = "tanggal";
								if(strlen($exp[1]) == 4)
								{
									if($v == 1) $like .= $key." LIKE '%".$exp[1]."-%' ";
									else $like .= " OR ".$key." LIKE '%".$exp[1]."-%' ";
								}
								else 
								{
									if($v == 1) $like .= $key." LIKE '%-".$exp[1]."-%' ";
									else $like .= " OR ".$key." LIKE '%-".$exp[1]."-%' ";
								}
							}
							else
							{
								if($v == 1) $like .= $key." LIKE '%".$exp[1]."%' ";
								else $like .= " OR ".$key." LIKE '%".$exp[1]."%' ";
							}
						}
					}
				}
				if($like) $CI->db->where("id > 0 AND ($like)");
				$exp[0]=$exp[1]="";
			}
			else $exp = explode("/",$value);
			
			if(isset($exp[1]))
			{
				if($exp[0] == "where") $CI->db->where($key, $exp[1]);
				else if($exp[0] == "like") $CI->db->like($key, $exp[1]);
				else if($exp[0] == "or_like") $CI->db->or_like($key, $exp[1]);
				else if($exp[0] == "like_after") $CI->db->like($key, $exp[1], 'after');
				else if($exp[0] == "like_before") $CI->db->like($key, $exp[1], 'before');
				else if($exp[0] == "not_like") $CI->db->not_like($key, $exp[1]);
				else if($exp[0] == "not_like_after") $CI->db->not_like($key, $exp[1], 'after');
				else if($exp[0] == "not_like_before") $CI->db->not_like($key, $exp[1], 'before');
				else if($exp[0] == "wherebetween"){
					$xx=explode(',',$exp[1]);
				 $CI->db->where($key.' >=',$xx[0]);
				 $CI->db->where($key.' <=',$xx[1]);
				}
				else if($exp[0] == "order")
				{
					$key = str_replace("=","",$key);
					$CI->db->order_by($key, $exp[1]);
				}
				else if($key == "limit") $CI->db->limit($exp[1], $exp[0]);
			}
			else if($exp[0] == "where") $CI->db->where($key);
			
			if($exp[0] == "group") $CI->db->group_by($key);
		}
		
		foreach($filter_where_in as $key=> $value)
		{
			if(preg_match("/!=/", $key)) $CI->db->where_not_in(str_replace("!=","",$key), $value);
			else $CI->db->where_in($key, $value);
		}
		
		$q = $CI->db->get($tbl);
		//die($CI->db->last_query());
		
		return $q;
	}
}

if (!function_exists('GetAllSelect')){
	function GetAllSelect($tbl,$select,$filter=array(),$filter_where_in=array())
	{
		$CI =& get_instance();
		$CI->db->select($select);
		foreach($filter as $key=> $value)
		{
			// Multiple Like
			if(is_array($value))
			{
				$key = str_replace(" =","",$key);
				$like="";
				$v=0;
				foreach($value as $r=> $s)
				{
					$v++;
					$exp = explode("/",$s);
					if(isset($exp[1]))
					{
						if($exp[0] == "like")
						{
							if($key == "tanggal" || $key == "tahun")
							{
								$key = "tanggal";
								if(strlen($exp[1]) == 4)
								{
									if($v == 1) $like .= $key." LIKE '%".$exp[1]."-%' ";
									else $like .= " OR ".$key." LIKE '%".$exp[1]."-%' ";
								}
								else 
								{
									if($v == 1) $like .= $key." LIKE '%-".$exp[1]."-%' ";
									else $like .= " OR ".$key." LIKE '%-".$exp[1]."-%' ";
								}
							}
							else
							{
								if($v == 1) $like .= $key." LIKE '%".$exp[1]."%' ";
								else $like .= " OR ".$key." LIKE '%".$exp[1]."%' ";
							}
						}
					}
				}
				if($like) $CI->db->where("id > 0 AND ($like)");
				$exp[0]=$exp[1]="";
			}
			else $exp = explode("/",$value);
			
			if(isset($exp[1]))
			{
				if($exp[0] == "where") $CI->db->where($key, $exp[1]);
				else if($exp[0] == "like") $CI->db->like($key, $exp[1]);
				else if($exp[0] == "like_after") $CI->db->like($key, $exp[1], 'after');
				else if($exp[0] == "like_before") $CI->db->like($key, $exp[1], 'before');
				else if($exp[0] == "not_like") $CI->db->not_like($key, $exp[1]);
				else if($exp[0] == "not_like_after") $CI->db->not_like($key, $exp[1], 'after');
				else if($exp[0] == "not_like_before") $CI->db->not_like($key, $exp[1], 'before');
				else if($exp[0] == "order")
				{
					$key = str_replace("=","",$key);
					$CI->db->order_by($key, $exp[1]);
				}
				else if($key == "limit") $CI->db->limit($exp[1], $exp[0]);
			}
			else if($exp[0] == "where") $CI->db->where($key);
			
			if($exp[0] == "group") $CI->db->group_by($key);
		}
		
		foreach($filter_where_in as $key=> $value)
		{
			$CI->db->where_in($key, $value);
		}
		
		$q = $CI->db->get($tbl);
		//die($CI->db->last_query());
		
		return $q;
	}
}

if (!function_exists('GetQuery')){
	function GetQuery($field,$table,$where='',$order='',$group='')
	{
		$CI =& get_instance();
		$where = !empty($where) ? "WHERE ".$where : "";
		$order = !empty($order) ? "ORDER BY ".$order : "";
		$group = !empty($group) ? "GROUP BY ".$group : "";		
		
		$q = $CI->db->query("SELECT $field FROM $table $where $order $group");
		
		return $q;
	}
}

if (!function_exists('GetJoin')){
	function GetJoin($tbl,$tbl_join,$condition,$type,$select,$filter=array(),$filter_where_in=array())
	{
		$CI =& get_instance();
		$CI->db->select($select);
		foreach($filter as $key=> $value)
		{
			// Multiple Like
			if(is_array($value))
			{
				if($key == "group") $CI->db->group_by($value);
				$exp[0]=$exp[1]="";
			}
			else $exp = explode("/",$value);
			if(isset($exp[1]))
			{
				if($exp[0] == "where") $CI->db->where($key, $exp[1]);
				else if($exp[0] == "like") $CI->db->like($key, $exp[1]);
				else if($exp[0] == "or_like") $CI->db->or_like($key, $exp[1]);
				else if($exp[0] == "order") $CI->db->order_by($key, $exp[1]);
				else if($key == "limit") $CI->db->limit($exp[1], $exp[0]);
			}
			
			if($exp[0] == "group") $CI->db->group_by($key);
		}
		
		foreach($filter_where_in as $key=> $value)
		{
			if(preg_match("/!=/", $key)) $CI->db->where_not_in(str_replace("!=","",$key), $value);
			else $CI->db->where_in($key, $value);
		}
		
		$CI->db->join($tbl_join, $condition, $type);
		$q = $CI->db->get($tbl);
		//die($CI->db->last_query());
		
		return $q;
	}
}

if (!function_exists('GetSum')){
	function GetSum($table,$field,$filter=array(),$get="")
	{
		$CI =& get_instance();
		$CI->db->select("SUM($field) as total");
		foreach($filter as $key=> $value)
		{
			$exp = explode("/",$value);
			if(isset($exp[1]))
			{
				if($exp[0] == "where") $CI->db->where($key, $exp[1]);
				else if($exp[0] == "like") $CI->db->like($key, $exp[1]);
				else if($exp[0] == "likel") $CI->db->like($key, $exp[1], 'before');
				else if($exp[0] == "liker") $CI->db->like($key, $exp[1], 'after');
				else if($exp[0] == "order") $CI->db->order_by($key, $exp[1]);
				else if($key == "limit") $CI->db->limit($exp[1], $exp[0]);
			}
			
			if($exp[0] == "group") $CI->db->group_by($key);
		}
		
		$q = $CI->db->get($table);
		
		if($get == "value")
		{
			$val = 0;
			//die($CI->db->last_query());
			foreach($q->result_array() as $r) $val=$r['total'];
			return $val;
		}
		else return $q;
	}
}

if (!function_exists('GetCount')){
	function GetCount($table,$field,$filter=array(),$get="")
	{
		$CI =& get_instance();
		$CI->db->select("$field as label, COUNT($field) as total");
		foreach($filter as $key=> $value)
		{
			$exp = explode("/",$value);
			if(isset($exp[1]))
			{
				if($exp[0] == "where") $CI->db->where($key, $exp[1]);
				else if($exp[0] == "like") $CI->db->like($key, $exp[1]);
				else if($exp[0] == "likel") $CI->db->like($key, $exp[1], 'before');
				else if($exp[0] == "liker") $CI->db->like($key, $exp[1], 'after');
				else if($exp[0] == "order") $CI->db->order_by($key, $exp[1]);
				else if($key == "limit") $CI->db->limit($exp[1], $exp[0]);
			}
			
			if($exp[0] == "group") $CI->db->group_by($key);
		}
		$q = $CI->db->get($table);
		if($get == "value")
		{
			$val = 0;
			//die($CI->db->last_query());
			foreach($q->result_array() as $r) $val=$r['total'];
			return $val;
		}
		else return $q;
	}
}

if (!function_exists('GetCountIn')){
	function GetCountIn($table,$field,$filter=array(),$filter_where_in=array(),$get="")
	{
		$CI =& get_instance();
		$CI->db->select("$field, COUNT($field) as total");
		foreach($filter as $key=> $value)
		{
			$exp = explode("/",$value);
			if(isset($exp[1]))
			{
				if($exp[0] == "where") $CI->db->where($key, $exp[1]);
				else if($exp[0] == "like") $CI->db->like($key, $exp[1]);
				else if($exp[0] == "order") $CI->db->order_by($key, $exp[1]);
				else if($key == "limit") $CI->db->limit($exp[1], $exp[0]);
			}
			
			if($exp[0] == "group") $CI->db->group_by($key);
		}
		
		foreach($filter_where_in as $key=> $value)
		{
			if(preg_match("/!=/", $key)) $CI->db->where_not_in(str_replace("!=","",$key), $value);
			else $CI->db->where_in($key, $value);
		}
		
		$q = $CI->db->get($table);
		if($get == "value")
		{
			$val = 0;
			//die($CI->db->last_query());
			foreach($q->result_array() as $r) $val=$r['total'];
			return $val;
		}
		else return $q;
	}
}

if (!function_exists('GetColumns')){	
	function GetColumns($tbl)
	{
		$CI =& get_instance();
		//if(substr($tbl,0,3) != "mz_") $tbl = "mz_".$tbl;
		$query = $CI->db->query("SHOW COLUMNS FROM ".$tbl);
		return $query->result_array();
	}
}
	
if (!function_exists('GetUrlDate')){	
	function GetUrlDate($date)
	{
		$exp1 = explode(" ", $date);
		$exp = explode("-",$exp1[0]);
		return $exp[2]."/".$exp[1]."/".$exp[0];
	}
}

if (!function_exists('ExplodeNameFile')){
	function ExplodeNameFile($source)
	{
		$ext = strrchr($source, '.');
		$name = ($ext === FALSE) ? $source : substr($source, 0, -strlen($ext));

		return array('ext' => $ext, 'name' => $name);
	}
}

if (!function_exists('GetThumb')){	
	function GetThumb($image, $path="_thumb")
	{
		$exp = ExplodeNameFile($image);
		return $exp['name'].$path.$exp['ext'];
	}
}

if (!function_exists('ResizeImage')){	
	function ResizeImage($up_file,$w,$h)
	{
		//Resize
		$CI =& get_instance();
		$config['image_library'] = 'gd2';
		$config['source_image'] = $up_file;
		$config['dest_image'] = "./".$CI->config->item('path_upload')."/";
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE; //Width=Height
		$config['height'] = $h;
		$config['width'] = $w;
		
		$CI->load->library('image_lib', $config);
		if($CI->image_lib->resize()) return 1;
		else return 0; 
	}
}

if (!function_exists('InputFile')){
	function InputFile($filez,$filesize=500)
	{
		$CI =& get_instance();
		$file_up = $_FILES[$filez]['name'];
		$ext_file = strrchr($file_up, '.');
		$file_up = str_replace($ext_file,"",$file_up);
		$file_up = str_replace("-","_",url_title($file_up)).".".date("YmdHis").$ext_file;
		$myfile_up	= $_FILES[$filez]['tmp_name'];
		$ukuranfile_up = $_FILES[$filez]['size'];
		if($filez == "foto" || $filez == "foto1" || $filez == "foto2")
		$up_file = "./".$CI->config->item('path_upload')."/tokoh/".$file_up;
		else
		$up_file = "./".$CI->config->item('path_upload')."/".$file_up;
		
		if($ukuranfile_up < ($filesize * 1024))
		{
			if(strtolower($ext_file) == ".jpg" || strtolower($ext_file) == ".JPG" ||strtolower($ext_file) == ".jpeg" || strtolower($ext_file) == ".png")
			{
				if(copy($myfile_up, $up_file))
				{
					//Thumbnail
					//ResizeImage($up_file, 250, 250);
					return $file_up;
				}
			}
			//else if(strtolower($ext_file) == ".doc" || strtolower($ext_file) == ".docx" || strtolower($ext_file) == ".pdf")
			else
			{
				if(copy($myfile_up, $up_file))
				{
					return $file_up;
				}
				else return 3;
			}
			
		}
		else return 2;
	}
}

if (!function_exists('Page')){
	function Page($jum_record,$lmt,$pg,$path,$uri_segment)
	{
		$link = "";
		$config['base_url'] = $path;
		$config['total_rows'] = $jum_record;
		$config['per_page'] = $lmt;
		$config['num_links'] = 3;
		$config['cur_tag_open'] = '<li class="page-item"><strong>';
		$config['cur_tag_close'] = '</strong></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['uri_segment'] = $uri_segment;
		$CI =& get_instance();
		$CI->load->library('pagination');
		$CI->pagination->initialize($config);
		$link = $CI->pagination->create_links();
		return $link;
	}
}

if (!function_exists('Limit')){
	function Limit() {
		return 15;
	}
}

if (!function_exists('CaptchaSecurityImages')){	
	function CaptchaSecurityImages($width='120',$height='40',$characters='6') 
	{
		$CI =& get_instance();
		$font = './assets/font/monofont.ttf';
		$code = generateCode($characters);
		/* font size will be 75% of the image height */
		$font_size = $height * 0.75;
		$image = @imagecreate($width, $height) or die('Cannot initialize new GD image stream');
		/* set the colours */
		$background_color = imagecolorallocate($image, 255, 255, 255);
		$text_color = imagecolorallocate($image, 20, 40, 100);
		$noise_color = imagecolorallocate($image, 100, 120, 180);
		/* generate random dots in background */
		for( $i=0; $i<($width*$height)/3; $i++ ) {
			imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
		}
		/* generate random lines in background */
		for( $i=0; $i<($width*$height)/150; $i++ ) {
			imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
		}
		/* create textbox and add text */
		$textbox = imagettfbbox($font_size, 0, $font, $code) or die('Error in imagettfbbox function');
		$x = ($width - $textbox[4])/2;
		$y = ($height - $textbox[5])/2;
		imagettftext($image, $font_size, 0, $x, $y, $text_color, $font , $code) or die('Error in imagettftext function');
		
		
		/* output captcha image to browser */
		header('Content-Type: image/jpeg');
		imagejpeg($image);
		imagedestroy($image);
		$CI->session->set_userdata("security_code", $code);
	}
}

if (!function_exists('GetTanggal')){	
	function GetTanggal($tgl)
	{
		if(strlen($tgl) == 1) $tgl = "0".$tgl;
		return $tgl;
	}
}

if (!function_exists('GetBulanIndo')){	
	function GetBulanIndo($Bulan)
	{
		if($Bulan == "January")
			$Bulan = "Januari";
		else if($Bulan == "February")
			$Bulan = "Februari";
		else if($Bulan == "March")
			$Bulan = "Maret";
		else if($Bulan == "May")
			$Bulan = "Mei";
		else if($Bulan == "June")
			$Bulan = "Juni";
		else if($Bulan == "July")
			$Bulan = "Juli";
		else if($Bulan == "August")
			$Bulan = "Agustus";
		else if($Bulan == "October")
			$Bulan = "Oktober";
		else if($Bulan == "December")
			$Bulan = "Desember";

		return $Bulan;
	}
}

if (!function_exists('GetMonthIndex')){	
	function GetMonthIndex($var)
	{
		$bln = array("Jan"=> "01","Feb"=> "02","Mar"=> "03","Apr"=> "04","May"=> "05","Jun"=> "06","Jul"=> "07","Aug"=> "08","Sep"=> "09","Oct"=> "10","Nov"=> "11","Dec"=> "12");
		return $bln[$var];
	}
}

if (!function_exists('GetMonth')){	
	function GetMonth($id)
	{
		$bln = array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
		return $bln[$id];
	}
}

if (!function_exists('GetMonthFull')){	
	function GetMonthFull($id)
	{
		$id=intval($id);
		$bln = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		return $bln[$id];
	}
}

if (!function_exists('GetMonthShort')){	
	function GetMonthShort($val)
	{
		$bln = array("Januari"=> "Jan","Februari"=>"Feb","Maret"=>"Mar","April"=>"Apr","Mei"=>"May","Juni"=>"Jun","Juli"=>"Jul","Agustus"=>"Aug","September"=>"Sep","Oktober"=>"Oct","November"=>"Nov","Desember"=>"Dec");
		return $bln[$val];
	}
}

if (!function_exists('GetOptDate')){	
	function GetOptDate()
	{
		$opt[''] = "- Tanggal -";
		for($i=1;$i<=31;$i++)
		{
			if(strlen($i) == 1) $j = "0".$i;
			else $j=$i;
			$opt[$j] = $j;
		}
		return $opt;
	}
}

if (!function_exists('GetOptMonth')){	
	function GetOptMonth()
	{
		$opt[''] = "- Bulan -";
		$bln = array("01"=> "Januari","02"=> "Februari","03"=> "Maret","04"=>"April","05"=>"Mei","06"=>"Juni",
		"07"=>"Juli","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"November","12"=>"Desember");
		foreach($bln as $r=> $val)
		{
			$opt[$r] = $val;
		}
		
		return $opt;
	}
}

if (!function_exists('GetOptMonthFull')){	
	function GetOptMonthFull()
	{
		$opt[''] = "- Bulan -";
		$bln = array("Januari"=> "Januari","Februari"=> "Februari","Maret"=> "Maret","April"=>"April","Mei"=>"Mei","Juni"=>"Juni",
		"Juli"=>"Juli","Agustus"=>"Agustus","September"=>"September","Oktober"=>"Oktober","November"=>"November","Desember"=>"Desember");
		foreach($bln as $r=> $val)
		{
			$opt[$r] = $val;
		}
		
		return $opt;
	}
}

if (!function_exists('GetOptTahun')){	
	function GetOptTahun()
	{
		$opt[''] = "- Tahun -";
		for($i=date("Y");$i>=1930;$i--) {
			$opt[$i] = $i;
		}
		
		return $opt;
	}
}

if (!function_exists('GetOptProv')){	
	function GetOptProv()
	{
		$opt=array();
		$opt[''] = "- Pilih Provinsi -";
		$q = GetAll("ref_prov");
		foreach($q->result_array() as $r) {
			//$opt[$r['id_prov']] = ucwords(strtolower($r['provinsi']));
			$opt[$r['id_prov']] = ($r['provinsi']);
		}
		
		return $opt;
	}
}

if (!function_exists('GetOptKab')){	
	function GetOptKab($id_prov=0)
	{
		$opt=array();
		$opt[''] = "- Pilih Kab/Kota -";
		if($id_prov) $q = GetAll("ref_kab", array("id_prov"=> "where/".$id_prov));
		else $q = GetAll("ref_kab");
		foreach($q->result_array() as $r) {
			if($id_prov) $opt[$r['id_kab']] = $r['kabupaten'];
			else $opt[$r['id_kab']] = $r['kabupaten'];
		}
		if(!count($opt)) $opt[] = "- Kabupaten/Kota -";
		
		return $opt;
	}
}

if (!function_exists('GetOptKecByProv')){	
	function GetOptKecByProv($id_prov=0)
	{
		$opt=array();
		$q = GetAll("zref_kec", array("id_prov"=> "where/".$id_prov));
		foreach($q->result_array() as $r) {
			$opt[$r['id_kec']] = $r['kecamatan'];
		}
				
		return $opt;
	}
}

if (!function_exists('GetOptDesaByProv')){	
	function GetOptDesaByProv($id_prov=0)
	{
		$opt=array();
		$q = GetAll("zref_desa", array("id_prov"=> "where/".$id_prov));
		foreach($q->result_array() as $r) {
			$opt[$r['id']] = $r['desa'];
		}
				
		return $opt;
	}
}

if (!function_exists('GetOptDesaByKab')){	
	function GetOptDesaByKab($id=0)
	{
		$opt=array();
		$q = GetAll("ref_kel", array("id_kab"=> "where/".$id));
		foreach($q->result_array() as $r) {
			$opt[$r['id']] = $r['desa'];
		}
				
		return $opt;
	}
}

if (!function_exists('GetOptKec')){	
	function GetOptKec($id_kab=0)
	{
		$opt=array();
		$opt[''] = "- Pilih Kecamatan -";
		if($id_kab) $q = GetAll("ref_kec", array("id_kab"=> "where/".$id_kab));
		else $q = GetAll("ref_kec");
		foreach($q->result_array() as $r) {
			$opt[$r['id_kec']] = $r['kecamatan'];
		}
		if(!count($opt)) $opt[] = "- Kecamatan -";
		
		return $opt;
	}
}

if (!function_exists('GetOptBulan')){	
	function GetOptBulan()
	{
		$opt=array(""=> "- bln -");
		for($i=1;$i<=12;$i++) {
			if($i<10) $i="0".$i;
			$opt[$i] = $i;
		}
		
		return $opt;
	}
}

/* OPTIONS DROPDOWN */

if (!function_exists('GetOptPublish')){	
	function GetOptPublish()
	{
		$opt = array("Publish"=> "Publish", "NotPublish"=> "NotPublish");
		
		return $opt;
	}
}

if (!function_exists('GetOptGrup')){	
	function GetOptGrup()
	{
		$q = GetAll("admin_grup");
		$opt[''] = "- Grup User -";
		foreach($q->result_array() as $r)
		{
			$opt[$r['id']] = $r['title'];
		}
		
		return $opt;
	}
}

if (!function_exists('GetOptMenuTop')){	
	function GetOptMenuTop()
	{
		$q = GetAll("menu_top", array("is_publish"=> "where/1"));
		$opt[''] = "- Parent Menu -";
		foreach($q->result_array() as $r)
		{
			$opt[$r['id']] = $r['title'];
		}
		
		return $opt;
	}
}

if (!function_exists('GetOptMenuBottom')){	
	function GetOptMenuBottom()
	{
		$q = GetAll("menu_bottom", array("is_publish"=> "where/1"));
		$opt[''] = "- Parent Menu -";
		foreach($q->result_array() as $r)
		{
			$opt[$r['id']] = $r['title'];
		}
		
		return $opt;
	}
}

if (!function_exists('GetOptBlogCat')){	
	function GetOptBlogCat()
	{
		$opt = array();
		$q = GetAll("blog_cat", array("is_publish"=> "where/1", "is_delete"=> "where/0"));
		foreach($q->result_array() as $r)
		{
			$opt[$r['id']] = $r['title'];
		}
		
		return $opt;
	}
}

if (!function_exists('GetOptProductCat')){	
	function GetOptProductCat()
	{
		$opt = array();
		$q = GetAll("product_cat", array("is_publish"=> "where/1", "is_delete"=> "where/0"));
		foreach($q->result_array() as $r)
		{
			$opt[$r['id']] = $r['title'];
		}
		
		return $opt;
	}
}

if (!function_exists('GetOptAll')){	
	function GetOptAll($tabel, $judul=NULL)
	{
		$q = GetAll($tabel);
		
		if($judul) $opt[''] = $judul;
		foreach($q->result_array() as $r) {
			$opt[$r['id']] = $r['title'];
		}
		
		return $opt;
	}
}

if (!function_exists('GetOptMediaCat')){	
	function GetOptMediaCat()
	{
		$opt = array();
		$q = GetAll("media_cat", array("is_publish"=> "where/1", "is_delete"=> "where/0"));
		foreach($q->result_array() as $r)
		{
			$opt[$r['id']] = $r['title'];
		}
		
		return $opt;
	}
}

if (!function_exists('DelImage')){	
	function DelImage()
	{
		$CI =& get_instance();
		$admin_id = $this->auth();
		$mz_function = new mz_function();
		$id = $CI->input->post('del_id_img');
		$table = $CI->input->post('del_table');
		$field = $CI->input->post('del_field');
		
		$GetFile = GetValue($field,$table, array("id"=> "where/".$id));
		$GetThumb = GetThumb($GetFile);
		if(file_exists("./".$CI->config->item('path_upload')."/".$GetFile)) unlink("./".$CI->config->item('path_upload')."/".$GetFile);
		if(file_exists("./".$CI->config->item('path_upload')."/".$GetThumb)) unlink("./".$CI->config->item('path_upload')."/".$GetThumb);
		
		$data[$field] = "";
		$this->db->where("id", $id);
		$this->db->update($table, $data);
	}
}

if (!function_exists('FormatTanggal')){
	function FormatTanggal($tgl, $flag="time")
	{
		if($flag=="time") {
			$exp = explode("-", substr($tgl,0,10));
			$time = substr($tgl,11,8);
			$tgl = $exp[2]." ".GetMonthFull(intval($exp[1]))." ".$exp[0]." ".$time;
		} else {
			$exp = explode("-", $tgl);
			$tgl = $exp[2]." ".GetMonthFull(intval($exp[1]))." ".$exp[0];
		}
		return $tgl;
	}
}

if (!function_exists('FormatTanggalShort')){
	function FormatTanggalShort($tgl)
	{
		$exp = explode("-", $tgl);
		//$tgl = $exp[2]." ".GetMonth(intval($exp[1]))." ".substr($exp[0],2,2);
		$tgl = $exp[2]." ".GetMonth(intval($exp[1]))." ".$exp[0];
		return $tgl;
	}
}

if (!function_exists('FormatTanggalChart')){
	function FormatTanggalChart($tgl)
	{
		$exp = explode("-", $tgl);
		//$tgl = $exp[2]." ".GetMonth(intval($exp[1]))." ".substr($exp[0],2,2);
		$tgl = $exp[2]."/".$exp[1];
		return $tgl;
	}
}

if (!function_exists('FormatTanggalTimeAgenda')){
	function FormatTanggalTimeAgenda($start,$end)
	{
		$tgl = substr($start,11,5)." - ".substr($end,11,5)." ".date("A", strtotime($end));
		return $tgl;
	}
}

if (!function_exists('GetPembicaraAgenda')){
	function GetPembicaraAgenda($param)
	{
		$pembicara=array();
		$speaker = GetOptAll("speakers");
		$exp = explode(",",str_replace("-","",$param));
		foreach($exp as $e) {
			$pembicara[$e] = $speaker[$e];
		}
		ksort($pembicara);
		return join(" | ",$pembicara);
	}
}

if (!function_exists('Rupiah')){
	function Rupiah($rp)
	{
		if($rp && $rp!="-") return "Rp ".number_format($rp,0,",",".").",-";
		else return 0;
	}
}

if (!function_exists('Decimal')){
	function Decimal($rp,$koma=2)
	{
		$rp = str_replace(" ","",$rp);
		if($rp=="-1") return "N/A";
		else if($rp && $rp!="-") return number_format($rp,$koma);
		else return 0;
	}
}

if (!function_exists('Number')){
	function Number($rp)
	{
		$rp = str_replace(" ","",$rp);
		if($rp && $rp!="-") return number_format($rp,0,",",".");
		else return 0;
	}
}

if (!function_exists('KomaToTitik')){
	function KomaToTitik($rp)
	{
		return str_replace(",","",$rp);
	}
}

if (!function_exists('GetFilename')){
	function GetFilename($val)
	{
		if($val) return substr($val,15);
		else return "";
	}
}

if (!function_exists('GetTanggalIndo')){
	function GetTanggalIndo($val, $time=NULL)
	{
		$dt = strtotime($val);
		$dt = date("d", $dt)." ".GetBulanIndo(date("F", $dt))." ".date("Y", $dt);
		if($time) $dt .= "&nbsp;&nbsp;".substr($val,11,8);
		return $dt;
	}
}

if (!function_exists('GetTanggalIndoNew')){
	function GetTanggalIndoNew($val, $time=NULL)
	{
		$exp=explode("/",$val);
		$new_val=$exp[2]."-".$exp[1]."-".$exp[0];
		$dt = strtotime($new_val);
		$dt = date("d", $dt)." ".GetBulanIndo(date("F", $dt))." ".date("Y", $dt);
		if($time) $dt .= "&nbsp;&nbsp;".substr($val,11,8);
		return $dt;
	}
}

if (!function_exists('to_excel')){
	function to_excel($query, $filename='xlsoutput')
	{
		$headers = '';
	  header("Content-type: application/x-msdownload");
	  header("Content-Disposition: attachment; filename=$filename.xls");
	  echo "$headers\n$query";
	}
}

if (!function_exists('to_doc')){
	function to_doc($query, $filename='docoutput')
	{
		header("Content-type: application/msword");
	  header("Content-Disposition: attachment; filename=$filename.doc");
	  echo "$query";
	}
}

if (!function_exists('CekKotaKab')){
	function CekKotaKab($kab)
	{
		if(preg_match("/jakarta/", strtolower($kab)) || preg_match("/seribu/", strtolower($kab))) $kab = $kab;
		else if(!preg_match("/kota /", strtolower($kab))) $kab = "Kabupaten ".$kab;
		else $kab = str_replace("KOTA", "Kota", $kab);
		return $kab;
	}
}

if (!function_exists('GetProv')){	
	function GetProv($id)
	{
		return GetValue("provinsi", "zref_prov", array("id_prov"=> "where/".$id));
	}
}

if (!function_exists('GetKab')){	
	function GetKab($id)
	{
		return GetValue("kabupaten", "zref_kab", array("id_kab"=> "where/".$id));
	}
}

if (!function_exists('GetKec')){	
	function GetKec($id)
	{
		return GetValue("kecamatan", "zref_kec", array("id_kec"=> "where/".$id));
	}
}

if (!function_exists('GetDesa')){	
	function GetDesa($id)
	{
		return GetValue("desa", "zref_desa", array("id_desa"=> "where/".$id));
	}
}

if (!function_exists('GetConfig')){
	function GetConfig($kode='')
	{
		$val = $kode ? GetValue("param", "config", array("kode"=> "where/".$kode)) : "";
		
		return $val;
	}
}

if (!function_exists('randPassword')){	
	function randPassword()
	{
		$pass = "";
		$jum = rand(1,5);
		
		//Huruf
		$huruf = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ";
		for($i=1;$i<=$jum;$i++) {
			$pass .= substr($huruf,rand(0,47),1);
		}
		
		//Angka
		$angka = "23456789";
		for($i=1;$i<=9-$jum;$i++) {
			$pass .= substr($angka,rand(0,7),1);
		}
		
		return $pass;
	}
}

if (!function_exists('randPIN')){	
	function randPIN()
	{
		$pass = "";
		//Angka
		$angka = "1234567890";
		for($i=1;$i<=6;$i++) {
			$pass .= substr($angka,rand(0,9),1);
		}
		
		return $pass;
	}
}

if(!function_exists('GetBahasa')){
	function GetBahasa($param="home")
	{
    $bahasa=array();
    $q = GetAll("translation_manager",array("grup"=> "where/".$param));
    foreach($q->result_array() as $r) {
    	$bahasa[$r['id']] = nl2br($r['text'.getLang()]);
    }
    return $bahasa;
	}
}

if(!function_exists('GetHero')){
	function GetHero($id)
	{
    $hero = GetValue("image","hero",array("id"=> "where/".$id));
    return $hero;
	}
}

if(!function_exists('GetHeroMobile')){
	function GetHeroMobile($id)
	{
    $hero = GetValue("image_mobile","hero",array("id"=> "where/".$id));
    return $hero;
	}
}
?>