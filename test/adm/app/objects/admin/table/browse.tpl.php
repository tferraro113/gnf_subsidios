<?php $lang = Lang::singleton(); ?>
<div class="container">
		<h2><?php echo $lang->line('tool_table_builder'); ?></h2>
        <ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
            <li><a href="<?php echo strUrl('admin/component/builder.php'); ?>"> <?php echo $lang->line('components'); ?> </a></li>
            <li><a href="<?php echo strUrl('admin/component/groups.php'); ?>"> <?php echo $lang->line('group_component'); ?> </a></li>
            <li class="active"><a href="<?php echo strUrl('admin/table/index.php'); ?>"><?php echo $lang->line('table_builder'); ?></a></li>
            <li><a href="<?php echo strUrl('admin/language/index.php'); ?>"> <?php echo $lang->line('language_manager'); ?> </a></li>
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
       		
            <div style="text-align:right;width:100%;">
                <a class="btn btn-info" href="<?php echo strUrl('admin/table/new.php'); ?>"><i class="icon-plus icon-white"></i> <?php echo $lang->line('add_table'); ?></a>
            </div>
        </div>
    </div>
 </div>
<div class="container">
        <div>
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="text-align:center;width:30px; cursor:default; color:#333333;text-shadow: 0 1px 0 #FFFFFF;background-color: #e6e6e6;"><?php echo $lang->line('no_'); ?></th>
                        <th style=" cursor:default; color:#333333;text-shadow: 0 1px 0 #FFFFFF;background-color: #e6e6e6;"><?php echo $lang->line('tables'); ?></th>
                        <th style="text-align:center; width: 120px;  cursor:default; color:#333333;text-shadow: 0 1px 0 #FFFFFF;background-color: #e6e6e6;"><?php echo $lang->line('actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    global $da;
                    if (count($this->tables) > 2) {
                        foreach ($this->tables as $k => $table) {
                            if ($table == 'cruds')
                                continue;
                            if (strpos($table, 'crud_') !== false)
                                continue;
                            
                            $comDao = new GenericDao('crud_components', $da);
                            $params = array();
                            $params['conditions'] = array('component_table = ?',array($table));
                            $coms = $comDao->findFirst($params);
                            ?>
                            <tr>
                                <td style="text-align:center;"><?php echo ($k + 1); ?></td>
                                <td><?php echo $table; ?></td>
                                <td style="text-align: center;">
                                    <a type="button" class="btn btn-mini btn-info" id="table_btn_fields" onclick="edit_table('<?php echo $table; ?>')"><?php echo $lang->line('edit'); ?></a>
                                    <?php if (empty($coms)){?>
                                    <a type="button" class="btn btn-mini btn-danger" id="table_btn_delete" onclick="modal_delete_table('<?php echo $table; ?>');"><?php echo $lang->line('delete'); ?></a>
                                    <?php }else{ ?>
                                    <a type="button" class="btn btn-mini btn-danger" id="table_btn_delete" onclick="alert_modal_delete_table('<?php echo $table; ?>');"><?php echo $lang->line('delete'); ?></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="4"><?php echo $lang->line('no_data_to_display'); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

</div>
<script>
	function modal_delete_table(table){
		$.sModal({
			image: '<?php echo __MEDIA_PATH__; ?>icons/error.png',
	        animate: 'fadeDown',
	        content:"Are you sure you want to delete <b>"+table+"</b>?",
	        buttons: [
	            {
	                text: ' <i class="icon-remove icon-white"></i>  Delete  ',
	                addClass: 'btn-danger',
	                click: function(id, data) {
	                	delete_table(table);
	                    $.sModal('close', id);
	                }
	            },
	            {
	                text: ' Cancel ',
	                click: function(id, data) {
	                    $.sModal('close', id);
	                }
	            }
	        ]
	    });
	}

	function alert_modal_delete_table(table){
		$.sModal({
			image: '<?php echo __MEDIA_PATH__; ?>icons/error.png',
	        animate: 'fadeDown',
	        content:"you can not delete <b>"+table+"</b> table because there is at least one component  are created from this table.",
	        buttons: [
	            {
	                text: ' Cancel ',
	                click: function(id, data) {
	                    $.sModal('close', id);
	                }
	            }
	        ]
	    });
	}
	
    function edit_table(table){
        window.location = '<?php echo strUrl('admin/table/edit.php?table='); ?>'+table;
    }
    function delete_table(table){
        $.post('<?php echo strUrl('admin/table/delete.php'); ?>', {table:table}, function(data){
            $('#delModal').modal('hide');
            window.location = '<?php echo strUrl('admin/table/index.php'); ?>';
        },'html');
    }
    $(document).ready(function(){
        $('title').html($('h2').html());
    });
</script>