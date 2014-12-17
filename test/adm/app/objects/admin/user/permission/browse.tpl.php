<?php $lang = Lang::singleton(); ?>
<div class="container">
		<h2><?php echo $lang->line('user_manager_permission');?>	</h2>
        <ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 10px;">
            <?php if ((int) $_SESSION['CRUD_AUTH']['group']['group_manage_flag'] == 1 || 
            		(int) $_SESSION['CRUD_AUTH']['group']['group_manage_flag'] == 3 ||
            		(int) $_SESSION['CRUD_AUTH']['user_manage_flag'] == 1 || 
            		(int) $_SESSION['CRUD_AUTH']['user_manage_flag'] == 3 ) { ?>
            <li><a href="<?php echo strUrl('admin/user/user.php'); ?>"> &nbsp; <?php echo $lang->line('users');?> &nbsp; </a></li>
            <li><a href="<?php echo strUrl('admin/user/group.php'); ?>"><?php echo $lang->line('groups');?></a></li>
            <li  class="active"><a href="<?php echo strUrl('admin/user/permission.php'); ?>"><?php echo $lang->line('permissions');?></a></li>
          <?php } ?>
        </ul>
        
         <ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 10px;">
         	<li class="active"><a href="<?php echo strUrl('admin/user/permission.php'); ?>"><?php echo $lang->line('group_permissions');?></a></li>
         	<li><a href="<?php echo strUrl('admin/user/user_permission.php'); ?>"><?php echo $lang->line('user_permissions');?></a></li>
         </ul>
        <div>
            <div>
                <p><strong><?php echo $lang->line('groups');?></strong></p>

                <div class="tabbable tabs-left">
                    <ul class="nav nav-tabs" id="p_t">
                        <?php 
                            foreach($this->groups as $group){ 
                                $gid = strtolower(str_replace(' ', '_', $group['group_name']));
                        ?>
                            <li ><a href="#<?php echo $gid; ?>" data-toggle="tab"><?php echo $group['group_name'] ?></a></li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content" id="permissions">
                        <?php 
                            foreach($this->groups as $group){ 
                                $gid = strtolower(str_replace(' ', '_', $group['group_name']));
                        ?>
                        <div class="tab-pane" id="<?php echo $gid; ?>">
                            <input type="hidden" name="group_id" id="group_id" value="<?php echo $group['id']; ?>" />
                            <p><strong><?php echo $lang->line('administrator_levels');?> </strong></p>
                            <label class="checkbox inline">
                                <input type="checkbox" id="group_user_management" value="1" <?php if ((int)$group['group_manage_flag'] == 1 || (int)$group['group_manage_flag'] == 3){ ?> checked="checked" <?php } ?> /> <?php echo $lang->line('user_management'); ?>
                            </label>
                            
                            <label class="checkbox inline">
                                <input type="checkbox" id="group_database_management" value="2" <?php if ((int)$group['group_manage_flag'] == 2  || (int)$group['group_manage_flag'] == 3){ ?> checked="checked" <?php } ?> /> <?php echo $lang->line('tool_management'); ?>
                            </label>
                            
                            <label class="checkbox inline">
                                <input type="checkbox" id="group_setting_management" value="1" <?php if (isset($group['group_setting_management']) && (int)$group['group_setting_management'] == 1){ ?> checked="checked" <?php } ?> /> <?php echo $lang->line('setting_management'); ?> 
                            </label>
                            <label class="checkbox inline">
                                <input type="checkbox" id="group_global_access" value="1" <?php if (isset($group['group_global_access']) && (int)$group['group_global_access'] == 1){ ?> checked="checked" <?php } ?> /> <?php echo $lang->line('global_access'); ?>
                            </label>
                            <br/>
                            <br/>
                            <p><strong><?php echo $lang->line('manage_components'); ?></strong></p>
                            <table class="table table-bordered table-condensed" style="width: auto;">
                                <thead>
                                <tr>
                                    <th style="width: 30px;cursor:default; color:#333333;text-shadow: 0 1px 0 #FFFFFF;background-color: #e6e6e6;"><?php echo $lang->line('no_'); ?></th>
                                    <th style="width: 300px;cursor:default; color:#333333;text-shadow: 0 1px 0 #FFFFFF;background-color: #e6e6e6;"><?php echo $lang->line('component_name'); ?></th>
                                    <th style="width: 50px;cursor:default; color:#333333;text-shadow: 0 1px 0 #FFFFFF;background-color: #e6e6e6;">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; foreach($this->coms as $k => $com){ 
                                $i++;
                                ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $i ?></td>
                                    <td><?php echo $com['component_name']; ?></td>
                                    <td style="text-align:center;">
                                        <input type="hidden" name="com_id" id="com_id" value="<?php echo $com['id']; ?>" />
                                        <div style="width: 460px;">
											<label class="checkbox inline">
												<input type="checkbox" value="1" name="add" <?php if (isset($this->pt[$group['id'].'_'.$com['id'].'_1']) && (int)$this->pt[$group['id'].'_'.$com['id'].'_1'] == 1){ ?> checked="checked" <?php } ?> /> <?php echo $lang->line('add');?>
											</label>
											<label class="checkbox inline">
												<input type="checkbox" value="2" name="edit" <?php if (isset($this->pt[$group['id'].'_'.$com['id'].'_2']) && (int)$this->pt[$group['id'].'_'.$com['id'].'_2'] == 2){ ?> checked="checked" <?php } ?>  /> <?php echo $lang->line('edit');?>
											</label>
											<label class="checkbox inline">
												<input type="checkbox" value="3" name="delete" <?php if (isset($this->pt[$group['id'].'_'.$com['id'].'_3']) && (int)$this->pt[$group['id'].'_'.$com['id'].'_3'] == 3){ ?> checked="checked" <?php } ?>  /> <?php echo $lang->line('delete');?>
											</label>
											<label class="checkbox inline">
												<input type="checkbox"  value="4" name="read" <?php if (isset($this->pt[$group['id'].'_'.$com['id'].'_4']) && (int)$this->pt[$group['id'].'_'.$com['id'].'_4'] == 4){ ?> checked="checked" <?php } ?>  /> <?php echo $lang->line('export_list_search_view');?>
											</label>
											<label class="checkbox inline">
												<input type="checkbox" value="5" name="global_access"  <?php if (isset($this->pt[$group['id'].'_'.$com['id'].'_5']) && (int)$this->pt[$group['id'].'_'.$com['id'].'_5'] == 5){ ?> checked="checked" <?php } ?> /> <?php echo $lang->line('global_access'); ?>
											</label>
										</div>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php } ?>
                    </div>
                </div> 
                <br />
                <div style="padding-left:300px;">
                    <input type="button" class="btn btn-primary" value="<?php echo $lang->line('save');?>" id="btn_save"/>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $($('#p_t  a').get(0)).tab('show');
        $('#btn_save').click(function(){
            var data = [];
            $('#permissions > div').each(function(){
                var obj = {};
                obj.group_id = $(this).children('#group_id').val();
                obj.group_manage_flag = 0;
                obj.group_setting_management = 0;
                obj.group_global_access = 0;
                obj.coms = [];
                if ($(this).find('input[id="group_user_management"]:checked').val() == '1'){
                    obj.group_manage_flag = obj.group_manage_flag + 1;
                }
                
                if ($(this).find('input[id="group_database_management"]:checked').val() == '2'){
                    obj.group_manage_flag = obj.group_manage_flag + 2;
                }

                if ($(this).find('input[id="group_setting_management"]:checked').val() == '1'){
                    obj.group_setting_management = 1;
                }

                if ($(this).find('input[id="group_global_access"]:checked').val() == '1'){
                    obj.group_global_access = 1;
                }
                $(this).find('table > tbody > tr').each(function(){
                    var com = {}
                    var per = {add:0,edit:0,del:0,read:0,configure:0};

                    if ($(this).find('input[name="add"]:checked').val() == '1'){
                    	per.add = 1;
                    }
                    if ($(this).find('input[name="edit"]:checked').val() == '2'){
                        per.edit = 2;
                    }
                    if ($(this).find('input[name="delete"]:checked').val() == '3'){
                        per.del = 3;
                    }
                    if ($(this).find('input[name="read"]:checked').val() == '4'){
                        per.read = 4;
                    }
                    if ($(this).find('input[name="global_access"]:checked').val() == '5'){
                        per.global_access = 5;
                    }
                    
                    com.com_id = $(this).find('#com_id').val();
                    com.permission_type = per;
                    
                    obj.coms[obj.coms.length] = com;
                });
                
                data[data.length] = obj;
            });
            $.post('<?php echo strUrl('admin/user/savePermission.php'); ?>', {data:data}, function(html){
                var strAlertSuccess = '<div class="alert alert-success" style="position: fixed; right:3px; bottom:20px; -webkit-box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; -moz-box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; display: none;">' +
                '<button data-dismiss="alert" class="close" type="button">×</button>' +
                '<?php echo $lang->line('you_successfully_saved');?>' +
                '</div>';
                var alertSuccess = $(strAlertSuccess).appendTo('body');
                alertSuccess.show();
                setTimeout(function(){ 
                    alertSuccess.remove();
                },2000);
                
            }, 'html');
            
        });
    });
</script>