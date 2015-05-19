
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Serviço </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Informações necessárias pra cadastro de serviço
            </div>
            <div class="panel-body">
                <div class="row">
                	<form role="form" class="formcad" method="post" enctype="multipart/form-data">
                        <div class="col-lg-6">		
                            <div class="form-group">
                                <label> Titulo </label>
                                <input class="form-control" required="" type="text" name="titulo" placeholder="Título para o serviço">
                            </div>
                            <div class="form-group">
                                <label>Descrição </label>
                                <textarea class="form-control" required="" rows="3" name="descricao" placeholder="Breve descrição contendo as informações principais."></textarea>
                            </div>
                            <div class="form-group">
                                <label> Imagem Ilustrativa </label>
                                <div class="form-group input-group">
	                                <span class="input-group-addon"> <i class="fa fa-photo fa-fw"></i> </span>
                                	<input name="imagem" required="" type="file">
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Apresentação </label>
                                <label class="radio-inline">
                                    <input type="radio" name="apresentacao" id="optionsRadiosInline1" value="1" checked> Sim
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" checked="checked" name="apresentacao" id="optionsRadiosInline2" value="2"> Não
                                </label>
                            </div>
                            <div class="form-group">
                                <label> Serviço </label>
                                <div class="form-group input-group">
	                                <span class="input-group-addon"> <i class="fa fa-steam fa-fw"></i> </span>
	                                 <select class="form-control" name="servico">
	                                    <option value="Engenharia"> Engenharia </option>
	                                    <option value="Saneamento"> Saneamento </option>
	                                    <option value="Obras"> Obras </option>
	                                </select>
	                            </div>
                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                        	<div class="form-group">
                                <label> Texto </label>
                                <textarea class="form-control" required="" rows="15" name="texto" placeholder="Texto contendo todas as informações necessárias"></textarea>
                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                        	<div class="form-group">
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