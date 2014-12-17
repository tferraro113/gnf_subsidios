<?php
class Archivos extends BaseModel  {
	
	protected $table = 'archivos';
	protected $primaryKey = 'id';
	public $timestamps = false;

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT archivos.* FROM archivos  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE archivos.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
