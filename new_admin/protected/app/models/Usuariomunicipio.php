<?php
class Usuariomunicipio extends BaseModel  {
	
	protected $table = 'usuario_municipio';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT usuario_municipio.* FROM usuario_municipio  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE usuario_municipio.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
