<?php
class AdminSetting {
	private $da;
	private $savant;
	
	public function __construct($da) {
		$auth = Auth::singleton();
		$auth->checkSettingManagement();
	
		$this->da = $da;
		$this->savant = new Savant3();
		$this->savant->setPath('template', dirname(__FILE__));
	}
	
	public function index(){
		$settingKey = sha1('general');
		$settingDao = new GenericDao('crud_settings', $this->da);
		$groupDao = new GenericDao('crud_groups', $this->da);
		$languageDao = new GenericDao('crud_languages', $this->da);
		
		$params = array();
		$params['conditions'] = array('setting_key = ?', array($settingKey));
		$setting = $settingDao->findFirst($params);
		$this->savant->data = unserialize($setting['setting_value']);
		
		$this->savant->groups = $groupDao->find();
		$this->savant->languages = $languageDao->find();
		
		$this->savant->setting_key = $settingKey;
		
		return $this->savant->getOutput('index.tpl.php');
	}
	
	public function emailNewUser(){
		$settingDao = new GenericDao('crud_settings', $this->da);
		
		$settingKey = sha1('new_user');
		$params = array();
		$params['conditions'] = array('setting_key = ?', array($settingKey));
		$setting = $settingDao->findFirst($params);
		
		$this->savant->data = unserialize($setting['setting_value']);
		$this->savant->setting_key = $settingKey;
		
		return $this->savant->getOutput('email_new_user.tpl.php');
	}
	
	public function emailResetPassword(){
		$settingDao = new GenericDao('crud_settings', $this->da);
		
		$settingKey = sha1('reset_password');
		$params = array();
		$params['conditions'] = array('setting_key = ?', array($settingKey));
		$setting = $settingDao->findFirst($params);
		
		$this->savant->data = unserialize($setting['setting_value']);
		$this->savant->setting_key = $settingKey;
		
		return $this->savant->getOutput('email_reset_password.tpl.php');
	}
	
	public function save(){
		$lang = Lang::singleton();
		$var = array();
		$var['error'] = 0;
		$validate = Validation::singleton();
		
		if (isset($_POST['data']['email_address'])){
			if (!$validate->email($_POST['data']['email_address'])){
				$var['error'] = 1;	
				$var['error_message'] = $lang->line('please_provide_valid_email_for_admin_email');	
			}
		}
		if ($var['error'] == 0){
			$settingDao = new GenericDao('crud_settings', $this->da);
	
			$setting = array();
			$setting['setting_key'] = $_POST['data']['setting_key'];
			$setting['setting_value'] = serialize($_POST['data']);
			$settingDao->save($setting);
		}
		
		echo json_encode($var);
	}
}