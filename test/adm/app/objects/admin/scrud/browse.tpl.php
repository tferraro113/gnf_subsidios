<?php
global $config_database;
$auth = Auth::singleton();
?>
<div class="container" >
		<h2><?php echo $this->conf['title']; ?></h2>
		<?php if (!empty($this->coms)){?>
		<ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
            <?php foreach ($this->coms as $com){
				$permissions = $auth->getPermissionType($com['id']);
				if (!in_array(4, $permissions)) continue;
				if (!file_exists(__DATABASE_CONFIG_PATH__ . '/' . $config_database['default']["database"] . '/' .sha1('com_'.$com['id']).'/'.$com['component_table'].'.php' )) continue;
				?>
			<li <?php if ($com['id'] == $_GET['com_id']){?> class="active" <?php }?>><a href="<?php echo strUrl('admin/scrud/browse.php?com_id='.$com['id']); ?>"><?php echo $com['component_name']?></a></li>
			<?php } ?>
        </ul>
        <?php } ?>
		<?php echo $this->content; ?>
</div>