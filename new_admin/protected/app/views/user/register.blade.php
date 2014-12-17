<div class="login-box">
<div class="col-md-4 col-md-offset-4">

<div class="panel panel-default">
<div class="panel-heading"><span class="text-semibold"><i class="icon-user-plus"></i> {{ Lang::get('core.registernew'); }} </span></div>
<div class="panel-body">
 {{ Form::open(array('url'=>'user/create', 'class'=>'form-signup')) }}

		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	
	<div class="form-group has-feedback">
		<label>{{ Lang::get('core.firstname'); }}	 </label>
	  {{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First Name')) }}
		<i class="icon-users form-control-feedback"></i>
	</div>
	
	<div class="form-group has-feedback">
		<label>{{ Lang::get('core.lastname'); }}	 </label>
	 {{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last Name')) }}
		<i class="icon-users form-control-feedback"></i>
	</div>
	
	<div class="form-group has-feedback">
		<label>{{ Lang::get('core.email'); }}	 </label>
	 {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
		<i class="icon-envelop form-control-feedback"></i>
	</div>
	
	<div class="form-group has-feedback">
		<label>{{ Lang::get('core.password'); }}	</label>
	 {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		<i class="icon-lock form-control-feedback"></i>
	</div>
	
	<div class="form-group has-feedback">
		<label>{{ Lang::get('core.repassword'); }}	</label>
	 {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
		<i class="icon-lock form-control-feedback"></i>
	</div>
	@if(CNF_RECAPTCHA =='true') 
	<div class="form-group has-feedback">
		<label> Are u human ? </label>
		{{ Form::captcha(array('theme' => 'white')); }}
	</div>	
 	@endif						

      <div class="row form-actions">
        <div class="col-sm-12">
          <button type="submit" style="width:100%;" class="btn btn-primary pull-right"><i class="icon-user-plus"></i> {{ Lang::get('core.signup'); }}	</button>
       </div>
      </div>
   
 {{ Form::close() }}
 </div>
</div> 
</div>

</div>
<div class="clr"></div>
<!-- /login wrapper -->