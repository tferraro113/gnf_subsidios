<?php
require APP.'/objects/admin/common/Common.php';
require APP . '/objects/admin/menu/Menu.php';
require APP . '/objects/admin/language/Language.php';

global $layout;
$layout = 'admin/user/default.php';

$common = new AdminCommon($this->da);
$menu = new AdminMenu($this->da);
$language = new AdminLanguage($this->da);

$this->com->set('main_menu', $menu->show('tool'));
$this->com->set('main_content', $language->translate());
$this->com->set('main_footer',$common->footer());