<?php
class Reportes extends BaseModel  {
	
	protected $table = 'reportes';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT reportes.* FROM reportes  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE reportes.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
