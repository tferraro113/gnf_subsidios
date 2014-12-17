<div style="width:padding:10px;;">

{{ Form::open(array('url'=>$module.'/conn/'.$module_name, 'id'=>'conn_form','class'=>'form-vertical' ,'parsley-validate'=>'','novalidate'=>' ')) }}
	<div id="result"></div>
<div class="padding-lg">

	<div class="form-group">	
		<label> Table </label>
		<select name="db" id="db"  class="ext form-control" required ></select>	
	</div>	
	<div class="form-group">	
		<label> Key  </label>
		<select name="key" id="key"  class="ext form-control" required></select>	
	</div>	
	<div class="form-group">	
		<label> Display as </label>
		<select name="display"  class="ext form-control" id="display" required></select>	
	</div>	
	<div class="form-group">
			<input type="hidden" name="module_id" value="{{ $row->module_id }}" />
			<input type="hidden" name="field_id" value="{{ $field_id }}" />
			<input type="hidden" name="alias" value="{{ $alias }}" />
			<button type="submit" class="btn btn-primary" id="saveLayout"> Save Connection </button>
	
	 </div>	 			 
</div>
{{ Form::close() }}

</div>

<script>
$(document).ready(function(){
			
	$("#db").jCombo("{{ URL::to($module.'/combotable') }}",
	{ selected_value : "{{ $f['db'] }}" });

	$("#key").jCombo("{{ URL::to($module.'/combotablefield') }}?table=",
	{ selected_value : "{{ $f['key'] }}", parent: "#db", initial_text : ' Primary Key' });

	$("#display").jCombo("{{ URL::to($module.'/combotablefield') }}?table=",
	{ selected_value : "{{ $f['display'] }}", parent: "#db",   initial_text : ' Display Text'});
});	
</script>	


