<?php
class AdminMenu{
    
    private $da;
    private $savant;

    public function __construct($da) {
        $this->da = $da;
        $this->savant = new Savant3();
        $this->savant->setPath('template', dirname(__FILE__));
    }
    
    public function show($type = 'dashboard'){
    	global $config_database;
    	
        $this->savant->type = $type;
        $dao = new Dao($this->da);
        $this->savant->tables = $dao->listTables();
        $comDao = new GenericDao('crud_components', $this->da);
        
        $rs = $comDao->find();
        $coms = array();
        foreach ($rs as $v){
        	if (file_exists(__DATABASE_CONFIG_PATH__ . '/' . $config_database['default']["database"] . '/' .sha1('com_'.$v['id']).'/'.$v['component_table'].'.php' )) {
        		$coms[] = $v;
        	}
        }
        
        $groupComDao = new GenericDao('crud_group_components', $this->da);
        $rs = $groupComDao->find();
        
        $mnuGroup = array();
        $exComs = array();
        foreach ($rs as $v){
        	$mnuGroup[$v['id']] = $v;
        	$mnuGroup[$v['id']]['coms'] = array();
        	foreach ($coms as $com){
        		if ($v['id'] == $com['group_id']){
        			$mnuGroup[$v['id']]['coms'][] = $com;
        			$exComs[] = $com['id'];
        		}
        	}
        }
        
        $this->savant->mnuGroup = $mnuGroup;
        $this->savant->exComs = $exComs;
        $this->savant->coms = $coms;
        
        
        return $this->savant->getOutput('menu.tpl.php');
    }

}