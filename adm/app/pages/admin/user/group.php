<?php
require APP.'/objects/admin/user/group/Group.php';
require APP.'/objects/admin/common/Common.php';
require LIBRARY.'/scrud/Scrud.php';
require APP.'/objects/admin/menu/Menu.php';

$_GET['table'] = 'crud_groups';

global $layout;
$layout = 'admin/user/default.php';

$common = new AdminCommon($this->da);
$scrud = new AdminGroup($this->da);
$menu = new AdminMenu($this->da);

$this->com->set('main_menu',$menu->show('user'));
$this->com->set('main_content',$scrud->browse());
$this->com->set('main_footer',$common->footer());