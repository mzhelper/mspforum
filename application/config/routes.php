<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['contents/(:any)'] = "contents/main/$1";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;