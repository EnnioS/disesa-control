<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="" />
    <title>DISESA - CONTROL</title>

    <!--favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/fuente.css" >
    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/daterangepicker.css" >
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/materialize.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/materialize-v1-0-0.min.css">

    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/media/icon.css">

    <link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/style.css">

    <!--<link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/styles.css">-->
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/media/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/bootstrap.css">
    <!--<link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/select2.min.css">-->
    <!--<link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/chosen.css">-->
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/dataTables.tableTools.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/myToolTips.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/jquery-ui.min.css">

    <style>
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }


        .modal { width: 70% !important ; height: 80% !important ;}

        #tblArticulos,#tblTransacciones,#tblBodega,#tblLotes,#tblprecios,#tblbonificados,#tbl6Meses,#tbl12Meses{
            text-transform:uppercase;
            font-family: 'robotoregular';
        }
        .select-dropdown{
           -webkit-appearance: none;  /*Removes default chrome and safari style*/
           -moz-appearance: none;
        }



        .tabs .indicator { background-color: black;}

        .tabs .tab a.active {color: black;}

        .tabs .tab a:hover {color: #59BA47;}

        .tabs .tab a {color: black;}

    </style>

</head>
<body class="cls_body">
    <nav id="nav-tablet" style="background: black">
        <div class="nav-wrapper">
          <a href="#!"  class="brandHeader" style="font-size: 1.5rem">DISESA</a>
          <a href="#!" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
