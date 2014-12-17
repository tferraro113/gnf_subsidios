
  <div class="page-content">
    <!-- Page header -->
   
	@if(Session::has('message'))	  
		   {{ Session::get('message') }}
	@endif

	<?php

		$usuarios = array( 0 => 'Seleccione') +  DB::table('tb_users')->orderBy('username', 'asc')->lists('username','id');
		$municipios = array(0  => 'Seleccione') + DB::table('municipios')->orderBy('nombre', 'asc')->lists('nombre','id');
		$localidades = array('default' => 'Seleccione') + DB::table('localidades')->orderBy('nombre', 'asc')->lists('nombre','id');

		$url = URL::to('localidadesxid/');

	?>


	<div stlye="display:none;" id="localidades_url" data-url="{{ $url }}"></div>
	<br>
	<h2>Seleccione los filtros para generar su reporte</h2>
	<br>
	{{ Form::open(array('url'=>'reportes/generate','method'=>'post', 'class'=>'form-horizontal','style'=>'width:400px;' ,'id' =>'SximoTable' )) }}

	<h4>Intervalo en el que fue generado</h4>
	<div class="form-group  " >
									<label for="fecha_desde" class=" control-label col-md-4 text-left">Fecha Desde </label>
									<div class="col-md-8">
									  
				{{ Form::text('fecha_desde', '',array('class'=>'form-control date', 'style'=>'width:150px !important;')) }} 
									 </div> 
	  </div> 		
	  <div class="form-group  " >
									<label for="fecha_hasta" class=" control-label col-md-4 text-left">Fecha Hasta </label>
									<div class="col-md-8">
									  
				{{ Form::text('fecha_hasta', '',array('class'=>'form-control date', 'style'=>'width:150px !important;')) }} 
									 </div> 
    </div> 			
	<div class="form-group  " >
									<label for="created_by" class=" control-label col-md-4 text-left">Usuario que generó el contacto </label>
									<div class="col-md-8">
									  
				{{ Form::select('created_by', $usuarios, 'default') }}
									 </div> 
	  </div> 
	  <div class="form-group  " >
									<label for="usuario_gestiona" class=" control-label col-md-4 text-left">Usuario que gestiona el contacto </label>
									<div class="col-md-8">
									  
				{{ Form::select('usuario_gestiona', $usuarios, 'default') }}
									 </div> 
	  </div> 

	  <div class="form-group  " >
									<label for="municipio" class=" control-label col-md-4 text-left">Municipio</label>
									<div class="col-md-8">
									  
				{{ Form::select('municipio', $municipios , Input::old('municipio'), array('id'=>'municipio')) }}
									 </div> 
	  </div> 	
	  <div class="form-group  " >
									<label for="localidad" class=" control-label col-md-4 text-left">Localidad</label>
									<div class="col-md-8">
									  
				{{ Form::select('localidad', $localidades , Input::old('localidad'), array('id'=>'localidad')) }}
									 </div> 
	  </div> 
		
		{{ Form::submit('Generar', array('class'=>'btn btn-success')) }}

	

	{{ Form::close() }}
	
	</div>	  
	
<script>
$(document).ready(function(){

	$('.do-quick-search').click(function(){
		$('#SximoTable').attr('action','{{ URL::to("reportes/multisearch")}}');
		$('#SximoTable').submit();
	});
	
});	
</script>		