<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Usuários </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        	<i class="fa fa-user fa-fw"></i>
            Tabela de Usuários 
            <a href="?m=usuario&t=incluir" title="Novo Cadastro"> 	<img class="add" src="images/icones/add.ico" alt="Novo Cadastro"/> </a>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th> Nome </th>
							<th class="center"> Email </th>
							<th class="center"> Ativo/Adm </th>
							<th class="center"> Cadastro </th>
							<th class="center"> Ações </th>
						</tr>
						<tbody>
							<?php
								$user = new usuario();
								$user->selecionaTudo($user);
								while($res = $user->retornaDados()):
									echo '<tr>';
										//printf('<td class="center"> %s </td>', $res->id);
										printf('<td> %s </td>', $res->nome);
										printf('<td> %s </td>', $res->email);
										printf('<td class="center"> %s / %s </td>', strtoupper($res->ativo), strtoupper($res->administrador));
										printf('<td class="center"> %s </td>', date("d/m/y", strtotime($res->datacad)));
										printf('<td id="acoes" class="center">
													<a href="?m=usuario&t=editar&id=%s" title="Editar"> 	<img src="images/icones/edit.ico" alt="Editar"/> 		</a>
													<a href="?m=usuario&t=senha&id=%s" title="Mudar Senha"> <img src="images/icones/pwd.ico" alt="Mudar Senha"/> 	</a>
													<a href="?m=usuario&t=excluir&id=%s" title="Excluir"> 	<img src="images/icones/del.ico" alt="Excluir"/> 		</a>
												</td>', $res->id, $res->id, $res->id);
										
									echo '</tr>';
								endwhile;
							?>
						</tbody>
					</thead>
				</table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-6 -->