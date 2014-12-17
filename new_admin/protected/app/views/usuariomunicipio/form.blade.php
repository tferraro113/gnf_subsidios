
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
		<li><a href="{{ URL::to('usuariomunicipio') }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'usuariomunicipio/save/'.SiteHelpers::encryptID($row['id']), 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
				<div class="col-md-12">
						<fieldset><legend> usMun</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-8">
									  {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Usuario" class=" control-label col-md-4 text-left"> Usuario </label>
									<div class="col-md-8">
									  <select name='usuario' rows='5' id='usuario' code='{$usuario}' 
							class='select2 '  requred  ></select> 
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Municipio" class=" control-label col-md-4 text-left"> Municipio </label>
									<div class="col-md-8">
									  <select name='municipio' rows='5' id='municipio' code='{$municipio}' 
							class='select2 '  requred  ></select> 
									 </div> 
								  </div> </fieldset>
			</div>
			
			
			<div style="clear:both"></div>	
				
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<button type="submit" class="btn btn-primary ">  {{ Lang::get('core.sb_save') }} </button>
				<button type="button" onclick="location.href='{{ URL::to('usuariomunicipio') }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
		</div>
	</div>	
</div>				 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#usuario").jCombo("{{ URL::to('usuariomunicipio/comboselect?filter=tb_users:id:username') }}",
		{  selected_value : '{{ $row["usuario"] }}' });
		
		$("#municipio").jCombo("{{ URL::to('usuariomunicipio/comboselect?filter=municipios:id:nombre') }}",
		{  selected_value : '{{ $row["municipio"] }}' });
		 
	});
	</script>		 