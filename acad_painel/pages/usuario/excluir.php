
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Usuario </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Confira os dados para exclusão do usuário
            </div>
            <div class="panel-body">
                <div class="row">
                	<form role="form" id="formcad" method="post" action="">
                        <div class="col-lg-6">		
                            <div class="form-group">
                                <label> Nome </label>
                                <input class="form-control" name="nome" disabled="disabled" placeholder="Nome completo" value="<?php if($resbd) echo $resbd->nome; ?>">
                            </div>
                            <div class="form-group">
                            	<label> E-mail </label>
	                            <div class="form-group input-group">
	                                <span class="input-group-addon">@</span>
	                                <input class="form-control" disabled="disabled" placeholder="E-mail" type="email" name="email" placeholder="exemplo@email.com" value="<?php if($resbd) echo $resbd->email; ?>">
	                            </div>
	                        </div>
	                        <div class="form-group">
                                <label for="adm"> Ativo </label>
								<input type="checkbox" disabled="disabled" name="ativo" <?php if(!isAdmin()) echo 'disabled = "disabled"'; if($resbd->ativo == 's') echo 'checked = "checked"'; ?> /> habilitar ou desabilitar usuário.
                            </div>
                            <div class="form-group">
                                <label for="adm"> Administrador: </label>
								<input type="checkbox" disabled="disabled" name="adm" <?php if(!isAdmin()) echo 'disabled = "disabled"'; if(isset($_POST['adm'])) echo 'checked = "checked"'; ?> /> dar controle total ao usuário.
                            </div>
                            <div class="form-group">
                            	<input class="btn btn-warning" type="button" onclick="location.href='?m=usuario&t=listar'" value="Cancelar" />
                            	<input class="btn btn-success" type="submit" name="excluir" value="Excluir Dados" />
                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->           
                   </form>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->