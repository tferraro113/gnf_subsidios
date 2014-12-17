<?php $lang = Lang::singleton(); ?>
<div class="container">
		<h2><?php echo $lang->line('tool_language_manager');?></h2>
        <ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
            <li><a href="<?php echo strUrl('admin/component/builder.php'); ?>"> <?php echo $lang->line('components'); ?> </a></li>
            <li><a href="<?php echo strUrl('admin/component/groups.php'); ?>"> <?php echo $lang->line('group_component'); ?> </a></li>
            <li><a href="<?php echo strUrl('admin/table/index.php'); ?>"><?php echo $lang->line('table_builder'); ?></a></li>
            <li class="active"><a href="<?php echo strUrl('admin/language/index.php'); ?>"> <?php echo $lang->line('language_manager'); ?> </a></li>
        </ul>
</div>
<div style="height: 52px;">
    <div data-spy="affix" data-offset-top="90" style="
         top: 24px;
         width: 100%;
         padding-top:5px;
         padding-bottom:5px;
         z-index: 100;">
        <div class="container" style="border-bottom: 1px solid #CCC; padding-bottom:5px;padding-top:5px;
        	background: #FBFBFB;
       		background-image: linear-gradient(to bottom, #FFFFFF, #FBFBFB);">
            <div style="text-align:right; width:100%;">
                <a class="btn"  onclick="back();">   <i class="icon-arrow-left"></i>  <?php echo $lang->line('back'); ?>  &nbsp; </a>
                <a class="btn btn-info" onclick="translateLanguage();" > &nbsp;  <i class="icon-ok icon-white"></i>  <?php echo $lang->line('save'); ?> &nbsp; </a>
            </div>
        </div>
    </div>
    </div>
<div class="container">    
        <form id="frm_translate">
        	<input type="hidden" name="language_code" value="<?php echo $this->rs['language_code']; ?>" />
	        <table class="table-striped" style="width:100%;">
	        <col style="width:30%;" />
	        <thead>
	        <tr>
	        	<th style="text-align: left;">Default</th>
	        	<th style="text-align: left;"><?php echo htmlspecialchars($this->rs['language_name']); ?></th>
	        </tr>
	        </thead>
	        <?php foreach($this->lang_default as $key => $language){
	        	if ($key == 'date_text') continue;
	        	?>
	        	<tr>
	        		<td><?php echo htmlspecialchars($language);?></td>
	        		<td><input type="text" name="<?php echo htmlspecialchars($key); ?>" style="width: 98%;" value="<?php 
	        		if (isset($this->lang[$key])){
	        			echo str_replace('"', '&quot;', $this->lang[$key]);
	        		}else{
						echo '';
					} ?>"></td>
	        	</tr>
			<?php }?>
			</table>
        </form>
</div>
    
<script>
function back() {
    window.location = "<?php echo strUrl('admin/language/index.php?xtype=index'); ?>";
}

function translateLanguage(){
	$('.alert').remove();
	$.post(window.location.href,$('#frm_translate').serialize(),function(o){
		if (o.error == 0){
			var strAlertSuccess = '<div class="alert alert-success" style="position: fixed; right:3px; bottom:20px; -webkit-box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; -moz-box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; display: none;">' +
	        '<button data-dismiss="alert" class="close" type="button">×</button>' +
	        '<?php echo $lang->line('you_successfully_saved');?>' +
	        '</div>';
	        var alertSuccess = $(strAlertSuccess).appendTo('body');
	        alertSuccess.show();
	        
	        setTimeout(function(){ 
	            alertSuccess.remove();
	        },2000);
		}else{
			var strAlertSuccess = '<div class="alert alert-error" style="position: fixed; right:3px; bottom:20px; -webkit-box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; -moz-box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; display: none;">' +
	        '<button data-dismiss="alert" class="close" type="button">×</button>' +
	        o.error_message +
	        '</div>';
	        var alertSuccess = $(strAlertSuccess).appendTo('body');
	        alertSuccess.show();
		}
        
	},'json');	
}

</script>