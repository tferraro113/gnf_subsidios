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
        <li><a href="{{ URL::to('config/dashboard') }}">{{ Lang::get('core.home') }}</a></li>
        <li class="active">{{ $pageTitle }}</li>
      </ul>
	   <div class="visible-xs breadcrumb-toggle"><a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a></div>
	  <ul class="breadcrumb-buttons collapse">
			@if($access['is_excel'] ==1)
			<li><a href="{{ URL::to('{class}/download') }}" class="tips" title="{{ Lang::get('core.btn_download') }}"><i class="icon-folder-download2"></i>&nbsp; </a></li>	
			@endif		
		 	@if(Session::get('gid') ==1)
			<li><a href="{{ URL::to('module/config/{class}') }}" class="tips" title="{{ Lang::get('core.btn_config') }}"><i class="icon-cog"></i>&nbsp; </a></li>	
			@endif  		
	  </ul>
	</div>  	
	@if(Session::has('message'))	  
		   {{ Session::get('message') }}
	@endif	
	<div class="table-responsive">
	 {{ Form::open(array('url'=>'{class}/destroy/', 'class'=>'form-horizontal' ,'ID' =>'SximoTable' )) }}
    <table class="table table-striped ">
        <thead>
		<tr>
			<th> No </th>
		 @foreach ($tableGrid as $t)
		 	@if($t['view'] =='1')
			 <th>{{ $t['label'] }}</th>
			 @endif
		  @endforeach
           </tr>
        </thead>

        <tbody>
            @foreach ($rowData as $row)
                <tr>
					<td width="50"> {{ ++$i }} </td>
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
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
	{{ Form::close() }}
	</div>
	@include('footer')
	</div>	  