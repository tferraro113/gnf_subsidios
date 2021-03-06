<?php

define('__IMAGE_UPLOAD_REAL_PATH__', ROOT.'/public/media/images/');
define('__IMAGE_PATH__', __PUBLIC_PATH__.'media/images/');

define('__FILE_UPLOAD_REAL_PATH__', ROOT.'/public/media/files/');
define ( 'PLUGINS_FOLDER',APP.'/plugins' );
define ('__DATABASE_CONFIG_PATH__',APP.'/configs/database');

//define('__ERROR_REPORTING__',E_ALL);
define('__ERROR_REPORTING__',-1);

define('__HTML_CHARSET__','utf-8');

define('MOD_REWRITE', 1);

define('__DATE_FORMAT__', 'dd/MM/yyyy'); // MM/dd/yyyy | dd/MM/yyyy | MM-dd-yyyy | dd-MM-yyyy

define('__SELF__',substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')));

date_default_timezone_set("America/Argentina/Buenos_Aires"); // set default timezone.

global $layout;
$layout = 'default';

global $date_format_convert;
$date_format_convert = array();

$date_format_convert['MM/dd/yyyy'] = 'm/d/Y';
$date_format_convert['dd/MM/yyyy'] = 'd/m/Y';
$date_format_convert['MM-dd-yyyy'] = 'm-d-Y';
$date_format_convert['dd-MM-yyyy'] = 'd-m-Y';

global $default_page;
$default_page = 'admin/login.php';

global $imageExtensions;
$imageExtensions = array(".png", ".jpg", ".gif");

global $fileExtensions;
$fileExtensions = array(".png", ".jpg", ".gif",".doc",".docx",".xls",".xlsx",".zip",".rar",".7z",".swf");


global $sysUser;
$sysUser['name'] = "systemAdmin";
$sysUser['password'] = "123456";
$sysUser['enable'] = false;


global $publicTable;
$publicTable = array();
$publicTable[] = 'articles';
$publicTable[] = 'categories';

define('__LOGIN_HTTPS__',false); // make the login page https, instead of http