<?php
	require_once("funcoes.php");
	protegeArquivo(basename(__FILE__));
	$sessao = new sessao();
	verificaLogin();	
?>

<!DOCTYPE html>
	<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> 
	<![endif]-->
	<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> 
	<![endif]-->
	<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR"> <!--<![endif]-->
		
    <head>
        <title> ACAD Engenharia </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta charset="UTF-8">
        <!-- Bootstrap Core CSS -->
	    <link href="bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
	
	    <!-- MetisMenu CSS -->
	    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
	
	    <!-- Timeline CSS -->
	    <link href="dist/css/timeline.css" rel="stylesheet">
	
	    <!-- Custom CSS -->
	    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
	
	    <!-- Morris Charts CSS -->
	    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">
	
	    <!-- Custom Fonts -->
	    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <?php
        	//CSS Bootstrap & Custom
        	loadCSS('reset'); loadCSS('style');
			//JavaScripts
        	loadJS('jquery'); loadJS('geral');
        ?>
		<title> Painel Administrativo </title>

        <!--[if lt IE 8]>
	    <div style=' clear: both; text-align:center; position: relative;'>
            <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
        </div>
        <![endif]-->
        
    </head>
    
	<body>
	    <div id="wrapper">
	
	        <!-- Navigation -->
	        <?php include('navigation.php'); ?>
	
	        <div id="page-wrapper">	