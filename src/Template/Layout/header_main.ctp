<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= COMPANY_NAME ?> : <?= (isset($page_title) ? $page_title : $this->fetch('title')) ?></title>
    <meta name="title" content="<?php if(isset($mt_for_layout)) { echo $mt_for_layout; } ?>">
    <meta name="keywords" content="<?php if(isset($mk_for_layout)) { echo $mk_for_layout; } ?>">
    <meta name="description" content="<?php if(isset($md_for_layout)) { echo $md_for_layout; } ?>">
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('front/bootstrap'); 
        echo $this->Html->css('front/main');
        echo $this->Html->css('front/font-awesome');        
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>        
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->  
</head>
<body class="page-template page-template-onecolumn-page page-template-onecolumn-page-php page page-id-15 desktop chrome">