<?php
require APP . '/objects/admin/setting/Setting.php';

global $layout;
$layout = null;

$setting = new AdminSetting($this->da);
$setting->save();