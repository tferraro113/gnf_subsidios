<div class="sidebar-content">
<div class="user-menu"><a data-toggle="dropdown" class="dropdown-toggle" href="#">
	
        <div class="user-info"><b>{{ Session::get('fid') }}</b> <br />
		{{ Lang::get('core.lastlogin'); }} : <br />
		<small>{{ date("H:i F j, Y", strtotime(Session::get('ll'))) }}</small></div>
        </a>
        
</div>

      <!-- Main navigation -->
	  {{--*/ $sidebar = SiteHelpers::menus('sidebar') /*--}}
      <ul class="navigation">
	  	<li  ><a href="{{ URL::to('config/dashboard')}}"><span>Dashboard</span> <i class="icon-home"></i> </a></li>
		@foreach ($sidebar as $menu)
			 <li @if(Request::is($menu['module'])) class="active" @endif>
			 	<a 
					@if($menu['menu_type'] =='external')
						href="{{ URL::to($menu['url'])}}" 
					@else
						href="{{ URL::to($menu['module'])}}" 
					@endif				
			 	
				 @if(count($menu['childs']) > 0 ) class="expand level-closed" @endif>
			 		<span>{{$menu['menu_name']}}</span>  <i class="{{$menu['menu_icons']}}"></i>
				</a> 
				@if(count($menu['childs']) > 0)
					<ul>
						@foreach ($menu['childs'] as $menu2)
						 <li @if(Request::is($menu2['module'])) class="active" @endif>
						 	<a 
								@if($menu2['menu_type'] =='external')
									href="{{ URL::to($menu2['url'])}}" 
								@else
									href="{{ URL::to($menu2['module'])}}"  
								@endif									
							>
								<span>{{$menu2['menu_name']}}</span>  
							</a> 
						</li>							
						@endforeach
					</ul>
				@endif
			</li>
		@endforeach
      </ul>
      <!-- /main navigation -->
 </div>