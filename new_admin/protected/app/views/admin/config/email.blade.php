
  <div class="page-content">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ Lang::get('core.t_blastemail') }}  <small>{{ Lang::get('core.t_blastemailsmall'); }}</small></h3>
      </div>
    </div>

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('config/dashboard') }}">{{ Lang::get('core.home'); }}</a></li>
		<li><a href="{{ URL::to('config') }}">{{ Lang::get('core.t_blastemail') }}</a></li>
      </ul>
	</div>  
	@if(Session::has('message'))
	  
		   {{ Session::get('message') }}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		
<div class="block-content">
	<ul class="nav nav-tabs" >
	  <li ><a href="{{ URL::to('config')}}">{{ Lang::get('core.tab_siteinfo'); }} </a></li>
	  <li class="active"><a href="{{ URL::to('config/email') }}" >{{ Lang::get('core.tab_email'); }}</a></li>
	  <li ><a href="{{ URL::to('config/security') }}" > {{ Lang::get('core.tab_loginsecurity'); }}  </a></li>
	</ul>	
<div class="tab-content">
	  <div class="tab-pane active use-padding" id="info">	
	 {{ Form::open(array('url'=>'config/email/', 'class'=>'form-vertical row')) }}
	
	<div class="col-sm-6">
	
		<fieldset > <legend> New Account Registered Info </legend>
		  <div class="form-group">
			<label for="ipt" class=" control-label"> {{ Lang::get('core.tab_email'); }} </label>		
			<textarea rows="10" name="regEmail" class="form-control input-sm ">{{ $regEmail }}</textarea>		
		  </div>  
		

		<div class="form-group">   
			<button class="btn btn-primary" type="submit"> {{ Lang::get('core.sb_savechanges'); }}</button>	 
		</div>
	
  	</fieldset>


</div> 


	<div class="col-sm-6">
	
	 <fieldset> <legend> {{ Lang::get('core.forgotpassword'); }} </legend>
  
		
		  <div class="form-group">
			<label for="ipt" class=" control-label ">{{ Lang::get('core.tab_email'); }} </label>
			
			<textarea rows="10" name="resetEmail" class="form-control input-sm ">{{ $resetEmail }}</textarea>
			 
		  </div> 
	  <div class="form-group">
		<label for="ipt" class=" control-label col-md-4">&nbsp;</label>
		<div class="col-md-8">
			<button class="btn btn-primary" type="submit">{{ Lang::get('core.sb_savechanges'); }}</button>
		 </div> 
	 
	  </div>	  
	 </fieldset>    
 	
 </div>
 {{ Form::close() }}
</div>
</div>
</div>





