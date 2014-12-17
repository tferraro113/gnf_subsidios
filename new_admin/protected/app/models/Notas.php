<?php
class Notas extends BaseModel  {
	
	protected $table = 'notas';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT notas.* FROM notas  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE notas.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
