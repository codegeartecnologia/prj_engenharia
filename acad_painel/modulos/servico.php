<?php
	require_once(dirname(dirname(__FILE__))."/funcoes.php");
	protegeArquivo(basename(__FILE__));
	loadJS('jquery_validate');
	loadJS('jquery_validate_msg_ptbr');
	
	switch ($tela): 
		case 'incluir':
			if(isset($_POST['cadastrar'])):
				$arquivoPermitido = array("jpeg", "jpg", "png", "gif");
				$explode = explode(".", $_FILES['imagem']['name']);
				$ext_permitido = end($explode);
		        $destino = 'servico/';
		        $novo_nome = uniqid().".{$ext_permitido}";
				$arquivoTemporario = $_FILES['imagem']['tmp_name'];
				
				if(in_array($ext_permitido, $arquivoPermitido)):
					if (move_uploaded_file($arquivoTemporario, $destino.$novo_nome)):
			            $serv = new servico(array(
							'titulo'=>$_POST['titulo'],
							'descricao'=>trim($_POST['descricao']),
							'apresentacao'=>($_POST['apresentacao']=='on') ? 's' : 'n',					
							'nome_imagem'=> $novo_nome,
							'tipo_servico'=>$_POST['servico'],
							'texto'=>trim($_POST['texto']),
						));
						
						$serv->inserir($serv);
						if($serv->linhasafetadas == 1):
							$servico = strtolower($_POST['servico']);
							printMSG('Dados inceridos com sucesso! <a href="'.ADMURL.'?m=servico&t='.$servico.'"> Exibir Cadastro </a>') ;
							unset($_POST);
						endif;       
			        else:            
						printMSG('ERRO: Arquivo não enviado!','erro');
			        endif;
				endif;		
			endif;
			include ('pages/servico/cadastrar.php');
		break;
		case 'engenharia':
			$tipo_servico = 'Engenharia';
			loadCSS('data_tables', NULL, TRUE);
			loadJS('jquery_data_tables');
			include ('pages/servico/listar.php');
		break;
		case 'saneamento':
			$tipo_servico = 'Saneamento';
			loadCSS('data_tables', NULL, TRUE);
			loadJS('jquery_data_tables');
			include ('pages/servico/listar.php');
		break;
		case 'obras':
			$tipo_servico = 'Obras';
			loadCSS('data_tables', NULL, TRUE);
			loadJS('jquery_data_tables');
			include ('pages/servico/listar.php');
		break;
		case 'editar':
			$sessao = new sessao();
			if(isAdmin() == TRUE || $sessao->getVar('iduser') == $_GET['id']):
				if(isset($_GET['id'])):
					$id = $_GET['id'];
					if(isset($_POST['editar'])):
			            $serv = new servico(array(
							'titulo'=>$_POST['titulo'],
							'descricao'=>trim($_POST['descricao']),
							'apresentacao'=>($_POST['apresentacao']=='on') ? 's' : 'n',
							'tipo_servico'=>$_POST['servico'],
							'texto'=>trim($_POST['texto']),
						));
						
						$servico = strtolower($_POST['servico']);
						$serv->valorpk = $id;
						$serv->extras_select = "WHERE id=$id";
						$serv->selecionaTudo($serv);
						$res = $serv->retornaDados();
						$serv->atualizar($serv);
						if($serv->linhasafetadas == 1):
							printMSG('Dados inceridos com sucesso! <a href="'.ADMURL.'?m=servico&t='.$servico.'"> Exibir Cadastro </a>') ;
							unset($_POST);
						else:
							printMSG(' Nenhum dado foi alterado! <a href="'.ADMURL.'?m=servico&t='.$servico.'"> Ver usuários </a>', 'alerta') ;
						endif;  		
					endif;									
					$servbd = new servico();
					$servbd->extras_select = "WHERE id=$id";
					$servbd->selecionaTudo($servbd);
					$resbd = $servbd->retornaDados();
				else:
					printMSG('Tipo de serviço não definido, <a href="?m=servico&t='.$servico.'"> Escolha um usuário para alterar!</a>','alerta');
				endif;
				include ('pages/servico/editar.php');
			else:
				printMSG('Você não tem permissão para acessar esta página! <a href="'.ADMURL.'?m=servico&t=listar"> Voltar </a>','erro');
			endif;
		break;
		case 'mudar_imagem':
			$sessao = new sessao();
			if(isAdmin() == TRUE || $sessao->getVar('iduser') == $_GET['id']):
				if(isset($_GET['id'])):
					$id = $_GET['id'];
					if(isset($_POST['editar_imagem'])):
						$arquivo = $_FILES['imagem'];
						$arquivoPermitido = array("jpeg", "jpg", "png", "gif");
						$explode = explode(".", $_FILES['imagem']['name']);
						$ext_permitido = end($explode);
				        $destino = 'servico/';
				        $novo_nome = uniqid().".{$ext_permitido}";
						$arquivoTemporario = $_FILES['imagem']['tmp_name'];
						
						if(in_array($ext_permitido, $arquivoPermitido)):
							if (move_uploaded_file($arquivoTemporario, $destino.$novo_nome)):
					            $serv = new servico(array(				
									'nome_imagem'=> $novo_nome,
								));
								
								echo strtolower($_POST['servico']);
								$serv->valorpk = $id;
								$serv->extras_select = "WHERE id=$id";
								$serv->selecionaTudo($serv);
								$res = $serv->retornaDados();
								$servico = strtolower($res->servico);
								$serv->atualizar($serv);
								if($serv->linhasafetadas == 1):
									printMSG('Dados inceridos com sucesso! <a href="'.ADMURL.'?m=servico&t='.$servico.'"> Exibir Cadastro </a>') ;
									unset($_POST);
								else:
									printMSG(' Nenhum dado foi alterado! <a href="'.ADMURL.'?m=servico&t='.$servico.'"> Ver usuários </a>', 'alerta') ;
								endif;  
					        else:        
								printMSG('Aviso: Arquivo não enviado!','alerta');
					        endif;
						endif;			
					endif;									
					$servbd = new servico();
					$servbd->extras_select = "WHERE id=$id";
					$servbd->selecionaTudo($servbd);
					$resbd = $servbd->retornaDados();
				else:
					//avisa para seleciona user
					printMSG('Tipo de Serviço não definido, <a href="?m=servico&t='.$servico.'"> Escolha um usuário para alterar!</a>','alerta');
				endif;
				include ('pages/servico/mudar_imagem.php');
			else:
				printMSG('Você não tem permissão para acessar esta página! <a href="'.ADMURL.'?m=servico&t=listar"> Voltar </a>','erro');
			endif;
		break;
		case 'excluir':
			$sessao = new sessao();
			if(isAdmin() == TRUE):
				if(isset($_GET['id'])):
					$id = $_GET['id'];
					if(isset($_POST['excluir'])):
						$serv = new servico();
						$serv->valorpk = $id;
						$serv->extras_select = "WHERE id=$id";						
						$serv->deletar($serv);
						
						$servico = strtolower($_POST['servico']);
						if($serv->linhasafetadas == 1):
							printMSG('Dados excluídos com sucesso! <a href="'.ADMURL.'?m=servico&t='.$servico.'"> Ver alteração </a>') ;
							unset($_POST);
						else:
							printMSG('Nenhum registro foi excluído! <a href="'.ADMURL.'?m=servico&t='.$servico.'"> Ver cadastro </a>', 'alerta') ;
						endif;
								
					endif;				
					
					$servbd = new servico();
					$servbd->extras_select = "WHERE id=$id";
					$servbd->selecionaTudo($servbd);
					$resbd = $servbd->retornaDados();
				else:
					//avisa para seleciona user
					printMSG('Usuário não definido, <a href="?m=servico&t='.$servico.'"> Escolha um usuário para excluir!</a>','alerta');
				endif;
				include ('pages/servico/excluir.php');
			else:
				printMSG('Você não tem permissão para acessar esta página! <a href="'.ADMURL.'?m=servico&t='.$servico.'"> Voltar </a>','erro');
			endif;
		break;
		default:
			printMSG('A tela solicitada não existe!', 'alerta');
		break;
	endswitch;	
?>