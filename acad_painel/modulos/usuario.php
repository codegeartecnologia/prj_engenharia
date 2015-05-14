<?php
	require_once(dirname(dirname(__FILE__))."/funcoes.php");
	protegeArquivo(basename(__FILE__));
	loadJS('jquery_validate');
	loadJS('jquery_validate_msg_ptbr');
	
	switch ($tela): 
		case 'login':
			$sessao = new sessao();
			if($sessao->getNvars() > 0 && $sessao->getVar('logado') == TRUE && $sessao->getVar('ip') == $_SERVER['REMOTE_ADDR']):
				redireciona('painel.php');
			endif;			
			if(isset($_POST['logar'])):
				$user = new usuario();
				$user->setValor('email', antiInject($_POST['email']));
				$user->setValor('senha', antiInject($_POST['senha']));
				if($user->doLogin($user)):
					redireciona('painel.php');
				else:
					redireciona('?erro=2');
				endif;				
			endif;			
			include ('pages/login.php');
		break;
		case 'incluir':
			if(isset($_POST['cadastrar'])):
				$user = new usuario(array(
					'nome'=>$_POST['nome'],
					'email'=>$_POST['email'],
					'senha'=>codificaSenha($_POST['senha']),
					'administrador'=>($_POST['adm']=='on') ? 's' : 'n'
				));
				if($user->existeRegistro('email',$_POST['email'])):
					printMSG(' Este email já está cadastrado, escolha outro endereço!', 'erro') ;
					$duplicado = TRUE;
				endif;
				if($duplicado != TRUE):
					$user->inserir($user);
					if($user->linhasafetadas == 1):
						printMSG('Dados inceridos com sucesso! <a href="'.ADMURL.'?m=usuario&t=listar"> Exibir Cadastro </a>') ;
						unset($_POST);
					endif;
				endif;				
			endif;
			include ('pages/usuario/cadastrar.php');
		break;
		case 'listar':
			//echo "<h2> Usuários Cadastrados </h2>";
			loadCSS('data_tables', NULL, TRUE);
			loadJS('jquery_data_tables');
			include ('pages/usuario/listar.php');
		break;
		case 'suporte':
			if(isset($_POST['enviar'])):
				
				require'php_mailer/class.phpmailer.php';
				require'php_mailer/class.smtp.php';
				
				$email = new PHPMailer();
				$email->CharSet = "UTF-8";
				$email->SMTPSecure = "ssl";
				$email->IsSMTP();
				$email->Host = "";
				//col403-m.hotmail.com
				$email->Port = "";
				$email->SMTPAuth = TRUE;
				$email->Username = "";
				$email->Password = "";
				$email->IsHTML(TRUE);
				$email->SetFrom('');
				$email->From = "";
				$email->FromName = "Acad Engenharia";
				$email->AddAddress('djalma.manfrin@hotmail.com');
				$email->Subject = "Solicitação de Suporte";
				$email->Body = $_POST['problema'].'</br>'.$_POST['urgencia'].'</br> </br>'.$_POST['descricao'];
				//$email->MsgHTML();
				
				if($email->Send()):
					echo "Enviado com sucesso!";
				else:
					echo "Erro ao enviar: ".$email->ErrorInfo;
				endif;
			endif;
			include ('pages/usuario/suporte.php');
		break;
		case 'editar':
			$sessao = new sessao();
			if(isAdmin() == TRUE || $sessao->getVar('iduser') == $_GET['id']):
				if(isset($_GET['id'])):
					//faz a edição do usuário
					$id = $_GET['id'];
					if(isset($_POST['editar'])):
						if(isAdmin() == TRUE):
							$user = new usuario(array(
								'nome'=>$_POST['nome'],
								'email'=>$_POST['email'],
								'ativo'=>($_POST['ativo']=='on') ? 's' : 'n',
								'administrador'=>($_POST['adm']=='on') ? 's' : 'n',
							));
						else:
							$user = new usuario(array(
								'nome'=>$_POST['nome'],
								'email'=>$_POST['email'],
							));
						endif;
						$user->valorpk = $id;
						$user->extras_select = "WHERE id=$id";
						$user->selecionaTudo($user);
						$res = $user->retornaDados();
						if($res->email != $_POST['email']):
							if($user->existeRegistro('email',$_POST['email'])):
								printMSG(' Este email já está cadastrado, escolha outro endereço!', 'erro') ;
								$duplicado = TRUE;
							endif;
						endif;
						if($duplicado != TRUE):
							$user->atualizar($user);
							if($user->linhasafetadas == 1):
								printMSG('Dados alterados com sucesso! <a href="'.ADMURL.'?m=usuario&t=listar"> Ver alteração </a>') ;
								unset($_POST);
							else:
								printMSG(' Nenhum dado foi alterado! <a href="'.ADMURL.'?m=usuario&t=listar"> Ver usuários </a>', 'alerta') ;
							endif;
						endif;				
					endif;									
					$userbd = new usuario();
					$userbd->extras_select = "WHERE id=$id";
					$userbd->selecionaTudo($userbd);
					$resbd = $userbd->retornaDados();
				else:
					//avisa para seleciona user
					printMSG('Usuário não definido, <a href="?m=usuario&t=listar"> Escolha um usuário para alterar!</a>','alerta');
				endif;
				include ('pages/usuario/editar.php');
			else:
				printMSG('Você não tem permissão para acessar esta página! <a href="'.ADMURL.'?m=usuario&t=listar"> Voltar </a>','erro');
			endif;
		break;
		case 'senha':
			$sessao = new sessao();
			if(isAdmin() == TRUE || $sessao->getVar('iduser') == $_GET['id']):
				if(isset($_GET['id'])):
					//faz a edição do usuário
					$id = $_GET['id'];
					if(isset($_POST['mudasenha'])):
						$user = new usuario(array(
							'senha'=>codificaSenha($_POST['senha']),
						));
						$user->valorpk = $id;
						$user->atualizar($user);
						if($user->linhasafetadas == 1):
							printMSG('Senha alterada com sucesso! <a href="'.ADMURL.'?m=usuario&t=listar"> Ver alteração </a>') ;
							unset($_POST);
						else:
							printMSG(' Nenhum dado foi alterado! <a href="'.ADMURL.'?m=usuario&t=listar"> Ver usuários </a>', 'alerta') ;
						endif;									
					endif;									
					$userbd = new usuario();
					$userbd->extras_select = "WHERE id=$id";
					$userbd->selecionaTudo($userbd);
					$resbd = $userbd->retornaDados();
				else:
					//avisa para seleciona user
					printMSG('Usuário não definido, <a href="?m=usuario&t=listar"> Escolha um usuário para alterar!</a>','alerta');
				endif;
				include ('pages/usuario/mudarsenha.php');
			else:
				//Sem permissão para alterar
				printMSG('Você não tem permissão para acessar esta página! <a href="'.ADMURL.'?m=usuario&t=listar"> Voltar </a>','erro');
			endif;
		break;
		case '':
		break;
		case 'excluir':
			$sessao = new sessao();
			if(isAdmin() == TRUE):
				if(isset($_GET['id'])):
					//faz a edição do usuário
					$id = $_GET['id'];
					if(isset($_POST['excluir'])):
						$user = new usuario();
						$user->valorpk = $id;
						$user->extras_select = "WHERE id=$id";						
						$user->deletar($user);
						if($user->linhasafetadas == 1):
							printMSG('Dados excluídos com sucesso! <a href="'.ADMURL.'?m=usuario&t=listar"> Ver alteração </a>') ;
							unset($_POST);
						else:
							printMSG(' Nenhum registro foi excluído! <a href="'.ADMURL.'?m=usuario&t=listar"> Ver usuários </a>', 'alerta') ;
						endif;
								
					endif;				
					
					$userbd = new usuario();
					$userbd->extras_select = "WHERE id=$id";
					$userbd->selecionaTudo($userbd);
					$resbd = $userbd->retornaDados();
				else:
					//avisa para seleciona user
					printMSG('Usuário não definido, <a href="?m=usuario&t=listar"> Escolha um usuário para excluir!</a>','alerta');
				endif;
				include ('pages/usuario/excluir.php');
			else:
				printMSG('Você não tem permissão para acessar esta página! <a href="'.ADMURL.'?m=usuario&t=listar"> Voltar </a>','erro');
			endif;
		break;
		default:
			printMSG('A tela solicitada não existe!', 'alerta');
		break;
	endswitch;	
?>