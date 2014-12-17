<?php

function isPost() {
    return (count($_POST) > 0) ? true : false;
}

function isGet() {
    return (count($_GET) > 0) ? true : false;
}

function isAjax() {
    return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') ? true : false;
}

function redirect($url, $file = 'index.php') {
	if (isset($_GET['apache_mod_rewrite']) && (int)$_GET['apache_mod_rewrite'] == 1){
		header("Location: " . __SELF__ . '/' . $url);
	}else{
		header("Location: " . __SELF__ . '/'.$file.'?wp=' . str_replace('?', '&', $url));
	}
	exit();
}

function removeDir($dirPath) {
    if (!is_dir($dirPath)) {
        throw new Exception("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            removeDir($file);
        } else {
            @unlink($file);
        }
    }
    @rmdir($dirPath);
}

function strUrl($str, $file = 'index.php'){
	$url = '';

	if (isset($_GET['apache_mod_rewrite']) && (int)$_GET['apache_mod_rewrite'] == 1){
		$url = __SELF__.'/'.$str;
	}else{
		$str = str_replace('?', '&', $str);
		$url = __SELF__.'/'.$file.'?wp='.$str;
	}

	return $url;
}

function admin_url($params = null,$merger = true) {
	$url = '';

	$query_string = array ();
	if (! empty ( $_SERVER ['QUERY_STRING'] )) {
		parse_str ( $_SERVER ['QUERY_STRING'], $query_string );
	}

	if (! empty ( $params )) {
		if (is_string ( $params )) {
			$new_params = array ();
			parse_str ( $params, $new_params );
			$params = $new_params;
		}
	}
	if (isset($_GET['apache_mod_rewrite']) && (int)$_GET['apache_mod_rewrite'] == 1){
		$params['wp'] = '';
	}

	if (true == $merger){
		$params = (! empty ( $params )) ? array_merge (
				$query_string,
				$params
		) : $query_string;
	}

	foreach ( $params as $k => $v ) {
		if (empty ( $v )) {
			unset ( $params [$k] );
		}
	}

	$url = '?' . http_build_query ( $params, '', '&' );

	return $url;
}

function recurse_copy($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while (false !== ( $file = readdir($dir))) {
        if (( $file != '.svn' ) && ( $file != '.' ) && ( $file != '..' )) {
            if (is_dir($src . '/' . $file)) {
                recurse_copy($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function str2mysqltime($str,$format = 'Y-m-d H:i:s'){
	$date = '';
	$date = date($format,strtotime($str));
	if (date('Y-m-d',strtotime($date)) <= '1970-01-01'){
		$str = str_replace('-', '/', $str);
		$date = date($format,strtotime($str));
		if (date('Y-m-d',strtotime($date)) <= '1970-01-01'){
			$str = str_replace('/', '-', $str);
			$date = date($format,strtotime($str));
		}
	}
	
	return $date;
}

function is_date($str){
	if (!empty($str) && trim($str) != ''){
		$str = str2mysqltime($str,'Y-m-d');
		if ($str <= '1970-01-01'){
			return false;
		}else{
			return true;
		}
	}else{
		return false;
	}
}

function siteURL()
{
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$domainName = $_SERVER['HTTP_HOST'];
	return $protocol.$domainName;
}

