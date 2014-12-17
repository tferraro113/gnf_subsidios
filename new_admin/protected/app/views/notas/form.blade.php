
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
		<li><a href="{{ URL::to('notas') }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'notas/save/'.SiteHelpers::encryptID($row['id']), 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
				<div class="col-md-12">
						<fieldset><legend> Notas</legend>
								
								  <div class="form-group hidethis " style="display:none;">
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-8">
									  {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
								  </div> 					
								  <div class="form-group hidethis " style="display:none;">
									<label for="Contacto Id" class=" control-label col-md-4 text-left"> Contacto Id </label>
									<div class="col-md-8">
										@if(isset($contacto_id))
									  		{{ Form::text('contacto_id', $contacto_id ,array('class'=>'form-control', 'placeholder'=>'',   )) }} 
										@else
											{{ Form::text('contacto_id',$row['contacto_id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									  	@endif
											
									   
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Nota" class=" control-label col-md-4 text-left"> Nota </label>
									<div class="col-md-8">
									  <textarea name='nota' rows='2' id='nota' class='form-control '  
				           >{{ $row['nota'] }}</textarea> 
									 </div> 
								  </div> </fieldset>
			</div>
			
			
			<div style="clear:both"></div>	
				
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<button type="submit" class="btn btn-primary ">  {{ Lang::get('core.sb_save') }} </button>

				<?php
						if(isset($contacto_id)){
								$contacto_id  = SiteHelpers::encryptID($contacto_id);
								$url = 'notas?md=Contactos+id+notas+contacto_id+'.$contacto_id;
								$url = URL::to($url);
						}else{
							$contacto_id = $row['contacto_id'];
							$contacto_id  = SiteHelpers::encryptID($contacto_id);
							$url = 'notas?md=Contactos+id+notas+contacto_id+'.$contacto_id ;
							$url = URL::to($url);
						}
						
				?>

				<a class="btn btn-success " href="<?= $url ?>" >Cancelar</a>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
		</div>
	</div>	
</div>				 
   <script type="text/javascript">
	$(document).ready(function() { 
		 
	});
	</script>		 