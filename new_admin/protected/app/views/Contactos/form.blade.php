
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
		<li><a href="{{ URL::to('Contactos') }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'Contactos/save/'.SiteHelpers::encryptID($row['id']), 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
				<div class="col-md-4">
						<fieldset><legend> Contactos</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-8">
									  {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Nombre" class=" control-label col-md-4 text-left"> Nombre </label>
									<div class="col-md-8">
									  {{ Form::text('nombre', $row['nombre'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Apellido" class=" control-label col-md-4 text-left"> Apellido </label>
									<div class="col-md-8">
									  {{ Form::text('apellido', $row['apellido'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Sexo" class=" control-label col-md-4 text-left"> Sexo </label>
									<div class="col-md-8">
									  <select name='sexo' rows='5' id='sexo' code='{$sexo}' 
							class='select2 '  requred  ></select> 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Fecha Nacimiento" class=" control-label col-md-4 text-left"> Fecha Nacimiento </label>
									<div class="col-md-8">
									  
				{{ Form::text('fecha_nacimiento', $row['fecha_nacimiento'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Tipo Documento" class=" control-label col-md-4 text-left"> Tipo Documento </label>
									<div class="col-md-8">
									  <select name='tipo_documento' rows='5' id='tipo_documento' code='{$tipo_documento}' 
							class='select2 '  requred  ></select> 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Numero" class=" control-label col-md-4 text-left"> Numero </label>
									<div class="col-md-8">
									  {{ Form::text('numero', $row['numero'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Telefono" class=" control-label col-md-4 text-left"> Telefono </label>
									<div class="col-md-8">
									  {{ Form::text('telefono', $row['telefono'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Mail" class=" control-label col-md-4 text-left"> Mail </label>
									<div class="col-md-8">
									  {{ Form::text('mail', $row['mail'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'email'   )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Estado" class=" control-label col-md-4 text-left"> Estado </label>
									<div class="col-md-8">
									  <select name='estado' rows='5' id='estado' code='{$estado}' 
							class='select2 '    ></select> 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Usuario Gestiona" class=" control-label col-md-4 text-left"> Usuario Gestiona </label>
									<div class="col-md-8">
									  <select name='usuario_gestiona' rows='5' id='usuario_gestiona' code='{$usuario_gestiona}' 
							class='select2 '    ></select> 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Consulta" class=" control-label col-md-4 text-left"> Consulta </label>
									<div class="col-md-8">
									  <textarea name='consulta' rows='2' id='consulta' class='form-control '  
				           >{{ $row['consulta'] }}</textarea> 
									 </div> 
								  </div> </fieldset>
			</div>
			
			<div class="col-md-4">
						<fieldset><legend> Direccion</legend>
									
								  <div class="form-group  " >
									<label for="Municipio" class=" control-label col-md-4 text-left"> Municipio </label>
									<div class="col-md-8">
									  <select name='municipio_id' rows='5' id='municipio_id' code='{$municipio_id}' 
							class='select2 '  requred  ></select> 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Localidad" class=" control-label col-md-4 text-left"> Localidad </label>
									<div class="col-md-8">
									  <select name='localidad_id' rows='5' id='localidad_id' code='{$localidad_id}' 
							class='select2 '  requred  ></select> 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Calle" class=" control-label col-md-4 text-left"> Calle </label>
									<div class="col-md-8">
									  {{ Form::text('calle', $row['calle'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Numero Calle" class=" control-label col-md-4 text-left"> Numero Calle </label>
									<div class="col-md-8">
									  {{ Form::text('numero_calle', $row['numero_calle'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Complemento" class=" control-label col-md-4 text-left"> Complemento </label>
									<div class="col-md-8">
									  {{ Form::text('complemento', $row['complemento'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Entre Calles" class=" control-label col-md-4 text-left"> Entre Calles </label>
									<div class="col-md-8">
									  {{ Form::text('entre_calles', $row['entre_calles'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
									 </div> 
								  </div> </fieldset>
			</div>
			
			<div class="col-md-4">
						<fieldset><legend> Instalacion</legend>
									
								  <div class="form-group  " >
									<label for="Instalacion Coccion" class=" control-label col-md-4 text-left"> Instalacion Coccion </label>
									<div class="col-md-8">
									  {{ Form::text('instalacion_coccion', $row['instalacion_coccion'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Instalacion AguaCaliente" class=" control-label col-md-4 text-left"> Instalacion AguaCaliente </label>
									<div class="col-md-8">
									  {{ Form::text('instalacion_aguaCaliente', $row['instalacion_aguaCaliente'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Instalacion Calefaccion" class=" control-label col-md-4 text-left"> Instalacion Calefaccion </label>
									<div class="col-md-8">
									  {{ Form::text('instalacion_calefaccion', $row['instalacion_calefaccion'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Posee Gas" class=" control-label col-md-4 text-left"> Posee Gas </label>
									<div class="col-md-8">
									  <select name='posee_gas' rows='5' id='posee_gas' code='{$posee_gas}' 
							class='select2 '  requred  ></select> 
									 </div> 
								  </div> </fieldset>
			</div>
			
			
			<div style="clear:both"></div>	
				
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<button type="submit" class="btn btn-primary ">  {{ Lang::get('core.sb_save') }} </button>
				<button type="button" onclick="location.href='{{ URL::to('Contactos') }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
		</div>
	</div>	
</div>				 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#sexo").jCombo("{{ URL::to('Contactos/comboselect?filter=sexo:id:nombre') }}",
		{  selected_value : '{{ $row["sexo"] }}' });
		
		$("#tipo_documento").jCombo("{{ URL::to('Contactos/comboselect?filter=tipo_doc:id:nombre') }}",
		{  selected_value : '{{ $row["tipo_documento"] }}' });
		
		$("#municipio_id").jCombo("{{ URL::to('Contactos/comboselect?filter=municipios:id:nombre') }}",
		{  selected_value : '{{ $row["municipio_id"] }}' });
		
		$("#localidad_id").jCombo("{{ URL::to('Contactos/comboselect?filter=localidades:id:nombre') }}",
		{  selected_value : '{{ $row["localidad_id"] }}' });
		
		$("#posee_gas").jCombo("{{ URL::to('Contactos/comboselect?filter=poseegas:id:nombre') }}",
		{  selected_value : '{{ $row["posee_gas"] }}' });
		
		$("#estado").jCombo("{{ URL::to('Contactos/comboselect?filter=estado:id:estado') }}",
		{  selected_value : '{{ $row["estado"] }}' });
		
		$("#usuario_gestiona").jCombo("{{ URL::to('Contactos/comboselect?filter=tb_users:id:username') }}",
		{  selected_value : '{{ $row["usuario_gestiona"] }}' });
		 
	});
	</script>		 