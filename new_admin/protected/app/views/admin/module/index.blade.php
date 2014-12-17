
<div class="page-content">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ Lang::get('core.t_module') }} <small>{{ Lang::get('core.t_modulesmall') }}</small></h3>
      </div>
    </div>

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('') }}"> {{ Lang::get('core.home') }}</a></li>
        <li class="active">{{ Lang::get('core.t_module') }}</li>
      </ul>
		<div class="visible-xs breadcrumb-toggle">
			<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons">
			<i class="icon-menu2"></i>
			</a>
		</div>
	  <ul class="breadcrumb-buttons collapse">  
	   <li><a href="{{ URL::to('module/add') }}" title=""><i class="icon-plus-circle2"></i> {{ Lang::get('core.create') }}  </a></li>
		<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-folder-upload"></i> <span>Install</span>
		<b class="caret"></b></a>
          <div class="popup dropdown-menu dropdown-menu-right">
		   {{ Form::open(array('url'=>'module/install/', 'class'=>'breadcrumb-search','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
			<p>Select File ( Module zip installer ) </p>
            <p>  <input type="file" name="installer" required > </p>
			<p> <button type="submit" class="btn btn-primary" style="width:100%;" >Install</button></p>
            </form>
          </div>
        </li>
		 <li><a href="{{ URL::to('module/package') }}" title=""  class="tips post_url"  data-title="Module(s)"><i class="icon-file-zip"></i> Backup  </a></li>
	  </ul>	  
	</div>
	

	
	<ul class="nav nav-tabs" style="margin-bottom:10px;">
	  <li @if($type =='addon') class="active" @endif><a href="{{ URL::to('module')}}"> {{ Lang::get('core.tab_installed') }}  </a></li>
	  <li @if($type =='core') class="active" @endif><a href="{{ URL::to('module?t=core')}}">{{ Lang::get('core.tab_core') }}</a></li>
	</ul>
		
@if(Session::has('message'))
       {{ Session::get('message') }}
@endif	
	 {{ Form::open(array('url'=>'module/package#', 'class'=>'form-horizontal' ,'ID' =>'SximoTable' )) }}
	<div class="table-responsive" style="min-height:400px;">
	@if(count($rowData) >=1) 
		<table class="table table-striped ">
			<thead>
			<tr>
				<th>Action</th>					
				<th><input type="checkbox" class="checkall" /></th>
				<th>Module</th>
				<th>Controller</th>
				<th>Database</th>
				<th>PRI</th>
				<th>Created</th>
		
			</tr>
			</thead>
        <tbody>
		@foreach ($rowData as $row)
			<tr>		
				<td>
				<div class="btn-group">
				<button class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
				<I class="icon-cogs"></I> <span class="caret"></span>
				</button>
					<ul style="display: none;" class="dropdown-menu icons-right">
						<li><a href="{{ URL::to($row->module_name)}}"><i class="icon-grid"></i> {{ Lang::get('core.btn_view') }} Module </a></li>
						<li><a href="{{ URL::to($module.'/config/'.$row->module_name)}}"><i class="icon-pencil3"></i> {{ Lang::get('core.btn_edit') }}</a></li>
						@if($type !='core')
						<li><a href="javascript://ajax" onclick="SximoConfirmDelete('{{ URL::to('module/destroy/'.$row->module_id)}}')"><i class="icon-bubble-trash"></i> {{ Lang::get('core.btn_remove') }}</a></li>
						<li class="divider"></li>
						<li><a href="{{ URL::to('module/rebuild/'.$row->module_id)}}"><i class="icon-spinner7"></i> Rebuild All Codes</a></li>
						@endif
					</ul>
				</div>					
				</td>
				<td>
				 @if($type !='core')
				<input type="checkbox" class="ids" name="id[]" value="{{ $row->module_id }}" /> @endif</td>
				<td>{{ $row->module_title }} </td>
				<td>{{ $row->module_name }} </td>
				<td>{{ $row->module_db }} </td>
				<td>{{ $row->module_db_key }} </td>
				<td>{{ $row->module_created }} </td>
			</tr>
		@endforeach	
	</tbody>		
	</table>
	
	@else
		
		<p class="text-center" style="padding:50px 0;">{{ Lang::get('core.norecord') }} 
		<br /><br />
		<a href="{{ URL::to('module/add')}}" class="btn btn-default "><i class="icon-plus-circle2"></i> New module </a>
		 </p>	
	@endif
	</div>	
	{{ Form::close() }}
			

</div>	  
	  
  <script language='javascript' >
  jQuery(document).ready(function($){
    $('.post_url').click(function(e){
      e.preventDefault();
      if( ( $('.ids',$('#SximoTable')).is(':checked') )==false ){
        alert( $(this).attr('data-title') + " not selected");
        return false;
      }
      $('#SximoTable').attr({'action' : $(this).attr('href') }).submit();
    })
  })
  </script>	  