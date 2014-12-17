<?php
class Municipios extends BaseModel  {
	
	protected $table = 'municipios';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT municipios.* FROM municipios  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE municipios.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
