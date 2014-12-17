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
		<li><a href="{{ URL::to('Contactos') }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
 	<div class="visible-xs breadcrumb-toggle">
		<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons">
		<i class="icon-menu2"></i></a>
	</div>	  
	   <ul class="breadcrumb-buttons collapse">
	   		<li><a href="{{ URL::to('Contactos') }}" class="tips" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;</a></li>
			@if($access['is_add'] ==1)
	   		<li><a href="{{ URL::to('Contactos/add/'.$id) }}" class="tips" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;</a></li>
			@endif  
			@if($access['is_remove'] ==1)
			<li ><a href="javascript://ajax"  onclick="SximoDelete();"class="tips" title="{{ Lang::get('core.btn_remove') }}"><i class="icon-bubble-trash"></i>&nbsp;</a></li>
			@endif 	   
	   </ul>
	   	  
	</div>  
	 {{ Form::open(array('url'=>'Contactos/destroy/', 'class'=>'form-horizontal' ,'ID' =>'SximoTable' )) }}
	 <input type="checkbox" style="display:none" checked="checked" class="ids"  name="id[]" value="{{ $id }}" />
	{{ Form::close() }}
	<div class="table-responsive">
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>Id</td>
						<td>{{ $row->id }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Nombre</td>
						<td>{{ $row->nombre }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Apellido</td>
						<td>{{ $row->apellido }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Sexo</td>
						<td>{{ SiteHelpers::gridDisplayView($row->sexo,'sexo','1:sexo:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Fecha Nacimiento</td>
						<td>{{ $row->fecha_nacimiento }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Tipo Documento</td>
						<td>{{ SiteHelpers::gridDisplayView($row->tipo_documento,'tipo_documento','1:tipo_doc:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Nro Doc</td>
						<td>{{ $row->numero }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Telefono</td>
						<td>{{ $row->telefono }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Mail</td>
						<td>{{ $row->mail }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Municipio</td>
						<td>{{ SiteHelpers::gridDisplayView($row->municipio_id,'municipio_id','1:municipios:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Localidad</td>
						<td>{{ SiteHelpers::gridDisplayView($row->localidad_id,'localidad_id','1:localidades:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Calle</td>
						<td>{{ $row->calle }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Numero Calle</td>
						<td>{{ $row->numero_calle }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Complemento</td>
						<td>{{ $row->complemento }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Entre Calles</td>
						<td>{{ $row->entre_calles }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Instalacion Coccion</td>
						<td>{{ $row->instalacion_coccion }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Instalacion AguaCaliente</td>
						<td>{{ $row->instalacion_aguaCaliente }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Instalacion Calefaccion</td>
						<td>{{ $row->instalacion_calefaccion }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Posee Gas</td>
						<td>{{ SiteHelpers::gridDisplayView($row->posee_gas,'posee_gas','1:poseegas:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Estado</td>
						<td>{{ SiteHelpers::gridDisplayView($row->estado,'estado','1:estado:id:estado') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Usuario Gestiona</td>
						<td>{{ SiteHelpers::gridDisplayView($row->usuario_gestiona,'usuario_gestiona','1:tb_users:id:username') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Consulta</td>
						<td>{{ $row->consulta }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Usuario Cargo</td>
						<td>{{ SiteHelpers::gridDisplayView($row->created_by,'created_by','1:tb_users:id:username') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Created</td>
						<td>{{ $row->created }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Modificado Por</td>
						<td>{{ SiteHelpers::gridDisplayView($row->modified_by,'modified_by','1:tb_users:id:username') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Modified</td>
						<td>{{ $row->modified }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Entry By</td>
						<td>{{ $row->entry_by }} </td>
						
					</tr>
				
		</tbody>	
	</table>    
	</div>
</div>
	  