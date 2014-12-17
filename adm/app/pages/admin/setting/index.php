<?php
require APP.'/objects/admin/common/Common.php';
require APP . '/objects/admin/menu/Menu.php';
require APP . '/objects/admin/setting/Setting.php';

global $layout;
$layout = 'admin/user/default.php';

$common = new AdminCommon($this->da);
$menu = new AdminMenu($this->da);
$setting = new AdminSetting($this->da);

$this->com->set('main_menu', $menu->show('setting'));
$this->com->set('main_content', $setting->index());
$this->com->set('main_footer',$common->footer());