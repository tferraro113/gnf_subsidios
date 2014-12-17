<?php
class ReportesController extends BaseController {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'reportes';
	static $per_page	= '10';
	
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Reportes();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'	=> 'reportes',
		);
			
				
	} 

	
	public function getIndex()
	{
		if($this->access['is_view'] ==0) 
			return Redirect::to('')
				->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));
				
		// Filter sort and order for query 
		$sort = (!is_null(Input::get('sort')) ? Input::get('sort') : 'id'); 
		$order = (!is_null(Input::get('order')) ? Input::get('order') : 'asc');
		// End Filter sort and order for query 
		// Filter Search for query		
		$filter = (!is_null(Input::get('search')) ? $this->buildSearch() : '');
		// End Filter Search for query 
		
		// Take param master detail if any
		$master  = $this->buildMasterDetail(); 
		// append to current $filter
		$filter .=  $master['masterFilter'];
	
		
		$page = Input::get('page', 1);
		$params = array(
			'page'		=> $page ,
			'limit'		=> (!is_null(Input::get('rows')) ? filter_var(Input::get('rows'),FILTER_VALIDATE_INT) : static::$per_page ) ,
			'sort'		=> $sort ,
			'order'		=> $order,
			'params'	=> $filter,
			'global'	=> (isset($this->access['is_global']) ? $this->access['is_global'] : 0 )
		);
		// Get Query 
		$results = $this->model->getRows( $params );		
		
		// Build pagination setting
		$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;	
		$pagination = Paginator::make($results['rows'], $results['total'],$params['limit']);		
		
		
		$this->data['rowData']		= $results['rows'];
		// Build Pagination 
		$this->data['pagination']	= $pagination;
		// Build pager number and append current param GET
		$this->data['pager'] 		= $this->injectPaginate();	
		// Row grid Number 
		$this->data['i']			= ($page * $params['limit'])- $params['limit']; 
		// Grid Configuration 
		$this->data['tableGrid'] 	= $this->info['config']['grid'];
		$this->data['tableForm'] 	= $this->info['config']['forms'];
		$this->data['colspan'] 		= SiteHelpers::viewColSpan($this->info['config']['grid']);		
		// Group users permission
		$this->data['access']		= $this->access;
		// Detail from master if any
		$this->data['details']		= $master['masterView'];
		// Master detail link if any 
		$this->data['subgrid']	= (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array()); 
		// Render into template
		$this->layout->nest('content','reportes.index',$this->data)
						->with('menus', SiteHelpers::menus());
	}		
	

	function getAdd( $id = null)
	{
	
		if($id =='')
		{
			if($this->access['is_add'] ==0 )
			return Redirect::to('')->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));
		}	
		
		if($id !='')
		{
			if($this->access['is_edit'] ==0 )
			return Redirect::to('')->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));
		}				
			
		$id = ($id == null ? '' : SiteHelpers::encryptID($id,true)) ;
		
		$row = $this->model->find($id);
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('reportes'); 
		}
		$this->data['id'] = $id;
		$this->layout->nest('content','reportes.form',$this->data)->with('menus', $this->menus );	
	}
	
	function getShow( $id = null)
	{
	
		if($this->access['is_detail'] ==0) 
			return Redirect::to('')
				->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));
					
		$ids = ($id == null ? '' : SiteHelpers::encryptID($id,true)) ;
		$row = $this->model->getRow($ids);
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('reportes'); 
		}
		$this->data['id'] = $id;
		$this->data['access']		= $this->access;
		$this->layout->nest('content','reportes.view',$this->data)->with('menus', $this->menus );	
	}	
	
	function postGenerate()
	{
	



	$query = DB::table('contactos')
		->leftJoin('tb_users', 'tb_users.id', '=', 'contactos.usuario_gestiona')
		->leftJoin('municipios', 'municipios.id', '=', 'contactos.municipio_id')
		->leftJoin('localidades', 'localidades.id', '=', 'contactos.localidad_id')
		->leftJoin('tipo_doc', 'tipo_doc.id', '=', 'contactos.tipo_documento') 
		->leftJoin('poseegas', 'poseegas.id', '=', 'contactos.posee_gas')
		->leftJoin('tb_users as u1', 'u1.id', '=', 'contactos.created_by')
		->leftJoin('sexo', 'sexo.id', '=', 'contactos.sexo');




	if(Input::get('created_by') != 0 ){
		$query->where('contactos.created_by', Input::get('created_by') );
	}

	if(Input::get('usuario_gestiona') != 0 ){
		$query->where('contactos.usuario_gestiona', Input::get('usuario_gestiona') );
	}

	if(Input::get('fecha_desde') != "" && Input::get('fecha_hasta') != "" ){

		$from = date( 'Y-m-d', strtotime(Input::get('fecha_desde')));
  		$to = date( 'Y-m-d', strtotime(Input::get('fecha_hasta')));

		$query->whereBetween('contactos.created', array($from, $to));	
	}


	$results= $query->get(array('contactos.id','contactos.nombre','contactos.consulta','contactos.created','contactos.apellido','sexo.nombre as sexo','contactos.fecha_nacimiento','tipo_doc.nombre as tipo_doc','contactos.numero','contactos.telefono'
		,'contactos.mail','municipios.nombre as municipio','localidades.nombre as localidad','contactos.calle','contactos.numero_calle','contactos.complemento','contactos.entre_calles'
		,'contactos.instalacion_coccion','contactos.instalacion_aguacaliente','contactos.estado','contactos.instalacion_calefaccion','poseegas.nombre as posee_gas','u1.username as created_by','tb_users.username as gestiona'));


	$objPHPExcel = new PHPExcel();
	//$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet(0)->getStyle('A1:V1')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet(0)->getStyle('A1:V1')->getFont()->setSize(10);

	for($col = 'A'; $col !== 'W'; $col++) {
    $objPHPExcel->getActiveSheet()
        ->getColumnDimension($col)
        ->setAutoSize(true);
	}	

	$rowCount = 1;

	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, 'Nombre');
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, 'Apellido' );
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, 'Sexo');
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, 'Fecha Nacimiento');
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, 'Tipo Doc');
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, 'Nro Doc');
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, 'Teléfono');
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, 'Mail' );
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, 'Municipio');
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, 'Localidad' );
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, 'Calle');
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, 'Numero' );
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, 'Complemento');
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, 'Inst. Cocción' );
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, 'Inst. Agua Caliente' );
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, 'Inst. Calefacción' );
	$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, 'Posee Gas' );
	$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, 'Estado' );
	$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, 'Gestiona' );
	$objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, 'Consulta' );
	$objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, 'Creado Por' );
	$objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, 'Creado' );
	$objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, 'Notas' );


	$rowCount = 2;

	foreach ($results as $result) {
	    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $result->nombre);
	    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $result->apellido);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $result->sexo);
	    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $result->fecha_nacimiento);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $result->tipo_doc);
	    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $result->numero);
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $result->telefono);
	    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $result->mail);
	    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $result->municipio);
	    $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $result->localidad);
	    $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $result->calle);
	    $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $result->numero_calle);
	    $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $result->complemento);
	    $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $result->instalacion_coccion);
	    $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $result->instalacion_aguacaliente);
	    $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $result->instalacion_calefaccion);
	    $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $result->posee_gas);
	    $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $result->estado);
	    $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $result->gestiona);
	    $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, strip_tags($result->consulta));
	    $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $result->created_by);
	    $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $result->created);

	    $notas = Notas::where('contacto_id','=',$result->id)->get();

	    $note_text = "";
	    foreach ($notas as $nota) {
	    	$note_text .= $nota->created.': '.strip_tags($nota->nota)."\n";
	    }

	    $objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $note_text);


	    $rowCount++;
	}
	//$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);



	// redirect output to client browser
	// redirect output to client browser
	@header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	@header('Content-Disposition: attachment;filename="reporte.xlsx"');
	@header('Cache-Control: max-age=0');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');

	die($objWriter);
	//return Redirect::to('archivos');


	//$objWriter->save('some_excel_file.xlsx');


	/*
	$query->where('yyyy','aaa');

	$results = $query->get();

	dd(Input::get('fecha_desde'));

	if(Input::get('fecha_desde')){
		dd('true');
	}

	
  	$contactos = Contactos::
  				where('')
  				whereBetween('created', array($from, $to))->get();	

		dd($contactos);
	*/
	}
	
	public function postDestroy()
	{
		
		if($this->access['is_remove'] ==0) 
			return Redirect::to('')
				->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));		
		// delete multipe rows 
		$this->model->destroy(Input::get('id'));
		$this->inputLogs("ID : ".implode(",",Input::get('id'))."  , Has Been Removed Successfull");
		// redirect
		Session::flash('message', SiteHelpers::alert('success',Lang::get('core.note_success_delete')));
		return Redirect::to('reportes');
	}			
		
}