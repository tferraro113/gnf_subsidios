<?php
class LocalidadesxmController extends BaseController {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'Contactos';
	static $per_page	= '10';
	
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Contactos();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'	=> 'Contactos',
		);
			
				
	} 

	
	public function getIndex($id)
	{
		dd($id);

	}		
	

	
		
}