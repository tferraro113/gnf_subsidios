<?php

class Auth {

    private static $instance;
    public static $public = array();

    public static function singleton() {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
    }

    public function execute() {
        global $config_database;
        if (!file_exists(__DATABASE_CONFIG_PATH__ . '/' . $config_database['default']["database"] . '/v_1.1.txt')) {
            $_GET['wp'] = 'install/index.php';
        } else {
            if (!in_array($_GET['wp'], Auth::$public)) {
                if (!isset($_SESSION['CRUD_AUTH']) &&
                        $_GET['wp'] != 'admin/login.php') {
                	if (!$this->reLogin()){
                    	redirect('admin/login.php');
                	}
                }else if ($_GET['wp'] == 'admin/login.php'){
                	$this->reLogin();
                }
            }
        }
    }
    
    private function reLogin(){
    	global $da;
    	$flg = false;
    	if (!Cookie::IsEmpty('CRUD_AUTH')){
	    	$data = unserialize(Cookie::Get('CRUD_AUTH'));
	    	if (is_array($data)){
	    		$userDao = new GenericDao('crud_users', $da);
	    		
	    		$params = array();
	    		$params['conditions'] = array('user_name = ? and user_password = ? and user_status = ? ', array(base64_decode($data[0]), base64_decode($data[1]),1));
	    		$rs = $userDao->findFirst($params);
	    		if (!empty($rs)) {
	    			$groupDao = new GenericDao('crud_groups', $da);
	    			$params = array();
	    			$params['conditions'] = array('id = ?', array($rs['group_id']));
	    			$rs1 = $groupDao->findFirst($params);
	    			if (!empty($rs1)) {
	    				$rs['group'] = $rs1;
	    			} else {
	    				$rs['group'] = array('group_name' => 'None',
	    						'group_manage_flag' => 0);
	    			}
	    			unset($rs['group_id']);
	    			unset($rs['user_password']);
	    			unset($rs['user_info']);
	    			$_SESSION['CRUD_AUTH'] = $rs;
	    			$flg = true;
	    		}
	    	}
    	}
    	
    	return $flg;
    }

    
    public function checkUserManagement(){
    	if ((int) $_SESSION['CRUD_AUTH']['group']['group_manage_flag'] != 1 && 
    		(int) $_SESSION['CRUD_AUTH']['group']['group_manage_flag'] != 3 &&
    		(int) $_SESSION['CRUD_AUTH']['user_manage_flag'] != 1 && 
    		(int) $_SESSION['CRUD_AUTH']['user_manage_flag'] != 3) {
    		redirect('error/no_access.php');
    	}
    }
    
    public function checkToolManagement(){
    	if ((int) $_SESSION['CRUD_AUTH']['group']['group_manage_flag'] != 2 &&
    	(int) $_SESSION['CRUD_AUTH']['group']['group_manage_flag'] != 3 &&
    	(int) $_SESSION['CRUD_AUTH']['user_manage_flag'] != 2 &&
    	(int) $_SESSION['CRUD_AUTH']['user_manage_flag'] != 3) {
    		redirect('error/no_access.php');
    	}
    }
    public function checkGlobalAccess($com_id = null){
    	
    }
    
    public function isGlobalAccess($com_id = null){
    	$permissions = $this->getPermissionType($com_id);
    	$flag = true;
    	
    	if ((int) $_SESSION['CRUD_AUTH']['group']['group_global_access'] != 1 &&
    	(int) $_SESSION['CRUD_AUTH']['user_global_access'] != 1) {
    		$flag = false;
    	}
    	if ($flag == false){
	    	if (!in_array(5, $permissions)) {
	    		$flag = false;
	    	}else {
	    		$flag = true;
	    	}
    	}
    	
    	return $flag;
    }
    
    public function checkSettingManagement(){
    	if (!$this->isSettingManagement()) {
    		redirect('error/no_access.php');
    	}
    }
    
    public function isSettingManagement(){
    	$flag = true;
    	if ((int) $_SESSION['CRUD_AUTH']['group']['group_setting_management'] != 1 &&
    	(int) $_SESSION['CRUD_AUTH']['user_setting_management'] != 1) {
    		$flag = false;
    	}
    	
    	return $flag;
    }
    

    public function checkBrowsePermission() {
    	$permissions = $this->getPermissionType();
    	if (!isset($_GET['xtype'])) {
    		if (isset($_SESSION['auth_token_xtable'])) {
    			unset($_SESSION['auth_token_xtable']);
    		}
    		if (isset($_SESSION['xtable_search_conditions'])) {
    			unset($_SESSION['xtable_search_conditions']);
    		}
    		$_GET['xtype'] = 'index';
    	}
    	switch (strtolower($_GET['xtype'])) {
    		case 'index':
    			if (!in_array(4, $permissions)) {
    				redirect('error/no_access.php');
    			}
    			break;
    		case 'form':
    		case 'confirm':
    		case 'update':
    			if (isset($_REQUEST['key'])){
    				if (!in_array(2, $permissions)) {
    					redirect('error/no_access.php');
    				}
    			}else{
    				if (!in_array(1, $permissions)) {
    					redirect('error/no_access.php');
    				}
    			}
    			break;
    		case 'del':
    		case 'delFile':
    		case 'delconfirm':
    			if (!in_array(3, $permissions)) {
    				redirect('error/no_access.php');
    			}
    			break;
    	}
    }

    public function getPermissionType($com_id = null) {
    	 
    	if ($_SESSION['CRUD_AUTH']['__system_admin__'] == 1){
    		return array(1,2,3,4,5);
    	}else{
    		 
    		global $da;
    		if ($com_id == null) {
    			if (isset($_POST['com_id'])) {
    				$com_id = $_POST['com_id'];
    			} else if (isset($_GET['com_id'])) {
    				$com_id = $_GET['com_id'];
    			}
    		}
    		$rs = array();
    		if (isset($_SESSION['CRUD_AUTH']['group']['id'])) {
    			$pDao = new GenericDao('crud_permissions', $da);
    			$params = array();
    			$params['conditions'] = array('group_id = ? and com_id = ?', array((int) $_SESSION['CRUD_AUTH']['group']['id'], $com_id));
    			$params['fields'] = array('permission_type');
    			$rs = $pDao->find($params);
    		}
    		$permissions = array();
    		if (!empty($rs)){
    			foreach ($rs as $v){
    				$permissions[] = $v['permission_type'];
    			}
    		}

    		if (isset($_SESSION['CRUD_AUTH']['id'])) {
    			$pDao = new GenericDao('crud_user_permissions', $da);
    			$params = array();
    			$params['conditions'] = array('user_id = ? and com_id = ?', array((int) $_SESSION['CRUD_AUTH']['id'], $com_id));
    			$params['fields'] = array('permission_type');
    			$rs = $pDao->find($params);
    		}
    		if (!empty($rs)){
    			foreach ($rs as $v){
    				if (!in_array($v['permission_type'], $permissions)){
    					$permissions[] = $v['permission_type'];
    				}
    			}
    		}



    		return $permissions;
    	}
    }

}