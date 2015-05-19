<?php require_once("funcoes.php");?>

<!DOCTYPE html>
<html lang="pr_BR">

	<head>
		<meta charset="utf-8">
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
		
		
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
		<div class="container">
		    <div class="row">
		        <div class="col-md-4 col-md-offset-4">
		            <div class="login-panel panel panel-default">
		                <div class="panel-heading">
		                    <h3 class="panel-title"> Por Favor, indentifique-se!</h3>
		                </div>
		                <div class="panel-body">
							<form role="form" class="loginform" method="post" action="">
								<fieldset>
										<div class="form-group">
											<input class="form-control" placeholder="E-mail" type="email" name="email" autofocus="autofocus" value=" <?php echo $_POST['email']; ?> " />
										</div>
										<div class="form-group">
											<input class="form-control" type="password" placeholder="Password" type="password" name="senha" value=" <?php echo $_POST['senha']; ?> " />
										</div>
										<div class="form-group">
											<input class="btn btn-lg btn-success btn-block" type="submit" name="logar" value="Entrar" />
										</div>
										<?php
											$erro = $_GET['erro'];
											
											switch($erro):
												case 1:
													printMSG('Você fez logoff do sistema! ','sucesso');
												break;
												case 2:
													printMSG('Dados incorretos ou dados inativos!', 'alerta');
												break;
												case 3:
													printMSG('Faça login para acessar a página solicitada!','erro');
												break;
											endswitch;
										?>
								</fieldset>
							</form>
						</div> <!-- painel-body -->
		            </div> <!-- login-panel panel panel-default -->
		        </div> <!-- col-md-4 col-md-offset-4 -->
		    </div> <!-- row -->
		</div> <!-- container -->
		 		
	</body>
</html>

