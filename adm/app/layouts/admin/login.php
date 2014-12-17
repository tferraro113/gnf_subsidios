<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php echo __HTML_CHARSET__; ?>">
	<title><?php $this->com->load('header_title'); ?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Le styles -->
	<link href="<?php echo __MEDIA_PATH__; ?>css/template.css" rel="stylesheet">
	<link href="<?php echo __MEDIA_PATH__; ?>bootstrap-modal/css/animate.min.css" rel="stylesheet">
	<script src="<?php echo __MEDIA_PATH__; ?>jquery/jquery-1.8.2.min.js"></script>
	<script src="<?php echo __MEDIA_PATH__; ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo __MEDIA_PATH__; ?>bootstrap-modal/js/bootstrap.modal.js"></script>
	<script src="<?php echo __MEDIA_PATH__; ?>bootstrap-modal/js/jquery.easing.1.3.js"></script>
	<style type="text/css">
	body{
		padding-top:40px;
		height: auto;
	}
	</style>
</head>
<body>
	<?php $this->com->load('main_content'); ?>
</body>
</html>
