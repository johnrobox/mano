<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo (isset($page_title)) ? $page_title : 'Mano'; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/backend/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>css/backend/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/backend/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>css/backend/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- custom style -->
    <link href="<?php echo base_url();?>css/backend/custom.css" rel="stylesheet" type="text/css">
    
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>js/backend/jquery.min.js"></script>
    
    <link rel="stylesheet" href="<?php echo base_url();?>datatables/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>datatables/css/dataTables.responsive.css">


    <script src="<?php echo base_url();?>datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>datatables/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>datatables/js/dataTables.responsive.js"></script>
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>js/common-script.js"></script>
    <?php 
    if (isset($script)) {
            foreach ($script as $js) { ?>
            <script src="<?php echo base_url().'js/administrator/'.$js;?>.js"></script>
    <?php } }?>
    <script src="<?php echo base_url(); ?>js/administrator/logout.js"></script>

</head>


