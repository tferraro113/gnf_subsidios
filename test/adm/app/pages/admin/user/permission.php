<?php
require APP.'/objects/admin/common/Common.php';
require APP.'/objects/admin/user/permission/Permission.php';
require APP.'/objects/admin/menu/Menu.php';

global $layout;
$layout = 'admin/user/default.php';

$common = new AdminCommon($this->da);
$permission = new AdminPermission($this->da);
$menu = new AdminMenu($this->da);

$this->com->set('main_menu',$menu->show('user'));
$this->com->set('main_content',$permission->browse());
$this->com->set('main_footer',$common->footer());