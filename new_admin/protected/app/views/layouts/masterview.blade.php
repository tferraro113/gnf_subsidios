	<div class="page-header">
      <div class="page-title">
        <h3> Entrada Master :</h3>
      </div>
    </div>
	
	<table class="table table-striped table-bordered" >
		<tbody>	
		@foreach($grid as $t)
			@if($t['view'] ==1) 
		<tr>
			<td width='30%' class='label-view text-right'>{{ $t['label'] }}</td>
			<td>  {{ $row->$t['field'] }}</td>
			
		</tr>
			@endif
		@endforeach
	</table>   
	
	
	<div class="page-header">
      <div class="page-title">
        <h3> Detalles </h3>
      </div>
    </div>