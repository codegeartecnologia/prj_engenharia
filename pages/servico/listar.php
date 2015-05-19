<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> <?php echo $tipo_servico; ?> </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-tasks fa-fw"></i> Serviços cadastrados
        <a href="?m=servico&t=incluir" title="Novo Cadastro"> 	<img class="add" src="images/icones/add.ico" alt="Novo Cadastro"/> </a>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <ul class="timeline">
        	<?php
        		$serv = new servico();
				$serv->extras_select = "WHERE tipo_servico = '$tipo_servico'";
				$serv->selecionaTudo($serv);
				while($res = $serv->retornaDados()):
						if($res->id % 2): printf('<li >');
							else: printf('<li class="timeline-inverted">');
							endif;
						?>
				                <div class="timeline-badge">
				                	<i class="fa fa-check"></i>
				                </div> <strong></strong>
				                <div class="timeline-panel">
				                    <div class="timeline-heading"> 
				                    	<?php
				                    		printf('<img class="img_servico" src="servico/%s" alt="Novo Cadastro"/>', $res->nome_imagem);
				                    		printf('<h4 class="timeline-title center">  <strong> %s - %s </strong> </h4>', $res->titulo, $res->id);
				                    	?>
				                    		<p>
					                        	<?php printf('<small class="text-muted"><i class="fa fa-clock-o"></i> %s </small>', date("d/m/y", strtotime($res->datacad))); ?>
					                        </p>
					                        <?php printf('<p> %s </p>', $res->descricao);?>
					                        <p class="descricao"></p>
					                </div>
					                <div class="timeline-body">
				                        <?php printf('<p> %s </p>', $res->texto);?>
				                        <hr>
		                                <div class="btn-group">
		                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
		                                        <i class="fa fa-gear"></i>  <span class="caret"></span>
		                                    </button>
		                                    <ul class="dropdown-menu" role="menu">
		                                        <li>
		                                        	<?php printf('<a href="?m=servico&t=editar&id=%s"> Editar </a>', $res->id);?>
		                                        </li>
		                                        <li>
		                                        	<?php printf('<a href="?m=servico&t=mudar_imagem&id=%s"> Editar Imagem </a>', $res->id);?>
		                                        </li>
		                                        <li>
		                                        	<?php printf('<a href="?m=servico&t=excluir&id=%s"> Excluir </a>', $res->id);?>
		                                        </li>
		                                    </ul>
		                                </div>
				                    </div>
				                </div>
				            </li>
				<?php endwhile; ?>
        </ul>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->