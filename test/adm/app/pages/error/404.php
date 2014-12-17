<?php $lang = Lang::singleton(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $lang->line('php_admin_pro'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?php echo __MEDIA_PATH__; ?>css/template.css" rel="stylesheet">
        <style>
.center {
	text-align: center;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: auto;
	margin-top: auto;
}
body{
	padding-top:0px;
}
</style>

    </head>

    <body>
        <div class="hero-unit center">
	<h1>
		<?php echo $lang->line('page_not_found'); ?> <small><font face="Tahoma" color="red"><?php echo $lang->line('error'); ?> 404</font>
		</small>
	</h1>
	<br>
	<p>
		<?php echo $lang->line('404_messages'); ?>
	</p>
	<p>
		<b><?php echo $lang->line('you_could_just_press'); ?></b>
	</p>
	<a class="btn btn-large btn-info" href="<?php echo strUrl('admin/dashboard'); ?>"><i
		class="icon-home icon-white"></i> <?php echo $lang->line('take_me_home'); ?></a>
</div>
    </body>
</html>



