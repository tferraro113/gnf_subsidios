	<div class="table-footer">
	<div class="row">
	 <div class="col-sm-5">
	  <div class="table-actions">
	 
	   {{ Form::open(array('url'=>$pageModule.'/filter/')) }}
		   {{--*/ $pages = array(5,10,20,30,50) /*--}}
		   {{--*/ $orders = array('asc','desc') /*--}}
		<select name="rows" data-placeholder="{{ Lang::get('core.grid_show') }}" class="select-liquid"  >
		  <option value=""></option>
		  @foreach($pages as $p)
		  <option value="{{ $p }}" 
			@if(isset($pager['rows']) && $pager['rows'] == $p) 
				selected="selected"
			@endif	
		  >{{ $p }}</option>
		  @endforeach
		</select>
		<select name="sort" data-placeholder="{{ Lang::get('core.grid_sort') }}" class="select-liquid" style="width:100px;" >
		  <option value=""></option>	 
		  @foreach($tableGrid as $field)
		   @if($field['view'] =='1' && $field['sortable'] =='1') 
			  <option value="{{ $field['field'] }}" 
				@if(isset($pager['sort']) && $pager['sort'] == $field['field']) 
					selected="selected"
				@endif	
			  >{{ $field['label'] }}</option>
			@endif	  
		  @endforeach
		 
		</select>	
		<select name="order" data-placeholder="{{ Lang::get('core.grid_order') }}" class="select-liquid">
		  <option value=""></option>
		   @foreach($orders as $o)
		  <option value="{{ $o }}"
			@if(isset($pager['order']) && $pager['order'] == $o)
				selected="selected"
			@endif	
		  >{{ ucwords($o) }}</option>
		 @endforeach
		</select>	
		<button type="submit" class="btn btn-info">GO</button>	
	  {{ Form::close() }}
	  </div>					
	  </div>
	   <div class="col-sm-3">
		<p class="text-center" style="line-height:30px;">
		{{ Lang::get('core.grid_displaying') }} :  <b>{{ $pagination->getFrom() }}</b> 
		{{ Lang::get('core.grid_to') }} <b>{{ $pagination->getTo() }}</b> 
		{{ Lang::get('core.grid_of') }} <b>{{ $pagination->getTotal() }}</b>
		</p>
	   </div>
		<div class="col-sm-4">			 
	  {{ $pagination->appends($pager)->links() }}
	  </div>
	  </div>
	</div>	
	
	