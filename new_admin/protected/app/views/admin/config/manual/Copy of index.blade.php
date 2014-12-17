
  <div class="page-content">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
    </div>

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('') }}">Home</a></li>
        <li class="active"> Documentation </li>
      </ul>
	</div>  

	<div class="col-md-4">
		
		<ol >
			<li><a href="#tut-start"> Getting Started  </a></li>
			<li><a href="#tut-module"> Create Module </a> </li>
			<li><a href="#tut-menu"> Create Menu  </a></li>
			<li><a href="#tut-edit"> Edit Module </a></li>
				<ol>
						 <li><a href="#tut-info"><i class="fa fa-fw fa-angle-right"></i> Basic Info </a>
						 </li><li><a href="#tut-mysql"><i class="fa fa-fw fa-angle-right"></i> MySQL Editor </a>
						 </li><li><a href="#tut-table"><i class="fa fa-fw fa-angle-right"></i> Grid Table Setting </a>
						 </li><li><a href="#tut-form"><i class="fa fa-fw fa-angle-right"></i> Form Setting </a>
						 </li><li><a href="#tut-master"><i class="fa fa-fw fa-angle-right"></i> Master Detail </a>
						 </li><li><a href="#tut-permission"><i class="fa fa-fw fa-angle-right"></i> Permission </a>
						 </li><li><a href="#tut-rebuild"><i class="fa fa-fw fa-angle-right"></i> Rebuild </a></li>
				
				</ol>	
		  	<li><i class="icon-accessibility"></i>Faucibus porta lacus fringilla vel</li>
		</ol>
		
	
	</div>
	<div class="col-md-8" style="margin-bottom:50px;">
	
		<h2 > User Guide </h2>
		<p>These documents will guide you step by step to get speed up with Sximo Builder ( Laravel Edition ) as possible. <br />
Before read this document , the most important thing that you should have some basic knowledge at these folowing item </p>
		<ol>
			<li><a href="http://codeigniter.com" target="_blank">Laravel PHP Framework</a></li>
		</ol>
		
				
		<h2 > Setting Up Application Info </h2>
		<p>After your successfull install your application , now you need to setting your app . </p>
<table width="100%" border="0" cellspacing="2" cellpadding="2" class="table table-bordered">
              <tr>
                <th scope="col">Parameter</th>
                <th scope="col">Description</th>
                <th scope="col">Example</th>
              </tr>
              <tr>
                <td>Application Name </td>
                <td>Name of your application , this name will show as title page , logo title </td>
                <td>Inventory , HRD System </td>
              </tr>
              <tr>
                <td>Application Desc </td>
                <td>Short description for your application </td>
                <td>Manage Inventory , Manage HRD </td>
              </tr>
              <tr>
                <td>Company Name </td>
                <td>Your company name </td>
                <td>My Company </td>
              </tr>
              <tr>
                <td>Email System </td>
                <td>Email addres used for email sender  forgot password , registration activation etc </td>
                <td>info@mycompany.com</td>
              </tr>
              <tr>
                <td>Muliti language <br />
Only Layout Interface </td>
                <td>Enabling translatation interface ( no content translation ) </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Main Language </td>
                <td>Set default language </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Metakey</td>
                <td>key for your app ( frontend ) </td>
                <td>my site , my company  , Larvel Crud</td>
              </tr>			  			  			  
              <tr>
                <td>Meta Description</td>
                <td>Key description for your app ( frontend ) </td>
                <td>&nbsp;</td>
              </tr>				  
            </table>
			
		<h2 class="page-title" id="tut-module" >Create Module</h2>
		<p><strong>What's Module ?</strong>  A module is a part of a program under application / group .
As We mention above application are composed by one or more independently modules . A module contain one or several routines that we call CRUDSD ( Create Read Update Delete Search and Download ).</p>

		<p> By default at the first time you create module , system will generate thoose routines . Except if your database table doesnt contain primary key , it only create routins View , Search and Download </p>
		<p> For module type <code>blank template</code> they only contain one routins task , <code>View / Read</code>  </p>
		
			<h4> <strong>Create module step </strong> : </h4>
		
		<p>Before you create module , you have to create table for module you will created . this app doest have feature to create table database , so you need phpmyadmin or other mysql tools for creating table </p>
		<div class="alert alert-info">
			Go To : Tools <i class="fa fa-fw fa-angle-right"></i>  App &amp; Module  <i class="fa fa-fw fa-angle-right"></i> Create Module
		</div>
		<p><img src="{{asset('images/create1.jpg')}}" style="width:70%"  /></p>
		<p> Click <strong>Create</strong> Button </p>
		<p><img src="{{asset('images/create2.jpg')}}" style="width:70%" /></p>
		<p> Click <strong>Create Module </strong> Button </p>
		<div class="alert alert-success">
			<strong>Congratulation</strong> your first module are created !
		</div>
		
		<h2 class="page-title" id="tut-menu">Creating Menu </h2>		
		<p> After made module  you need to create menu and linked it to your new module </p>
		<p> Go to Tools >> Navigation </p>
		<p><img src="{{asset('images/create3.jpg')}}" style="width:70%" /></p>
		<p> Click <strong>Submit</strong> Button </p>
		<p><img src="{{asset('images/create4.jpg')}}" style="width:70%" /></p>
		<div class="alert alert-success">
			<strong>Congratulation</strong> your first Menu are created !
		</div>
		
		<p><img src="{{asset('images/create5.jpg')}}" style="width:70%" /></p>
		<p> Now click your new menu , you should see your new module  </p> 
		<p><img src="{{asset('images/create6.jpg')}}" style="width:70%" /></p>
		<div class="alert alert-success">
			<strong>It's easy right ? </strong> 
		</div>	
		
		<h2 class="page-title" id="tut-edit">Editing  Module  </h2>		
		<p> Of course you need to make some changes to your module such lable , fields to download , who can access , add , edit and delete </p>
		<p> Go to Tools >> Module & Builder </p>
		
	</div>

</div>
<style>
	img { border:solid 1px #ccc; padding:2px; background:#ddd;}
</style>
