<?php
require APP.'/objects/admin/common/Common.php';

global $layout;
$layout = 'admin/login.php';

$common = new AdminCommon($this->da);
$lang = Lang::singleton();

$this->com->set('header_title',$lang->line('php_admin_pro') . ' '.$lang->line('sign_up'));
$this->com->set('main_content',$common->signup());