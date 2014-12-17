<?php
require APP.'/objects/admin/common/Common.php';
require LIBRARY . '/scrud/Scrud.php';
require APP . '/objects/admin/menu/Menu.php';
require APP . '/objects/admin/language/Language.php';

global $layout;
$layout = 'admin/user/default.php';

$_GET['table'] = 'crud_languages';
$hook = Hook::singleton();

$hook->addFunction('SCRUD_EDIT_FORM', 'edit_form');
$hook->addFunction('SCRUD_VALIDATE','validate_language_code');
$hook->addFunction('SCRUD_BEFORE_UPDATE','before_update');
$hook->addFunction('SCRUD_COMPLETE_SAVE', 'complete_save');
$hook->addFunction('SCRUD_COMPLETE_DELETE', 'complete_delete');

$common = new AdminCommon($this->da);
$menu = new AdminMenu($this->da);
$language = new AdminLanguage($this->da);

$this->com->set('main_menu', $menu->show('tool'));
$this->com->set('main_content', $language->browse());
$this->com->set('main_footer',$common->footer());

function validate_language_code($error){
	global $da;
	$lang = Lang::singleton();
	if (empty($_POST['key'])) {
		$langDao = new GenericDao('crud_languages', $da);
		$params = array();
		$params['conditions'] = array('language_code = ?', array(trim($_POST['data']['crud_languages']['language_code'])));
		$rs = $langDao->findFirst($params);
		
		if (!empty($rs)) {
			$error['crud_languages.language_code'][] = $lang->line('language_code_is_existed');
		}

		if (!is_writable(APP.'/languages')) {
			$error['error_directory_write'][] = sprintf($lang->line('directory_is_not_allowed_write'), APP.'/languages');
		}
	}
	return $error;
}

function edit_form($element){
	$tmp = array();
	foreach ($element as $k => $v) {
		if (isset($_REQUEST['key']) && $k == 'crud_languages.language_code'){
			$v['element'][1]['readonly'] = "readonly";
		}
		$tmp[$k] = $v;
	}
	$element = $tmp;
	
	return $element;
}

function before_update($data){
	if (isset($data['crud_languages']['language_code'])){
		unset($data['crud_languages']['language_code']);
	}
	
	return $data;
}

function complete_save($data){
	if (empty($_POST['key'])) {
		if (!file_exists(APP.'/languages/lang.'.$data['crud_languages']['language_code'].'.php')){
			$oldumask = umask(0);
			$fcontent = file_get_contents(APP.'/languages/lang.default.php');
			file_put_contents(APP.'/languages/lang.'.$data['crud_languages']['language_code'].'.php', $fcontent);
			umask($oldumask);
		}
	}
	
}

function complete_delete($data){
	if (file_exists(APP.'/languages/lang.'.$data['crud_languages']['language_code'].'.php')){
		@unlink(APP.'/languages/lang.'.$data['crud_languages']['language_code'].'.php');
	}
}