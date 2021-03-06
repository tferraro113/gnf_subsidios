<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?php echo __HTML_CHARSET__; ?>">
        <title>PHP Admin Pro V1.1 INSTALLATION</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?php echo __MEDIA_PATH__; ?>css/template.css" rel="stylesheet">
        <link href="<?php echo __MEDIA_PATH__; ?>css/style.css" rel="stylesheet">
        <style>
            body {
                padding:0px;
                background-color: #f5f5f5;
                margin: 2em auto;
                max-width: 900px;
                padding: 1em 2em;
            }

            .form-signin {
                max-width: 350px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
                border-radius: 10px;
                -webkit-box-shadow: 0 8px 20px rgba(0,0,0,0.4);
                -moz-box-shadow: 0 8px 20px rgba(0,0,0,0.4);
                box-shadow: 0 8px 20px rgba(0,0,0,0.4);
            }

            .control-group{
                margin-bottom: 10px !important;
            }
        </style>
        <script src="<?php echo __MEDIA_PATH__; ?>jquery/jquery-1.8.2.min.js"></script>
        <script src="<?php echo __MEDIA_PATH__; ?>bootstrap/js/bootstrap.min.js"></script>

    </head>
    <body>
        <?php $this->com->load('main_content'); ?> 
    </body>
</html>