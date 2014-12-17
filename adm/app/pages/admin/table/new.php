<?php
require APP.'/objects/admin/common/Common.php';
require APP . '/objects/admin/menu/Menu.php';
require APP . '/objects/admin/table/Table.php';

global $layout;
$layout = 'admin/user/default.php';

$common = new AdminCommon($this->da);
$menu = new AdminMenu($this->da);
$table = new AdminTable($this->da);

$this->com->set('main_menu', $menu->show('tool'));
$this->com->set('main_content', $table->add());
$this->com->set('main_footer',$common->footer());