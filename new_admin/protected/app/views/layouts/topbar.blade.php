

{{--*/ $menus = SiteHelpers::menus('top') /*--}}
 	  <ul class="nav navbar-nav navbar-collapse collapse"  id="topmenu">
		@foreach ($menus as $menu)
			 <li class="@if(Request::is($menu['module'])) active @endif" >
			 	<a 
				@if($menu['menu_type'] =='external')
					href="{{ URL::to($menu['url'])}}" 
				@else
					href="{{ URL::to($menu['module'])}}" 
				@endif
			 
				 @if(count($menu['childs']) > 0 ) class="dropdown-toggle" data-toggle="dropdown" @endif>
			 		<i class="{{$menu['menu_icons']}}"></i><span>{{$menu['menu_name']}}</span>
					@if(count($menu['childs']) > 0 )
					 <b class="caret"></b> 
					@endif  
				</a> 
				@if(count($menu['childs']) > 0)
					 <ul class="dropdown-menu">
						@foreach ($menu['childs'] as $menu2)
						 <li class=" 
						 @if(count($menu2['childs']) > 0) dropdown-submenu @endif
						 @if(Request::is($menu2['module'])) active @endif">
						 	<a 
								@if($menu['menu_type'] =='external')
									href="{{ URL::to($menu2['url'])}}" 
								@else
									href="{{ URL::to($menu2['module'])}}" 
								@endif
											
							>
								<i class="{{$menu2['menu_icons']}}"></i> {{$menu2['menu_name']}}
							</a> 
							@if(count($menu2['childs']) > 0)
							<ul class="dropdown-menu dropdown-menu-right">
								@foreach($menu2['childs'] as $menu3)
									<li @if(Request::is($menu3['module'])) class="active" @endif>
										<a 
											@if($menu['menu_type'] =='external')
												href="{{ URL::to($menu3['url'])}}" 
											@else
												href="{{ URL::to($menu3['module'])}}" 
											@endif										
										
										>
											<span>{{$menu3['menu_name']}}</span>  
										</a>
									</li>	
								@endforeach
							</ul>
							@endif							
							
						</li>							
						@endforeach
					</ul>
				@endif
			</li>
		@endforeach  
  </ul> 
  
    <ul class="nav navbar-nav navbar-collapse collapse  navbar-right" id="toolmenu">
		@if(CNF_MULTILANG ==1)
		<li  class="user dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><i class="icon-flag2"></i><i class="caret"></i></a>
			 <ul class="dropdown-menu dropdown-menu-right icons-right">
				@foreach(SiteHelpers::langOption() as $lang)
					<li><a href="{{ URL::to('home/lang/'.$lang['folder'])}}"><i class="icon-flag2"></i>{{  $lang['name'] }}</a></li>
				@endforeach	
			</ul>
		</li>	
		@endif
		@if(!Auth::check())  
			<li><a href="{{ URL::to('user/login')}}"><i class="icon-arrow-right12"></i> {{ Lang::get('core.signin'); }}</a></li>   
		@else
		@if(Session::get('gid') ==1)
		<li class="user dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><i class="icon-screen"></i> <span>{{ Lang::get('core.m_controlpanel'); }}</span><i class="caret"></i></a>
		  <ul class="dropdown-menu dropdown-menu-right icons-right">
		   
		  	<li><a href="{{ URL::to('config')}}"><i class="icon-cog"></i> {{ Lang::get('core.m_setting'); }}</a></li>
			
			<li class="dropdown-submenu "><a href="{{ URL::to('users')}}" class="dropdown-toggle" data-toggle="dropdown" ><i class="icon-user"></i> {{ Lang::get('core.m_usersgroups'); }}</a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="{{ URL::to('users')}}"><i class="icon-user"></i> {{ Lang::get('core.m_users'); }} </a></li>
					<li><a href="{{ URL::to('groups')}}"><i class="icon-user"></i> {{ Lang::get('core.m_groups'); }} </a></li>
					<li><a href="{{ URL::to('config/blast')}}"><i class="icon-envelop"></i> {{ Lang::get('core.m_blastemail'); }} </a></li>	
				</ul>
			</li>
			<li><a href="{{ URL::to('logs')}}"><i class="icon-cog"></i> {{ Lang::get('core.m_logs'); }}</a></li>		
			<li class="divider"></li>
			<li><a href="{{ URL::to('pages')}}"><i class="icon-envelop"></i> {{ Lang::get('core.m_pagecms'); }}</a></li>
			<li><a href="{{ URL::to('module')}}"><i class="icon-bubble4"></i> {{ Lang::get('core.m_codebuilder'); }}</a></li>			
			<li><a href="{{ URL::to('menu')}}"><i class="icon-paragraph-left"></i> {{ Lang::get('core.m_menu'); }}</a></li>
			<li class="divider"></li>
			<li><a href="{{ URL::to('config/help')}}"><i class="icon-notebook"></i> Manual Guide</a></li>
			<li><a href="{{ URL::to('config/template')}}"><i class="icon-grid"></i> Template Elements</a></li>
			
		  </ul>
		</li>
		@endif	
		<li class="user dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <span>{{ Lang::get('core.m_myaccount'); }}</span><i class="caret"></i></a>
		  <ul class="dropdown-menu dropdown-menu-right icons-right">
		  	<li><a href="{{ URL::to('config/dashboard')}}"><i class="icon-stats-up"></i> {{ Lang::get('core.m_dashboard'); }}</a></li>
			<li><a href="{{ URL::to('user/profile')}}"><i class="icon-user"></i> {{ Lang::get('core.m_profile'); }}</a></li>
			<li><a href="{{ URL::to('user/logout')}}"><i class="icon-exit"></i> {{ Lang::get('core.m_logout'); }}</a></li>
		  </ul>
		</li>			
		
	@endif 
  </ul>	 