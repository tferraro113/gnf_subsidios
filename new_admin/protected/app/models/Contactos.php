<?php
class Contactos extends BaseModel  {
	
	protected $table = 'contactos';
	protected $primaryKey = 'id';
	public $timestamps = false;

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT contactos.* FROM contactos  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE contactos.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
