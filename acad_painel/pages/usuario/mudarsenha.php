
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
                Informe uma nova senha para atualização do usuário
            </div>
            <div class="panel-body">
                <div class="row">
                	<form role="form" class="loginform" method="post" action="">
                        <div class="col-lg-6">		
                            <div class="form-group">
                                <label> Nome </label>
                                <input class="form-control" name="nome" disabled="disabled" placeholder="Nome completo" value="<?php if($resbd) echo $resbd->nome; ?>">
                            </div>
                            <div class="form-group">
                                <label>Nova Senha </label>
                                <input type="password" required="" class="form-control" name="senha" placeholder="*****">
                            </div>
                            <div class="form-group">
                                <label> Repita Senha </label>
                                <input type="password" required="" class="form-control" name="senhaconf" placeholder="*****">
                            </div>
                            <div class="form-group">
                            	<input class="btn btn-warning" type="button" onclick="location.href='?m=usuario&t=listar'" value="Cancelar" />
                            	<input class="btn btn-success" type="submit" name="mudasenha" value="Mudar Senha" />
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