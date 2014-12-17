<?php
class Localidades extends BaseModel  {
	
	protected $table = 'localidades';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT localidades.* FROM localidades  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE localidades.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
