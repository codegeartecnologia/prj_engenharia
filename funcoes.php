<?php
    inicializa();
	protegeArquivo(basename(__FILE__));
	function inicializa(){
		error_reporting(E_ALL & ~E_NOTICE);
		if (file_exists(dirname(__FILE__).'/config.php')):
			require_once(dirname(__FILE__).'/config.php');
		else:
			die(utf8_decode('O arquivo de configuação não foi localizado, contate o administrador!'));
		endif;
		
		//constantes
		$constantes = array('BASEPATH','BASEURL','ADMURL','CLASSESPATH','MODULOPATH','CSSPATH','JSPATH','BDHOST','BDUSER','BDPASS','BDNAME');
		
		foreach($constantes as $valor):
			if(!defined($valor)):
				die(utf8_decode('Uma Configuração do sistema está ausente: '.$valor));
			endif;
		endforeach;
		require_once(BASEPATH.CLASSESPATH.'autoload.php');
		
		if(isset($_GET['logoff']) == TRUE):
			$user = new usuario();
			$user->doLogout();
			exit;
		endif;
	}//fim da funcao inicializa
	
	function loadCSS($arquivo=NULL, $media='screen', $import=FALSE){
		if($arquivo != NULL):
			if($import == TRUE):
				echo '<style type="text/css"> @import url("'.BASEURL.CSSPATH.$arquivo.'.css"); </style>'."\n";
			else:
				echo '<link rel="stylesheet" type="text/css" href="'.BASEURL.CSSPATH.$arquivo.'.css" media="'.$media.'" />'."\n";
			endif;
		endif;
	}//fim da funcao loadCSS
	
	function loadJS($arquivo=NULL, $remoto=FALSE){
		if($arquivo != NULL):
			if($remoto==FALSE):
				$arquivo = BASEURL.JSPATH.$arquivo.'.js';
			endif;
			
			echo '<script type="text/javascript" src="'.$arquivo.'"></script>'."\n";
		endif;
	}//fim da funcao loadJS
	
	function loadModulo($modulo=NULL, $tela=NULL){
		if($modulo == NULL || $tela == NULL):
			echo '<p> Erro na função <strong>'.__FUNCTION__.'</strong>: faltam parâmetros para a execução! </p>';
		else:
			if(file_exists(MODULOPATH."$modulo.php")):
				include_once(MODULOPATH."$modulo.php");
			else:
				echo '<p> Módulo inexistente neste sistema! </p>';
			endif;
		endif;
	}//loadModulo
	
	function protegeArquivo($nomeArquivo, $redirPara='index.php?erro=3'){
		$url = $_SERVER["PHP_SELF"];
		if(preg_match("/$nomeArquivo/i", $url)):
			echo $nomeArquivo;
			redireciona($redirPara);
			
		endif;
	}//protegeArquivo
	
	function redireciona($url=''){
		header("Location: ".BASEURL.$url);
	}//redireciona
	
	function codificaSenha($senha){
		return md5($senha);
	}//codificaSenha
	
	function verificaLogin(){
		$sessao = new sessao();
		if($sessao->getNvars() <= 0 || $sessao->getVar('logado') != TRUE || $sessao->getVar('ip') != $_SERVER['REMOTE_ADDR']):
			redireciona('index_login.php?erro=3');
		endif;
	}
	
	function printMSG($msg=NULL, $tipo=NULL){
		if($msg != NULL):
			switch($tipo):
				case 'erro':
					echo '<div class="alert alert-danger"> '.$msg.'</div>';
				break;
				case 'alerta':
					echo '<div class="alert alert-warning"> '.$msg.'</div>';
				break;
				case 'pergunta':
					echo '<div class="alert alert-info"> '.$msg.'</div>';
				break;
				case 'sucesso':
					echo '<div class="alert alert-success"> '.$msg.'</div>';
				break;
				default:
					echo '<div class="alert alert-success"> '.$msg.'</div>';
				break;
			endswitch;
		endif;
	}
	
	function isAdmin(){
		verificaLogin();
		$sessao = new sessao();
		$user = new usuario(array(
			'administrador'=>NULL,
		));
		$iduser = $sessao->getVar('iduser');
		$user->extras_select = "WHERE id=$iduser";
		$user->selecionaCampos($user);
		$res = $user->retornaDados();
		if(strtolower($res->administrador) == 's'):
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	function antiInject($string){
		//remove palavras que contenham sql
		$string = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/i", "", $string);
		$string = trim($string);//limpa espaços vazios
		$string = strip_tags($string);//tira tags html e php
		if(!get_magic_quotes_gpc()):
			$string = addslashes($string);//adiciona barras invertidas a uma string
		endif;
		return $string;
	}
?>