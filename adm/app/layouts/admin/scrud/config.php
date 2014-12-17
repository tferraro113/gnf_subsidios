<?php $lang = Lang::singleton(); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?php echo __HTML_CHARSET__; ?>">
        <title><?php echo $lang->line('php_admin_pro'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="<?php echo __MEDIA_PATH__; ?>css/template.css" rel="stylesheet">
        <link href="<?php echo __MEDIA_PATH__; ?>jquery/ui/css/smoothness/jquery-ui-1.9.1.custom.min.css" rel="stylesheet">
        <link href="<?php echo __MEDIA_PATH__; ?>css/style.css" rel="stylesheet">
        <link href="<?php echo __MEDIA_PATH__; ?>select2/select2.css" rel="stylesheet">

        <script src="<?php echo __MEDIA_PATH__; ?>jquery/jquery-1.8.2.min.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>jquery/ui/jquery-ui-1.9.1.custom.min.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>bootstrap/js/bootstrapx-clickover.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>ckeditor/ckeditor.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>select2/select2.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>js/config-element.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>js/config-common.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>js/config-form.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>js/options/text-options.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>js/options/password-options.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>js/options/textarea-options.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>js/options/select-options.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>js/options/radio-options.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>js/options/checkbox-options.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>js/options/image-options.js"></script>
    </head>
<style>
.popover.left .arrow {
	display: none;
}

.tab-content {
	overflow: visible;
}

#frm_preview {
	padding: 10px 10px 0 10px;
	border: 1px solid #DDDDDD;
	border-radius: 5px;
	background: #FBFBFB;
}
#form-fields > li {
	text-align:left;
}
</style>
    <body>
        <?php $this->com->load('main_menu'); ?>
        <?php $this->com->load('main_content'); ?>
        <?php $this->com->load('main_footer'); ?>
    </body>
</html>
