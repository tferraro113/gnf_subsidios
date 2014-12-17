
<div class="login-box">
<div class="col-md-4 col-md-offset-4">


<div class="panel panel-default">
<div class="panel-heading"><span class="text-semibold"><i class="icon-user-plus"></i>  {{ CNF_APPNAME}}</span></div>


<div class="panel-body ">
 {{ Form::open(array('url'=>'user/signin', 'class'=>'form-vertical')) }}
	    	@if(Session::has('message'))
				{{ Session::get('message') }}
			@endif
		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>			
	<div class="form-group has-feedback">
		<label>{{ Lang::get('core.email'); }}	 </label>
		{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
		<i class="icon-users form-control-feedback"></i>
	</div>
	
	<div class="form-group has-feedback">
		<label>{{ Lang::get('core.password'); }} <a  id="or"  href="javascript://ajax"> {{ Lang::get('core.forgotpassword'); }} ? </a>	  		 </label>
		{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		<i class="icon-lock form-control-feedback"></i>
	</div>
	@if(CNF_RECAPTCHA =='true') 
	<div class="form-group has-feedback">
		<label> Are u human ? </label>
		{{ Form::captcha(array('theme' => 'white')); }}
	</div>	
 	@endif	
	<div class="form-group  has-feedback" style="padding:10px; margin-bottom:20px;" >
		<div class="col-xs-6">    	 
			<button type="submit" class="btn btn-primary ">{{ Lang::get('core.signin'); }}</button>
		</div>
		<div class="col-xs-6">         
			@if(CNF_REGIST =='true') 
		  		<a class="btn btn-default"  href="{{ URL::to('user/register')}}"> {{ Lang::get('core.signup'); }} </a>
			@endif	
		</div>
	 	<div class="clr"></div>
	</div>	

	<div class="form-group has-feedback">
		@if($fb_enabled =='true' || $google_enabled =='true' || $twit_enabled =='true') 
		<label> {{ Lang::get('core.loginsocial') }}	   </label>
		@endif
		<div style="padding:15px 0;">
			@if($fb_enabled =='true') 
			<a href="{{ URL::to('user/facebook')}}" class="btn btn-primary"><i class="fa fa-facebook"></i> Facebook </a>
			@endif
			@if($google_enabled =='true') 
			<a href="{{ URL::to('user/google')}}" class="btn btn-danger"><i class="fa fa-google-plus"></i> Google </a>
			@endif
			@if($twit_enabled =='true') 
			<a href="{{ URL::to('user/twitter')}}" class="btn btn-info"><i class="fa fa-twitter"></i> Twitter </a>
			@endif
		</div>
	</div>		  
	  
	
 {{ Form::close() }}	  
 
{{ Form::open(array('url' => 'user/request', 'class'=>'form-vertical box bg-success','id'=>'fr' , 'style'=>'margin-top:20px; display:none; ')) }}

 	
       <div class="form-group has-feedback">
	   <div class="">
			<label>{{ Lang::get('core.enteremailforgot') }}</label>
		   {{ Form::text('credit_email', null, array('class'=>'form-control', 'placeholder'=> Lang::get('core.email'))) }}
			<i class="icon-envelope form-control-feedback"></i>
		</div> 	
		</div>
		<div class="form-group has-feedback">        
          <button type="submit" class="btn btn-default pull-right"> {{ Lang::get('core.sb_submit') }} </button>        
      </div>
	  
	  <div class="clr"></div>
 {{ Form::close() }}		 

 
</div> 
</div>

</div> 
</div>
  <div class="clr"></div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#or').click(function(){
			$('#fr').toggle();
		});
	});
</script>