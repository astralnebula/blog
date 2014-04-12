<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $title ?> </title>
        <meta name="description" content="<? echo $this->config->item('app_description'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <?php echo $metadata; ?>




        <link rel="stylesheet" href="<?php echo $this->config->base_url('assets/css/style.css'); ?>">
        <link rel="stylesheet" href="<?php echo $this->config->base_url('assets/css/main.css'); ?>">
        <?php echo $css; ?>



        <!--[if lt IE 9]>
            <script src="<?php echo assets_url('js/html5shiv.min.js'); ?>"></script>
            <script src="<?php echo assets_url('js/respond.min.js'); ?>"></script>
        <![endif]-->
    </head>
    <body>
        <?php echo $body; ?>


        <script src="<?php echo site_url().assets_url('js/jquery.min.js'); ?>"></script>
        <script src="<?php echo site_url().assets_url('js/bs.min.js'); ?>"></script>
        <script src="<?php echo site_url().assets_url('js/main.js'); ?>"></script>
        <script src="<?php echo site_url().assets_url('js/angular.js'); ?>"></script>

        <?php echo $js; ?>


        <?php if ( ! empty($ga_id)): ?><!-- Google Analytics -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','<?php echo $ga_id; ?>');ga('send','pageview');
        </script>
        <?php endif; ?>
        
    </body>
</html>
