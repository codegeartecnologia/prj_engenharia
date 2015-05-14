<?php
	require_once(dirname(__FILE__)."/autoload.php");
	protegeArquivo(basename(__FILE__));

	class servico extends base{
		
		public function __construct($campos = array()) {
				parent::__construct();
				$this->tabela = "servico";
				if(sizeof($campos) <= 0):
					$this->campos_valores = array(
						"titulo" => NULL,
						"descricao" => NULL,
						"apresentacao" => NULL,
						"nome_imagem" => NULL,
						"tipo_servico" => NULL,
						"texto" => NULL
					);
				else:
					$this->campos_valores = $campos;
				endif;
				$this->campopk = "id";
		}// contruct	 
	}
?>