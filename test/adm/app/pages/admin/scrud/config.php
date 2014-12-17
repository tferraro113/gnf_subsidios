<?php
require APP.'/objects/admin/scrud/Scrud.php';
require APP.'/objects/admin/menu/Menu.php';

global $layout;
$layout = 'admin/scrud/config.php';

$scrud = new AdminScrud($this->da);
$menu = new AdminMenu($this->da);

$this->com->set('main_menu',$menu->show('tool'));
$this->com->set('main_content',$scrud->config());

require APP.'/objects/admin/common/Common.php';
$common = new AdminCommon($this->da);
$this->com->set('main_footer',$common->footer());