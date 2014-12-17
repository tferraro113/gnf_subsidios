<?php
require APP . '/objects/admin/menu/Menu.php';
require APP . '/objects/admin/setting/Setting.php';

global $layout;
$layout = 'admin/user/default.php';

$menu = new AdminMenu($this->da);
$setting = new AdminSetting($this->da);

$this->com->set('main_menu', $menu->show('setting'));
$this->com->set('main_content', $setting->emailNewUser());

require APP.'/objects/admin/common/Common.php';
$common = new AdminCommon($this->da);
$this->com->set('main_footer',$common->footer());