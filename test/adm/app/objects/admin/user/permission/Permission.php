<?php

class AdminPermission {

    private $da;
    private $savant;

    public function __construct($da) {
        $auth = Auth::singleton();
        $auth->checkUserManagement();
        
        $this->da = $da;
        $this->savant = new Savant3();
        $this->savant->setPath('template', dirname(__FILE__));
    }

    public function browse() {
        global $config_database;
        
        $groupDao = new GenericDao('crud_groups', $this->da);
        $groups = $groupDao->find();
        $this->savant->groups = $groups;
        
        $comDao = new GenericDao('crud_components', $this->da);
        $this->savant->coms = $comDao->find();
        
        $pDao = new GenericDao('crud_permissions', $this->da);
        
        $rs = $pDao->find();
        $pt = array();
        if (!empty($rs)){
            foreach($rs as $k => $v){
                $pt[$v['group_id'].'_'.$v['com_id'].'_'.$v['permission_type']] = $v['permission_type'];
            }
        }
        
        $this->savant->pt = $pt;

        return $this->savant->getOutput('browse.tpl.php');
    }
    
    public function user_browse(){
    	return $this->savant->getOutput('user_browse.tpl.php');
    }
    
    public function user_json(){
    	$userDao = new GenericDao('crud_users', $this->da);
    	
    	
    	if (!isset($_GET['id'])){
    		$params = array();
    		$params['fields'] = array('id','user_name');
    		$params['conditions'] = array('user_name like ?',array("%".$_GET['q']."%"));
    		$rs = $userDao->find($params);
    		echo $_GET['callback'].'('.json_encode($rs).')';
    	}else{
    		$params = array();
    		$params['fields'] = array('id','user_name','user_manage_flag','user_setting_management','user_global_access');
    		$params['conditions'] = array('id = ?',array($_GET['id']));
    		$rs = $userDao->findFirst($params);
    		
    		$this->savant->user = $rs;
    		
    		$pDao = new GenericDao('crud_user_permissions', $this->da);
    		$params = array();
    		$params['conditions'] = array('user_id = ?',array($_GET['id']));
    		
    		$comDao = new GenericDao('crud_components', $this->da);
    		$this->savant->coms = $comDao->find();
    		
    		$rs = $pDao->find($params);
    		$pt = array();
    		if (!empty($rs)){
    			foreach($rs as $k => $v){
    				$pt[$v['user_id'].'_'.$v['com_id'].'_'.$v['permission_type']] = $v['permission_type'];
    			}
    		}
    		
    		$this->savant->pt = $pt;
    		
    		echo  $this->savant->getOutput('user_permission.tpl.php');
    	}
    }
    
    public function save(){
    	$groupDao = new GenericDao('crud_groups', $this->da);
    	$pDao = new GenericDao('crud_permissions', $this->da);
    	$pDao->execute('TRUNCATE TABLE `crud_permissions`',array());
    	if (count($_POST['data']) > 0){
    		$data = $_POST['data'];
    		foreach ($data as $k => $v) {
    			$group = array();
    			$group['group_manage_flag'] = $v['group_manage_flag'];
    			$group['group_setting_management'] = $v['group_setting_management'];
    			$group['group_global_access'] = $v['group_global_access'];
    			$groupDao->update($group,array('id = ?',array($v['group_id'])));
    			if ($v['group_id'] == $_SESSION['CRUD_AUTH']['group']['id']){
    				$_SESSION['CRUD_AUTH']['group']['group_manage_flag'] = $v['group_manage_flag'];
    				$_SESSION['CRUD_AUTH']['group']['group_setting_management'] = $v['group_setting_management'];
    				$_SESSION['CRUD_AUTH']['group']['group_global_access'] = $v['group_global_access'];
    			}
    			if (count($v['coms']) > 0){
    				$coms = $v['coms'];
    				foreach ($coms as $k1 => $v1){
    					if (count($v1['permission_type']) > 0){
    						foreach ($v1['permission_type'] as $permission){
    							if ((int)$permission > 0){
    								$p = array();
    								$p['group_id'] = $v['group_id'];
    								$p['com_id'] = $v1['com_id'];
    								$p['permission_type'] = $permission;
    								$pDao->save($p);
    							}
    						}
    					}
    				}
    			}
    		}
    	}
    	
    }
    
    public function saveUser(){
    	$userDao = new GenericDao('crud_users', $this->da);
    	$pDao = new GenericDao('crud_user_permissions', $this->da);
    	//$pDao->execute('TRUNCATE TABLE `crud_user_permissions`',array());
    	if (count($_POST['data']) > 0){
    		$data = $_POST['data'];
    		foreach ($data as $k => $v) {
    			$user = array();
    			$user['user_manage_flag'] = $v['user_manage_flag'];
    			$user['user_setting_management'] = $v['user_setting_management'];
    			$user['user_global_access'] = $v['user_global_access'];
    			$userDao->update($user,array('id = ?',array($v['user_id'])));
    			if ($v['user_id'] == $_SESSION['CRUD_AUTH']['id']){
    				$_SESSION['CRUD_AUTH']['user_manage_flag'] = $v['user_manage_flag'];
    				$_SESSION['CRUD_AUTH']['user_setting_management'] = $v['user_setting_management'];
    				$_SESSION['CRUD_AUTH']['user_global_access'] = $v['user_global_access'];
    			}
    			$pDao->execute('DELETE FROM `crud_user_permissions` WHERE user_id = ?',array($v['user_id']));
    			if (count($v['coms']) > 0){
    				$coms = $v['coms'];
    				foreach ($coms as $k1 => $v1){
    					if (count($v1['permission_type']) > 0){
    						foreach ($v1['permission_type'] as $permission){
    							if ((int)$permission > 0){
    								$p = array();
    								$p['user_id'] = $v['user_id'];
    								$p['com_id'] = $v1['com_id'];
    								$p['permission_type'] = $permission;
    								$pDao->save($p);
    							}
    						}
    					}
    				}
    			}
    		}
    	}
    	
    }
    

}