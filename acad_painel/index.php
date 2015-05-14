<?php require_once("funcoes.php");?>

<!DOCTYPE html>
<html lang="pr_BR">

	<head>
		<meta charset="utf-8">
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
			
		<?php 
			loadCSS('reset'); loadCSS('style'); loadCSS('menu');
			loadJS('jquery'); loadJS('geral'); 
		?>
		
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
	    
	    <title> Painel Administrativo </title>
	</head>
	<body>
		<?php loadModulo('usuario','login'); ?>
		 		
	</body>
</html>

