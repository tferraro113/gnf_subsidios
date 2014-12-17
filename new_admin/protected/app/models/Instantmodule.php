<?php
class Instantmodule extends BaseModel  {
	
	protected $table = 'tb_module';
	protected $primaryKey = 'module_id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT tb_module.* FROM tb_module  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE tb_module.module_id IS NOT NULL and tb_module.module_type = 'addon' and tb_module.module_name != 'instantmodule'  ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
