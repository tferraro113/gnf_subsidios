<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

if(CNF_MULTILANG ==1)
{
	$lang = (Session::get('lang') != "" ? Session::get('lang') : CNF_LANG );
	App::setLocale( $lang ); 
} 



Route::controller('user', 'UserController'); 
Route::get('/', 'HomeController@index');
Route::controller('home', 'HomeController');
include('pageroutes.php');
Route::group(array('before' => 'auth'), function() 
{
	/* CORE APPLICATION DONT DELETE IT */
	Route::controller('pages', 'PagesController');
	Route::controller('users', 'UsersController');
	Route::controller('groups', 'GroupsController');
	Route::controller('menu', 'MenuController');
	Route::controller('module', 'ModuleController');
	Route::controller('config', 'ConfigController');
	Route::controller('logs', 'LogsController');

	/* END CORE APPLICATION  *

	
	/* Dynamic Routers */
	Route::get('localidadesxid/{id}', function($id)
	{
		$localidades = DB::table('localidades')->where('municipio_id', '=', $id)->get();

		$val="";
		$val .= "<option value= \"0\" > Seleccione </option>";
		foreach ($localidades as $localidad) {
			$nombre = $localidad->nombre;
			$id = $localidad->id ;
			$val .= "<option value= \"$id\" > $nombre </option>";
		}
			
		return $val;	

	});

	Route::get('import', 'importController@archivos');

	include('moduleroutes.php');
});	
