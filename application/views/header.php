<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Datubāzes 2 pr/d</title>
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" media="screen">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="http://d3js.org/d3.v3.min.js"></script>
    </head>
    <body>
        <div class="navbar navbar-static-top">
            <div class="navbar-inner">            
                <a class="brand" href="<?php echo base_url('/Product'); ?>">Datubāzes 2</a>            
                <ul class="nav">
                    <li class=""><a href="<?php echo base_url('/Product'); ?>">Produkti</a></li>
                    <li class=""><a href="<?php echo base_url('/Products_public/all_persons'); ?>">Personas</a></li>
                    <li class=""><a href="<?php echo base_url('/Products_public/places'); ?>">Vietas</a></li>
                    <li class=""><a href="<?php echo base_url('/Products_public'); ?>">Reklamēšanās reizes</a></li>
                    <li class=""><a href="<?php echo base_url('/Products_public/lv_publiced'); ?>">Latvijā reklamētie produkti</a></li>
                    <li class=""><a href="<?php echo base_url('/Products_public/firm_public'); ?>">Firmu reklamēšanās reizes</a></li>
                    <li class=""><a href="<?php echo base_url('/Products_public/set_client_group'); ?>">Uzstādīt g. prcedūra</a></li>
                </ul>

            </div>
        </div>
        <div class="center_elem">