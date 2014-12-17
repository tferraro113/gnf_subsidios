
<div class="page-content">
	<div class="page-header">
	  <div class="page-title">
		<h3> Dashboard <small> Summary info site </small></h3>
	  </div>
	</div>
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('config/dashboard') }}">Home</a></li>
        <li class="active">Dashboard</li>
      </ul>
	  
	</div> 
	
	@if(Session::get('gid') ==1)
    <!-- Default info blocks -->
	<div class="col-sm-12 col-md-12">
		
			<div class="block-content">
			
			<ul class="info-blocks">
			  <li class="">
				<div class="top-info"><a href="{{ URL::to('module/add') }}"> {{ Lang::get('core.btn_create'); }} Module</a></div>
				<a href="{{ URL::to('module/add') }}"><i class="icon-plus-circle2"></i></a></li>
			  <li class="">
				<div class="top-info"><a href="{{ URL::to('config') }}">{{ Lang::get('core.m_setting'); }}</a></div>
				<a href="{{ URL::to('config') }}"><i class="icon-cogs"></i></a></li>
			  <li class="">
				<div class="top-info"><a href="{{ URL::to('menu') }}">{{ Lang::get('core.m_menu'); }}</a></div>
				<a href="{{ URL::to('menu') }}"><i class="icon-stats2"></i></a></li>
			  <li class="">
				<div class="top-info"><a href="{{ URL::to('users') }}">{{ Lang::get('core.m_users'); }} </a></div>
				<a href="{{ URL::to('users') }}"><i class="icon-user"></i></a></li>
			  <li class="">
				<div class="top-info"><a href="{{ URL::to('groups') }}">{{ Lang::get('core.m_groups'); }}</a></div>
				<a href="{{ URL::to('groups') }}"><i class="icon-users"></i></a></li>
			</ul>
			</div>
			
		
	</div>	
			<!-- /default info blocks -->	
	

	@endif
	
</div>