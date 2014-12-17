
  <div class="page-content">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> Edit Module : {{ $row->module_name }} <small> Manage Installed Module </small></h3>
      </div>
    </div>

 
    <div class="breadcrumb-line">
 <div class="visible-xs breadcrumb-toggle"><a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a></div>

		
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('') }}">Home</a></li>
        <li ><a href="{{ URL::to( $module ) }}">{{ $pageTitle }}</a></li>
		<li class="active">Config </li>
      </ul>
	</div>  
	
	@include('admin.module.tab',array('active'=>'config'))
	
@if(Session::has('message'))
       {{ Session::get('message') }}
@endif
<ul>
	@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
</ul>	

{{ Form::open(array('url'=>$module.'/saveconfig/'.$module_name, 'class'=>'form-horizontal row')) }}
	
<input  type='text' name='module_id' id='module_id'  value='{{ $row->module_id }}'  style="display:none; " />
	<div class="col-sm-7">

  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Name / Title </label>
	<div class="col-md-8">
	<input  type='text' name='module_title' id='module_title' class="form-control " required value='{{ $row->module_title }}'  />
	  
	 </div> 
  </div>  

  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Module Note</label>
	<div class="col-md-8">
	<input  type='text' name='module_note' id='module_note'  value='{{ $row->module_note }}' class="form-control "  />
	 </div> 
  </div>    	

  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Class Controller </label>
	<div class="col-md-8">
	<input  type='text' name='module_name' id='module_name' readonly="1"  class="form-control " required value='{{ $row->module_name }}'  />
	 </div> 
  </div>  
  
   <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Table Master</label>
	<div class="col-md-8">
	<input  type='text' name='module_db' id='module_db' readonly="1"  class="form-control " required value='customer'  />
	  
	 </div> 
  </div>  
  
  <div class="form-group" style="display:none;" >
    <label for="ipt" class=" control-label col-md-4">Author </label>
	<div class="col-md-8">
	<input  type='text' name='module_author' id='module_author' class="form-control " required readonly="1"  value='{{ $row->module_author }}'  />
	 </div> 
  </div>  
  
  

  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4"></label>
	<div class="col-md-8">
	<button type="submit" name="submit" class="btn btn-primary"> Update Module </button>
	 </div> 
  </div> 
  </div>   
  
  <div class="col-sm-5">

  
  </div>
  </div>
</form>	
	
 </div>		