
  <div class="page-content">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
    </div>

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('config/dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('banner') }}">{{ $pageTitle }}</a></li>
        <li class="active">{{ Lang::get('core.addedit') }} </li>
      </ul>
	</div>  
	@if(Session::has('message'))	  
		   {{ Session::get('message') }}
	@endif	
	<div class="panel-default panel">
		<div class="panel-body">

		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		 {{ Form::open(array('url'=>'banner/save/'.SiteHelpers::encryptID($row['id']), 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
				<div class="col-md-12">
						<fieldset><legend> banner</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-8">
									  {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Posicion Banner" class=" control-label col-md-4 text-left"> Posicion Banner </label>
									<div class="col-md-8">
									  <select name='posicion_banner' rows='5' id='posicion_banner' code='{$posicion_banner}' 
							class='select2 '  requred  ></select> 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Tipo" class=" control-label col-md-4 text-left"> Tipo </label>
									<div class="col-md-8">
									  <select name='tipo' rows='5' id='tipo' code='{$tipo}' 
							class='select2 '  requred  ></select> 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Titulo" class=" control-label col-md-4 text-left"> Titulo </label>
									<div class="col-md-8">
									  {{ Form::text('titulo', $row['titulo'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Fecha Inicio" class=" control-label col-md-4 text-left"> Fecha Inicio </label>
									<div class="col-md-8">
									  
				{{ Form::text('fecha_inicio', $row['fecha_inicio'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Fecha Fin" class=" control-label col-md-4 text-left"> Fecha Fin </label>
									<div class="col-md-8">
									  
				{{ Form::text('fecha_fin', $row['fecha_fin'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Subir Archivo" class=" control-label col-md-4 text-left"> Subir Archivo </label>
									<div class="col-md-8">
									  <input  type='file' name='codigo' id='codigo' class=''  
					 style='width:150px !important;'  />
					{{ SiteHelpers::showUploadedFile($row['codigo'],'uploads/files') }}
				 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Activo" class=" control-label col-md-4 text-left"> Activo </label>
									<div class="col-md-8">
									  <select name='activo' rows='5' id='activo' code='{$activo}' 
							class='select2 '    ></select> 
									 </div> 
								  </div> </fieldset>
			</div>
			
			
			<div style="clear:both"></div>	
				
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<button type="submit" class="btn btn-primary ">  {{ Lang::get('core.sb_save') }} </button>
				<button type="button" onclick="location.href='{{ URL::to('banner') }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
		</div>
	</div>	
</div>				 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#posicion_banner").jCombo("{{ URL::to('banner/comboselect?filter=posicionbanner:id:nombre') }}",
		{  selected_value : '{{ $row["posicion_banner"] }}' });
		
		$("#tipo").jCombo("{{ URL::to('banner/comboselect?filter=tipobanner:id:nombre') }}",
		{  selected_value : '{{ $row["tipo"] }}' });
		
		$("#activo").jCombo("{{ URL::to('banner/comboselect?filter=bannerestado:id:nombre') }}",
		{  selected_value : '{{ $row["activo"] }}' });
		 
	});
	</script>		 