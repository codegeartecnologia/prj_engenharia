<?php
    require_once(dirname(__FILE__)."/autoload.php");
	protegeArquivo(__FILE__);
	 
	class usuario extends base{
		
		public function __construct($campos = array()) {
			parent::__construct();
			$this->tabela = "usuario";
			if(sizeof($campos) <= 0):
				$this->campos_valores = array(
					"nome" => NULL,
					"email" => NULL,
					"login" => NULL,
					"senha" => NULL,
					"ativo" => NULL,
					"administrador" => NULL,
					"datacad" => NULL,
				);
			else:
				$this->campos_valores = $campos;
			endif;
			$this->campopk = "id";
		}// contruct
		
		public function doLogin($objeto){
			$objeto->extras_select = "WHERE email='".$objeto->getValor('email')."' AND senha='".codificaSenha($objeto->getValor('senha'))."' AND ativo= 's'";
			
			$this->selecionaTudo($objeto);
			$sessao = new sessao();
			if($this->linhasafetadas == 1):
				$usLogado = $objeto->retornaDados();
				$sessao->setVar('iduser', $usLogado->id);
				$sessao->setVar('nomeuser', $usLogado->nome);
				$sessao->setVar('loginuser', $usLogado->login);
				$sessao->setVar('logado', TRUE);
				$sessao->setVar('ip', $_SERVER['REMOTE_ADDR']);
				return TRUE;
			else:
				$sessao->destroy(TRUE);
				return FALSE;
			endif;
		}//doLogin
		
		public function doLogout(){
			$sessao = new sessao();
			$sessao->destroy(TRUE);
			redireciona('');
		}//doLogout
		
		public function existeRegistro($campo=NULL, $valor=NULL){
			if($campo != NULL && $valor != NULL):
				is_numeric($valor) ? $valor = $valor : $valor = "'".$valor."'";
				$this->extras_select = "WHERE $campo=$valor";
				$this->selecionaTudo($this);
				if($this->linhasafetadas > 0):
					return TRUE;
				else:
					return FALSE;
				endif;
			else:
				$this->trataerro(__FILE__, __FUNCTION__, 'faltam parâmetros para executar a função', TRUE);
			endif;
		}
	}//fim da classe usuarios	
?>