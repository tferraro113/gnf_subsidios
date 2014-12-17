<?php
require APP . '/objects/admin/component/Component.php';
require LIBRARY . '/scrud/Scrud.php';
require APP.'/objects/admin/menu/Menu.php';

global $layout;
$layout = 'admin/scrud/browse.php';
$menu = new AdminMenu($this->da);
$component = new AdminComponent($this->da);

$_GET['table'] = 'crud_group_components';

$this->com->set('main_menu',$menu->show('tool'));
$this->com->set('main_content',$component->groups());

require APP.'/objects/admin/common/Common.php';
$common = new AdminCommon($this->da);
$this->com->set('main_footer',$common->footer());
