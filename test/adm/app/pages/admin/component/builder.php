<?php
require APP . '/objects/admin/component/Component.php';
require LIBRARY . '/scrud/Scrud.php';
require APP.'/objects/admin/menu/Menu.php';

global $layout;
$layout = 'admin/scrud/browse.php';
$menu = new AdminMenu($this->da);
$component = new AdminComponent($this->da);

$_GET['table'] = 'crud_components';
$hook = Hook::singleton();

$hook->addFunction('SCRUD_ADD_FORM', 'addTableElement');
$hook->addFunction('SCRUD_EDIT_FORM', 'addTableElement');
$hook->addFunction('SCRUD_ADD_CONFIRM', 'addTableElement');
$hook->addFunction('SCRUD_EDIT_CONFIRM', 'addTableElement');
$hook->addFunction('SCRUD_VIEW_FORM', 'addTableElement');
$hook->addFunction('SCRUD_CONFRIM_DELETE_FORM', 'addTableElement');

$hook->addFunction('SCRUD_BEFORE_UPDATE', 'removeConfig');
$hook->addFunction('SCRUD_COMPLETE_DELETE', 'completeDelete');


$this->com->set('main_menu',$menu->show('tool'));
$this->com->set('main_content',$component->builder());

require APP.'/objects/admin/common/Common.php';
$common = new AdminCommon($this->da);
$this->com->set('main_footer',$common->footer());

function addTableElement($element){
	global $da;
	$dao = new Dao($da);
	$tbls = $dao->listTables();
	$tables = array();
	foreach ($tbls as $table){
		if (strpos($table, 'crud_') !== false)
			continue;
		$tables[$table] = $table;
	}
	$element['crud_components.component_table'] = Array(
			'alias' => 'Table ',
			'element' => Array(
					0 => 'autocomplete',
					1 => $tables,
					2 => array(
							'style' => 'width:220px;'
					)
			)
	);

	return $element;

}

function removeConfig($data){
	global $da;
	global $config_database;
	$comDao = new GenericDao('crud_components', $da);
	$params = array();
	$params['conditions'] = array('id = ?',array($_POST['key']['crud_components']['id']));
	$com = $comDao->findFirst($params);
	if ($data['crud_components']['component_table'] != $com['component_table']) {
		if (file_exists(__DATABASE_CONFIG_PATH__ . '/' . $config_database['default']["database"] . '/' .sha1('com_'.$_POST['key']['crud_components']['id']))) {
			removeDir(__DATABASE_CONFIG_PATH__ . '/' . $config_database['default']["database"]  . '/'.sha1('com_'.$_POST['key']['crud_components']['id']));
		}
	}

	return $data;
}

function completeDelete($data){
	global $config_database;
	if (file_exists(__DATABASE_CONFIG_PATH__ . '/' . $config_database['default']["database"] . '/' .sha1('com_'.$_GET['key']['crud_components.id']))) {
		removeDir(__DATABASE_CONFIG_PATH__ . '/' . $config_database['default']["database"]  . '/'.sha1('com_'.$_GET['key']['crud_components.id']));
	}
	
	return $data;
}