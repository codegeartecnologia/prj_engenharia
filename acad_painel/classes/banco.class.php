<?php
    require_once(dirname(__FILE__)."/autoload.php");
	protegeArquivo(basename(__FILE__));
	
    abstract class banco {
    	
		//propriedades
    	public $servidor 		= BDHOST;
    	public $usuario 		= BDUSER;
    	public $senha 			= BDPASS;
    	public $nomebanco 		= BDNAME;
    	public $conexao 		= NULL;
    	public $dataset 		= NULL;
    	public $linhasafetadas 	= -1;
        
		//métodos
		public function __construct() {
            $this->conecta();
        }//fim da construt
        
        public function __destruct(){
        	if ($this->conexao != NULL):
				mysql_close($this->conexao);
			endif;			
        }//fim da destruct
        
		public function conecta(){
			$this->conexao = @mysql_connect($this->servidor, $this->usuario, $this->senha, TRUE) 
			or die($this->trataerro(__FILE__, __FUNCTION__, mysql_errno(), mysql_error(), TRUE));
			mysql_select_db($this->nomebanco) or die($this->trataerro(__FILE__, __FUNCTION__, mysql_errno(), mysql_error(), TRUE));
			mysql_query("SET NAMES 'utf8'");
			mysql_query("SET caracter_set_conection=utf8");
			mysql_query("SET caracter_set_client=utf8");
			mysql_query("SET caracter_set_results=utf8");
		}//fim da conecta
		
		public function inserir($objeto){
			$sql = "INSERT INTO ".$objeto->tabela." (";
			for ($i=0; $i < count($objeto->campos_valores); $i++):
				$sql .= key($objeto->campos_valores);				
				if($i < (count($objeto->campos_valores) -1)):
					$sql .= ", ";
				else:
					$sql .= ") ";
				endif;
				next($objeto->campos_valores); 
			endfor;
			
			reset($objeto->campos_valores);
			$sql .= "VALUES (";
			
			for ($i=0; $i < count($objeto->campos_valores); $i++):
				$sql .= is_numeric($objeto->campos_valores[key($objeto->campos_valores)]) ? 
				$objeto->campos_valores[key($objeto->campos_valores)]: 
				"'".$objeto->campos_valores[key($objeto->campos_valores)]."'";
								
				if($i < (count($objeto->campos_valores) -1)):
					$sql .= ", ";
				else:
					$sql .= ") ";
				endif;
				next($objeto->campos_valores); 
			endfor;
			//echo $sql;
			return $this->executaSQL($sql);
		}//fim da funcao inserir
		
		public function atualizar($objeto){
			$sql = "UPDATE ".$objeto->tabela." SET ";
			for ($i=0; $i < count($objeto->campos_valores); $i++):
				
				$sql .= key($objeto->campos_valores)."=";
				$sql .= is_numeric($objeto->campos_valores[key($objeto->campos_valores)]) ? 
				$objeto->campos_valores[key($objeto->campos_valores)]: 
				"'".$objeto->campos_valores[key($objeto->campos_valores)]."'";
								
				if($i < (count($objeto->campos_valores) -1)):
					$sql .= ", ";
				else:
					$sql .= " ";
				endif;
				next($objeto->campos_valores); 
			endfor;
			
			$sql .= "WHERE ".$objeto->campopk."=";
			$sql .= is_numeric($objeto->valorpk) ? $objeto->valorpk: "'".$objeto->valorpk."'";
			return $this->executaSQL($sql);
		}//fim da funcao atualizar
		
		public function deletar($objeto){
			$sql = "DELETE FROM ".$objeto->tabela;
			$sql .= " WHERE ".$objeto->campopk."=";
			$sql .= is_numeric($objeto->valorpk) ? $objeto->valorpk: "'".$objeto->valorpk."'";
			
			return $this->executaSQL($sql);
		}//fim da funcao deletar
		
		public function selecionaTudo($objeto){
			$sql = "SELECT * FROM ".$objeto->tabela;
			if($objeto->extras_select != NULL):
				$sql .= " ".$objeto->extras_select;
			endif;
			
			return $this->executaSQL($sql);
		}//fim da funcao selecionaTudo
		
		public function selecionaCampos($objeto){
			$sql = "SELECT ";
			for ($i=0; $i < count($objeto->campos_valores); $i++):
				$sql .= key($objeto->campos_valores);				
				if($i < (count($objeto->campos_valores) -1)):
					$sql .= ", ";
				else:
					$sql .= " ";
				endif;
				next($objeto->campos_valores); 
			endfor;	
			$sql .= " FROM ".$objeto->tabela;
			if($objeto->extras_select != NULL):
				$sql .= " ".$objeto->extras_select;
			endif;
			
			return $this->executaSQL($sql);
		}//fim da funcao selecionaTudo
		
		public function executaSQL($sql=NULL){
			if($sql != NULL):
				$query = mysql_query($sql) or $this->trataerro(__FILE__, __FUNCTION__); 
				$this->linhasafetadas = mysql_affected_rows($this->conexao);
				if(substr(trim(strtolower($sql)), 0,6)=="select"):
					$this->dataset = $query;
					return $query;
				else: 
					return $this->linhasafetadas;
				endif;
			else:
				$this->trataerro(__FILE__, __FUNCTION__, NULL, 'Comando SQL nao informado corretamente', FALSE);
			endif;
		}//fim da funcao executaSQL
		
		public function retornaDados($tipo=NULL){
			switch (strtolower($tipo)):
				case 'array':
					return mysql_fetch_array($this->dataset);
				break;
				case 'assoc':
					return mysql_fetch_assoc($this->dataset);
				break;
				case 'object':
					return mysql_fetch_object($this->dataset);
				break;
				default: 
					return mysql_fetch_object($this->dataset);					
				break;
			endswitch;
		}//fim da funcao retornaDados
		
		public function trataerro($arquivo=NULL, $rotina=NULL, $numero=NULL, $msgerro=NULL, $geraexcepct=FALSE){
			if($arquivo == NULL) $arquivo = "nao informado";
			if($rotina == NULL) $rotina = "nao informado";
			if($numero == NULL) $rotina = mysql_errno($this->conexao);
			if($msgerro == NULL) $arquivo = mysql_error($this->conexao);
			$resultado = 'Ocorreu um erro com os seguintes detalhes: <br />
				<strong> Arquivo: </strong> '.$arquivo.'<br />
				<strong> Rotina: </strong> '.$rotina.'<br />
				<strong> Codigo </strong> '.$numero.'<br />
				<strong> Mensagem: </strong> '.$msgerro;
			if ($geraexcepct == FALSE):
				echo ($resultado);
			else:
				die($resultado);
			endif;
		}//fim da trataerro		
		
        
    }    
?>