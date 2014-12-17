<?php
header('Content-Type: text/html; charset=UTF-8');
require APP.'/objects/admin/scrud/Scrud.php';
require LIBRARY.'/scrud/Scrud.php';
require APP.'/objects/admin/menu/Menu.php';

global $layout;
global $da;
$layout = 'admin/scrud/browse.php';
$scrud = new AdminScrud($this->da);
$menu = new AdminMenu($this->da);
$dao = new GenericDao('crud_components', $da);

$params = array();
$params['fields'] = array('crud_components.group_id');
$params['conditions'] = array('crud_components.id = ?',array($_GET['com_id']));
$params['join'][] = array('INNER','crud_group_components','crud_group_components.id = crud_components.group_id');
$rs = $dao->findFirst($params);

$this->com->set('main_menu',$menu->show('component'));
$this->com->set('main_content',$scrud->browse($rs));

require APP.'/objects/admin/common/Common.php';
$common = new AdminCommon($this->da);
$this->com->set('main_footer',$common->footer());
