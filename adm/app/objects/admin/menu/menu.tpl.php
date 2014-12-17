<?php
$lang = Lang::singleton();
global $config_database;
$auth = Auth::singleton();
?>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"><a class="btn btn-navbar"
                                  data-toggle="collapse" data-target=".nav-collapse"> <span
                    class="icon-bar"></span> <span class="icon-bar"></span> <span
                    class="icon-bar"></span> </a> 
                    <img class="brand" style="padding-top:0px;padding-bottom:0px;" src="<?php echo strUrl('public/media/images/').'logo-header.png'; ?>"></img>
                    <a class="brand" href="<?php echo strUrl('admin/dashboard'); ?>"><?php echo $lang->line('php_admin_pro'); ?></a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li <?php if ($this->type == 'dashboard') { ?>class="active"<?php } ?>><a href="<?php echo strUrl('admin/dashboard'); ?>"><?php echo $lang->line('main'); ?></a></li>
                    <?php if ((int) $_SESSION['CRUD_AUTH']['group']['group_manage_flag'] == 1 || 
		                    (int) $_SESSION['CRUD_AUTH']['group']['group_manage_flag'] == 3 ||
		                    (int) $_SESSION['CRUD_AUTH']['user_manage_flag'] == 1 ||
		                    (int) $_SESSION['CRUD_AUTH']['user_manage_flag'] == 3) { ?>
                        <li class="dropdown <?php if ($this->type == 'user') { ?>active<?php } ?>">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $lang->line('users'); ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo strUrl('admin/user/user.php'); ?>"><?php echo $lang->line('user_manager');?></a></li>
                                <li><a href="<?php echo strUrl('admin/user/group.php'); ?>"><?php echo $lang->line('groups');?></a></li>
                                <li><a href="<?php echo strUrl('admin/user/permission.php'); ?>"><?php echo $lang->line('permissions');?></a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    
					<li class="dropdown <?php if ($this->type == 'component') { ?>active<?php } ?>" id="mnu_component"><a data-toggle="dropdown"
						class="dropdown-toggle" href="#"><?php echo $lang->line('components'); ?> <b
							class="caret"></b> </a>
						<ul class="dropdown-menu">
							<?php foreach ($this->mnuGroup as $v){
								if (empty($v['coms'])) continue;
								?>
							<li class="dropdown-submenu">
								<a href="#" tabindex="-1" onclick="clickGroup(this); return false;"><?php echo $v['name'];?></a>
								<ul class="dropdown-menu">
									<?php foreach ($v['coms'] as $com){
										$permissions = $auth->getPermissionType($com['id']);
										if (!in_array(4, $permissions)) continue;
										?>
									<li><a href="<?php echo strUrl('admin/scrud/browse.php?com_id='.$com['id']); ?>"><?php echo $com['component_name']?></a></li>
									<?php } ?>
								</ul>
							</li>
							<?php } ?>
							<?php foreach ($this->coms as $com){
								if (in_array($com['id'], $this->exComs)) continue;
								$permissions = $auth->getPermissionType($com['id']);
								if (!in_array(4, $permissions)) continue;
							?>
							<li><a href="<?php echo strUrl('admin/scrud/browse.php?com_id='.$com['id']); ?>"><?php echo $com['component_name']?></a></li>
							<?php }?>
						</ul>
					</li>
					<?php if ((int) $_SESSION['CRUD_AUTH']['group']['group_manage_flag'] == 2 || 
		                    (int) $_SESSION['CRUD_AUTH']['group']['group_manage_flag'] == 3 ||
		                    (int) $_SESSION['CRUD_AUTH']['user_manage_flag'] == 2 ||
		                    (int) $_SESSION['CRUD_AUTH']['user_manage_flag'] == 3) { ?>
					<li class="dropdown  <?php if ($this->type == 'tool') { ?>active<?php } ?>" ><a data-toggle="dropdown"
						class="dropdown-toggle" href="#"><?php echo $lang->line('tools'); ?><b
							class="caret"></b> </a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo strUrl('admin/component/builder.php'); ?>"><?php echo $lang->line('component_builder'); ?></a></li>
							<li><a href="<?php echo strUrl('admin/component/groups.php'); ?>"><?php echo $lang->line('group_component'); ?></a></li>
							<li class="divider"></li>
							<li><a href="<?php echo strUrl('admin/table/index.php'); ?>"><?php echo $lang->line('table_builder'); ?></a></li>
							<li><a href="<?php echo strUrl('admin/language/index.php'); ?>"><?php echo $lang->line('language_manager'); ?></a></li>
						</ul>
					</li>
					<?php } ?>
					<?php if ($auth->isSettingManagement()){?>
					<li class="dropdown <?php if ($this->type == 'setting') { ?>active<?php } ?>"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown"><?php echo $lang->line('settings');?> <b class="caret"></b>
					</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo strUrl('admin/setting/index.php'); ?>"><?php echo $lang->line('general')?></a></li>
							<li class="nav-header"><?php echo $lang->line('email_templates'); ?></li>
							<li><a href="<?php echo strUrl('admin/setting/email/new_user.php'); ?>"><?php echo $lang->line('new_user');?></a></li>
							<li><a href="<?php echo strUrl('admin/setting/email/reset_password.php'); ?>"><?php echo $lang->line('reset_password'); ?></a></li>
						</ul></li>
					<?php } ?>
				</ul>
                <ul class="nav pull-right">
                    <!-- <li class="divider-vertical"></li> -->
                    <li class="dropdown   <?php if ($this->type == 'account') { ?>active<?php } ?>">
                        <a class=" dropdown-toggle" data-toggle="dropdown" href="#" > &nbsp;  <i class="icon icon-user"></i>&nbsp; <?php echo $_SESSION['CRUD_AUTH']['user_name']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        	<?php if ($auth->isSettingManagement()){?>
							<li><a href="<?php echo strUrl('admin/setting/index.php'); ?>"> <i class="icon-cog"></i> <?php echo $lang->line('settings');?></a></li>
							<?php } ?>
                            <?php if ($_SESSION['CRUD_AUTH']['group']['group_name'] != 'SystemAdmin') { ?>
                                <li><a href="<?php echo strUrl('user/editProfile.php'); ?>"> <i class="icon-user"></i> <?php echo $lang->line('edit_profile');?></a></li>
                                <li><a href="<?php echo strUrl('user/changePassword.php'); ?>"> <i class="icon-pencil"></i> <?php echo $lang->line('change_password');?></a></li>
                                <li class="divider"></li>
                            <?php } ?>
                            <li><a href="<?php echo strUrl('admin/logout.php'); ?>"> <i class="icon-minus-sign"></i> <?php echo $lang->line('log_out');?></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
	function clickGroup(obj){
		window.location = $(obj).parent().find('ul').find('a:first').attr('href');
	}
    $(document).ready(function(){
    	$('#mnu_component > ul > li').each(function(){
			if ($(this).hasClass('dropdown-submenu')){
				if ($(this).find('li').length <= 0){
					$(this).remove();
				}
			}
       });
        
       if ($('#mnu_component').children('ul').find('li').length <= 0){
           $('#mnu_component').hide();
       }else{
           $('#mnu_component').show();
       } 
    });
</script>