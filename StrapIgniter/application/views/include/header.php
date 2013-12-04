<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <title><? echo($title) ?></title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">
    <?php
        if (session_id() == ''){ session_start();}
        $styles = array(0=>'cosmo-',1=>'spacelab-',2=>'spruce-',3=>'united-',4=>'journal-',5=>'cyborg-', 6=>'simplex-',7=>'');
        if(isset($_SESSION['stylenumber']))
        {
            $csstypenumber=$_SESSION['stylenumber'];

        }
        else
        {
            $csstypenumber= rand(0, 7);
            $_SESSION['stylenumber']=$csstypenumber;
        }



    ?>
    <!-- Le styles -->
    <!--bootswatch cosmo ,spacelab ,spruce ,united, journal ,cyborg ,simplex
    <link href="http://equipboard.com/assets/application-f797420b39621eacf835fece3e368a19.css"  rel="stylesheet">
     -->
    <link href="<?=base_url('assets/uploadify/css/uploadify.css')?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/'.$styles[$csstypenumber].'bootstrap.min.css') ?>"  rel="stylesheet">
    <link href="<?=base_url('assets/css/bootstrap-responsive.css')?>" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="<?= base_url('assets/ico/favicon.ico')?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/ico/apple-touch-icon-144-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/ico/apple-touch-icon-114-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url('assets/ico/apple-touch-icon-72-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" href="<?=base_url('assets/ico/apple-touch-icon-57-precomposed.png')?>">

    <link href="<?= base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="<?= base_url('assets/css/custom.css')?>" rel="stylesheet">
</head>
<body>
