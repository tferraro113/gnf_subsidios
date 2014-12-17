{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
  <div class="page-content">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
    </div>

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('config/dashboard') }}">{{ Lang::get('core.home'); }}</a></li>
        <li class="active">{{ $pageTitle }}</li>
      </ul>
	   <div class="visible-xs breadcrumb-toggle"><a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a></div>
	  <ul class="breadcrumb-buttons collapse">
        <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-search3"></i> <span>{{ Lang::get('core.btn_search') }}</span> <b class="caret"></b></a>
          <div class="popup dropdown-menu dropdown-menu-right">
            <form action="#" class="breadcrumb-search">
              <input type="text" placeholder="{{ Lang::get('core.btn_typesearch') }}" name="search" class="form-control">              
              <input type="hidden"  value="Search">
            </form>
          </div>
        </li>
			@if($access['is_excel'] ==1)
			<li><a href="{{ URL::to('pages/download') }}" class="tips" title="{{ Lang::get('core.btn_download') }}"><i class="icon-folder-download2"></i>&nbsp; </a></li>	
			@endif		
		 	@if(Session::get('gid') ==1)
			<li><a href="{{ URL::to('module/config/pages') }}" class="tips" title="{{ Lang::get('core.btn_config') }}"><i class="icon-cog"></i>&nbsp; </a></li>	
			@endif  
			@if($access['is_add'] ==1)
	   		<li><a href="{{ URL::to('pages/add') }}" class="tips" title="{{ Lang::get('core.btn_create') }}"><i class="icon-plus-circle2"></i>&nbsp;</a></li>
			@endif  
			@if($access['is_remove'] ==1)
			<li ><a href="javascript://ajax"  onclick="SximoDelete();" class="tips" title="{{ Lang::get('core.btn_remove') }}"><i class="icon-bubble-trash"></i>&nbsp;</a></li>
			@endif 		
	  </ul>
	</div>  	
	@if(Session::has('message'))	  
		   {{ Session::get('message') }}
	@endif	
	{{ $details }}
	
	
	<div class="table-responsive">
	 {{ Form::open(array('url'=>'pages/destroy/', 'class'=>'form-horizontal' ,'ID' =>'SximoTable' )) }}
    <table class="table table-striped ">
        <thead>
		<tr>
			<th> No </th>
			<th> <input type="checkbox" class="checkall" /></th>
		 @foreach ($tableGrid as $t)
		 	@if($t['view'] =='1')
			 <th>{{ $t['label'] }}</th>
			 @endif
		  @endforeach
		  	<th> Url </th>
			<th> {{ Lang::get('core.btn_action') }} </th>
           </tr>
        </thead>

        <tbody>
            @foreach ($rowData as $row)
                <tr>
					<td width="50"> {{ ++$i }} </td>
					<td width="50">
					@if($row->pageID !='1')
					<input type="checkbox" class="ids" name="id[]" value="{{ $row->pageID }}" />  
					@endif
					</td>				
				 @foreach ($tableGrid as $field)
					 @if($field['view'] =='1')
					 <td>					 
					 	@if($field['attribute']['image']['active'] =='1')
							<img src="{{ asset($field['attribute']['image']['path'].'/'.$row->$field['field'])}}" width="50" />
						@else	
							{{ $row->$field['field'] }}	
						@endif						 
					 </td>
					 @endif
					 			 
				 @endforeach
				 <td > <a href="{{ ($row->alias =='home' ? URL::to('') : URL::to('/'.$row->alias)) }}" target="_blank"> <small class="text-mute">
				 {{ ($row->alias =='home' ? URL::to('') : URL::to($row->alias)) }}</small> </a> </td>	
				 <td>
				 	<div class="btn-group">
					{{--*/ $id = SiteHelpers::encryptID($row->pageID) /*--}}
				 	@if($access['is_detail'] ==1)
					<a href="{{ URL::to('pages/show/'.$id)}}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_view') }}">
					<i class="icon-paragraph-justify"></i> </a>
					@endif
					@if($access['is_edit'] ==1)
					<a href="{{ URL::to('pages/add/'.$id)}}" class="tips btn btn-xs btn-success" title="{{ Lang::get('core.btn_edit') }}">
					<i class="icon-pencil4"></i></a>
					@endif
					</div>
				</td>		
                </tr>
            @endforeach
			
              
        </tbody>
      
    </table>
	{{ Form::close() }}
	</div>
	@include('footer')
	</div>	  