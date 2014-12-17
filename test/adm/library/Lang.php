<?php
class Lang {
	
	private $lang = array();
	
	// Hold an instance of the class
	private static $instance;

	private function __construct() {
		$lang = array();
		if (!isset($_GET['lang']) && isset($_POST['lang'])){
			$_GET['lang'] = $_POST['lang'];
		}
		if(isset($_GET['lang'])){
			$language = $_GET['lang'];
			
			// register the session and set the cookie
			$_SESSION['lang'] = $language;
			setcookie("lang", $language, time() + (3600 * 24 * 30),'/',false);
			
		}else if(isSet($_SESSION['lang'])){
			$language = $_SESSION['lang'];
		}else if(isSet($_COOKIE['lang'])){
			$language = $_COOKIE['lang'];
		}else{
			global $da;
			
			$settingDao = new GenericDao('crud_settings', $da);
			
			$params = array();
			$params['conditions'] = array('setting_key = ?', array(sha1('general')));
			$setting = $settingDao->findFirst($params);
			$setting = unserialize($setting['setting_value']);
			
			$language = $setting['default_language'];
		}
		if (file_exists(APP.'/languages/lang.'.$language.'.php')){
			require_once APP.'/languages/lang.'.$language.'.php';
		}
		
		if (empty($lang)){
			require_once APP.'/languages/lang.default.php';
		}
		
		$this->lang = $lang;
	}

	// The singleton method
	public static function singleton(){
		if (!isset(self::$instance)){
			$c = __CLASS__;
			self::$instance = new $c;
		}

		return self::$instance;
	}
	
	public function line($line = ''){
		
		return (isset(self::$instance->lang[$line]))?self::$instance->lang[$line]:$line;
		
	}
}