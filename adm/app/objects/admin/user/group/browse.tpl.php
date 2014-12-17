<?php $lang = Lang::singleton(); ?>
<div class="container" >
		<h2><?php echo $lang->line('user_manager_groups'); ?>	</h2>
        <ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
        <?php if ((int) $_SESSION['CRUD_AUTH']['group']['group_manage_flag'] == 1 || 
        		(int) $_SESSION['CRUD_AUTH']['group']['group_manage_flag'] == 3 ||
        		(int) $_SESSION['CRUD_AUTH']['user_manage_flag'] == 1 || 
        		(int) $_SESSION['CRUD_AUTH']['user_manage_flag'] == 3 ) { ?>
            <li><a href="<?php echo strUrl('admin/user/user.php'); ?>"> &nbsp; <?php echo $lang->line('users');?> &nbsp; </a></li>
            <li class="active"><a href="<?php echo strUrl('admin/user/group.php'); ?>"><?php echo $lang->line('groups');?></a></li>
            <li ><a href="<?php echo strUrl('admin/user/permission.php'); ?>"><?php echo $lang->line('permissions');?></a></li>
          <?php } ?>
          </ul>
        <?php echo $this->content; ?>
</div>