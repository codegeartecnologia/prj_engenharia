<?php
	require_once("funcoes.php");
	$serv = new servico();
	$serv->selecionaTudo($serv);
	while($res = $serv->retornaDados()):
			if($res->tipo_servico == 'Engenharia'):
				printf('<div class="col-md-3 col-sm-6 folio-item %s">', strtolower($res->tipo_servico));
			elseif($res->tipo_servico == 'Saneamento'):
				printf('<div class="col-md-3 col-sm-6 folio-item %s">', strtolower($res->tipo_servico));
			else:
				$servico = strtolower($res->servico);
				printf('<div class="col-md-3 col-sm-6 folio-item %s">', strtolower($res->tipo_servico));
			endif;?>    
			<div class="folio-thumb item-h2"> 
			  <?php printf('<img src="servico/%s" alt="">', $res->nome_imagem);	?>
			  <div class="folio-overlay">
			  	<a href="#dialog" name="modal">
				    <i class="fa fa-plus"></i>
				</a>
			  </div> <!-- //.folio-overlay -->
			
		    </div> <!-- //.folio-thumb -->
		    <div class="folio-desc">
			<span class="folio-tail"></span>
			<?php 
				printf('<h4> %s </h4>', $res->titulo);	
				printf('<h6> %s </h6>', $res->descricao);
			?>
		    </div> <!-- //.folio-desc -->
		</div> <!-- folio-item -->
	<?php endwhile;?>