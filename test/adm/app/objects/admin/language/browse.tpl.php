<?php $lang = Lang::singleton(); ?>
<div class="container">
		<h2><?php echo $lang->line('tool_language_manager');?></h2>
        <ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
            <li><a href="<?php echo strUrl('admin/component/builder.php'); ?>"> <?php echo $lang->line('components'); ?> </a></li>
            <li><a href="<?php echo strUrl('admin/component/groups.php'); ?>"> <?php echo $lang->line('group_component'); ?> </a></li>
            <li><a href="<?php echo strUrl('admin/table/index.php'); ?>"><?php echo $lang->line('table_builder'); ?></a></li>
            <li class="active"><a href="<?php echo strUrl('admin/language/index.php'); ?>"> <?php echo $lang->line('language_manager'); ?> </a></li>
        </ul>
        <?php echo $this->content; ?>
    </div>