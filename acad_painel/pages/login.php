<?php 
	require_once("funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

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
							<ul>
								<div class="form-group">
									<input class="form-control" placeholder="E-mail" type="email" name="email" autofocus="autofocus" value=" <?php echo $_POST['email']; ?> " />
								</div>
								<div class="form-group">
									<input class="form-control" type="password" placeholder="Password" type="password" name="senha" value=" <?php echo $_POST['senha']; ?> " />
								</div>
								
								<input class="btn btn-lg btn-success btn-block" type="submit" name="logar" value="Entrar" /> 
								
							</ul>
							<?php
								$erro = $_GET['erro'];
								switch($erro):
									case 1:
										printMSG('Você fez logoff do sistema!','sucesso');
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