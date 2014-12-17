<?php
class AdminComponent {
	private $da;
	private $savant;
	
	public function __construct($da) {
		$auth = Auth::singleton();
		$auth->checkToolManagement();
		
		$this->da = $da;
		$this->savant = new Savant3();
		$this->savant->setPath('template', dirname(__FILE__));
	}
	public function builder(){
		global $config_database;
		$conf = array();
        if (!file_exists(__DATABASE_CONFIG_PATH__ . '/' . $config_database['default']["database"] . '/' . $_GET['table'] . '.php')) {
            exit;
        }else{
        	require __DATABASE_CONFIG_PATH__ . '/' . $config_database['default']["database"] . '/' . $_GET['table'] . '.php';
        }

        $conf['theme_path'] = dirname(__FILE__).'/templates/builder';
        $conf['tool_bar_position'] = array(90,24);
        $scurd = new Scurd($_GET['table'], $conf, $this->da);

        $this->savant->content = $scurd->process();
		
		return $this->savant->getOutput('builder.tpl.php');
	}
	
	public function groups(){
		global $config_database;
		
		$conf = array();
		
		if (!file_exists(__DATABASE_CONFIG_PATH__ . '/' . $config_database['default']["database"] . '/' . $_GET['table'] . '.php')) {
			exit;
		}else{
			require __DATABASE_CONFIG_PATH__ . '/' . $config_database['default']["database"] . '/' . $_GET['table'] . '.php';
		}
		
		$conf['theme_path'] = dirname(__FILE__).'/templates/groups';
		$scurd = new Scurd($_GET['table'], $conf, $this->da);
		
		$this->savant->content = $scurd->process();
		
		return $this->savant->getOutput('groups.tpl.php');
	}
}