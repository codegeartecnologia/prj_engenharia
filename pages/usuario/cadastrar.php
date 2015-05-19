
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
                Informações necessárias pra cadastro de usuário
            </div>
            <div class="panel-body">
                <div class="row">
                	<form class="loginform" method="post" action="">
                        <div class="col-lg-6">		
                            <div class="form-group" >
                                <label> Nome </label>
                                <input class="form-control" type="text" autofocus="autofocus" required="" name="nome" placeholder="Nome completo">
                            </div>
                            <div class="form-group">
                            	<label> E-mail </label>
	                            <div class="form-group input-group">
	                                <span class="input-group-addon">@</span>
	                                <input class="form-control" required="" placeholder="E-mail" type="email" name="email"/>
	                            </div>
	                        </div>
                            <div class="form-group">
                                <label>Senha </label>
                                <input type="password" required="" type="text" maxlength="10" class="form-control" name="senha" placeholder="*****">
                            </div>
                            <div class="form-group">
                                <label> Repita Senha </label>
                                <input type="password" required="" type="text" class="form-control" name="senhaconf" placeholder="*****">
                            </div>
                            <div class="form-group">
                                <label for="adm"> Administrador: </label>
								<input type="checkbox" name="adm" <?php if(!isAdmin()) echo 'disabled = "disabled"'; if(isset($_POST['adm'])) echo 'checked = "checked"'; ?> /> dar controle total ao usuário.
                            </div>
                            <div class="form-group">
                            	<input class="btn btn-warning" type="button" onclick="location.href='?m=usuario&t=listar'" value="Cancelar" />
                            	<input class="btn btn-success" type="submit" name="cadastrar" value="Salvar Dados" />
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