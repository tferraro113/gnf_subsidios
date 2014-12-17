<?php
class AdminLanguage {

	private $da;
	private $savant;

	public function __construct($da) {
		$auth = Auth::singleton();
		$auth->checkToolManagement();

		$this->da = $da;
		$this->savant = new Savant3();
		$this->savant->setPath('template', dirname(__FILE__));
	}

	public function browse() {
		global $config_database;
		
		$conf = array();
		
		if (!file_exists(__DATABASE_CONFIG_PATH__ . '/' . $config_database['default']["database"] . '/' . $_GET['table'] . '.php')) {
			exit;
		}else{
			require __DATABASE_CONFIG_PATH__ . '/' . $config_database['default']["database"] . '/' . $_GET['table'] . '.php';
		}
		
		$conf['theme_path'] = dirname(__FILE__).'/templates';
		$conf['global_access'] = true;
		$scurd = new Scurd($_GET['table'], $conf, $this->da);
		
		$this->savant->content = $scurd->process();
		
		return $this->savant->getOutput('browse.tpl.php');
	}
	
	public function translate(){
		$lang = Lang::singleton();
		if (isPost()){
			$var = array();
			$var['error'] = 0;
			$language = $_POST;
			unset($language['language_code']);
			$language_file = APP.'/languages/lang.'.$_POST['language_code'].'.php';
			
			if (!is_writable($language_file)) {
				$var['error'] = 1;
				$var['error_message'] = sprintf($lang->line('file_is_not_allowed_write'), $language_file);
			}
			if (file_exists($language_file) && $var['error'] == 0){
				file_put_contents($language_file, "<?php \n");
				foreach ($language as $key => $lang){
					$lang = str_replace("'", "&#039;", $lang);
$message =<<<HTML
\$lang['$key'] = '$lang'; \n
HTML;
				file_put_contents($language_file, $message, FILE_APPEND);
					
				}
$message =<<<HTML
\$lang['date_text'] = array('days' => array(\$lang['datepicker_sunday'], \$lang['datepicker_monday'], \$lang['datepicker_tuesday'], \$lang['datepicker_wednesday'], \$lang['datepicker_thursday'], \$lang['datepicker_friday'],  \$lang['datepicker_saturday'], \$lang['datepicker_sunday']), \n
							'daysShort' => array(\$lang['datepicker_sun'], \$lang['datepicker_mon'], \$lang['datepicker_tue'], \$lang['datepicker_wed'], \$lang['datepicker_thu'], \$lang['datepicker_fri'], \$lang['datepicker_sat'], \$lang['datepicker_sun']), \n
							'daysMin' => array(\$lang['datepicker_su'], \$lang['datepicker_mo'], \$lang['datepicker_tu'], \$lang['datepicker_we'], \$lang['datepicker_th'], \$lang['datepicker_fr'], \$lang['datepicker_sa'], \$lang['datepicker_su']), \n
							'months' => array(\$lang['datepicker_january'], \$lang['datepicker_february'], \$lang['datepicker_march'], \$lang['datepicker_april'], \$lang['datepicker_may'], \$lang['datepicker_june'], \$lang['datepicker_july'], \$lang['datepicker_august'], \$lang['datepicker_september'], \$lang['datepicker_october'], \$lang['datepicker_november'], \$lang['datepicker_december']), \n
							'monthsShort' => array(\$lang['datepicker_jan'], \$lang['datepicker_feb'], \$lang['datepicker_mar'], \$lang['datepicker_apr'], \$lang['datepicker_may'], \$lang['datepicker_jun'], \$lang['datepicker_jul'], \$lang['datepicker_aug'], \$lang['datepicker_sep'], \$lang['datepicker_oct'], \$lang['datepicker_nov'], \$lang['datepicker_dec'])); \n
HTML;
				file_put_contents($language_file, $message, FILE_APPEND);
				
			}
			
			echo json_encode($var);
			exit;
		}else{
			$langDao = new GenericDao('crud_languages', $this->da);
			$params = array();
			$params['conditions'] = array('id = ?', array(trim($_GET['id'])));
			$rs = $langDao->findFirst($params);
			$this->savant->rs = $rs;
			
			$lang = array();
			if (!empty($rs)){
				if (file_exists(APP.'/languages/lang.default.php')){
					require APP.'/languages/lang.default.php';
				}
			}
			$this->savant->lang_default = $lang;
			
			$lang = array();
			if (!empty($rs)){
				if (file_exists(APP.'/languages/lang.'.$rs['language_code'].'.php')){
					require APP.'/languages/lang.'.$rs['language_code'].'.php';
				}
			}
			$this->savant->lang = $lang;
			
			
			
			
			return $this->savant->getOutput('translate.tpl.php');
		}
	}
}