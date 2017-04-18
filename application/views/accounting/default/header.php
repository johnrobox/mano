<!DOCTYPE html>
<html>
  <head>
      <title><?php echo (isset($page_title)) ? $page_title : "Accounting"; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>css/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url();?>css/accounting/styles.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/common-style.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo base_url();?>js/lib/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>js/common-script.js"></script>
    <script src="<?php echo base_url(); ?>js/accounting/logout.js"></script>
    <?php 
    if (isset($script)) {
            foreach ($script as $js) { ?>
            <script src="<?php echo base_url().'js/accounting/'.$js;?>.js"></script>
    <?php } }?>
  </head>
  <body>