<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"> Painel Administrativo </a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                	<a href="?m=usuario&t=listar"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li>
                	<a href="?m=usuario&t=suporte"><i class="fa fa-support fa-fw"></i> Suporte </a>
                </li>
                <li class="divider"></li>
                <li>
                	<a href="?logoff=TRUE"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

	<div class="navbar-default sidebar" role="navigation">
	    <div class="sidebar-nav navbar-collapse">
	        <ul class="nav" id="accordion">
	            <li class="sidebar-search">
	            	<?php
	            		$sessao = new sessao();
						echo '<h4> Olá '.$sessao->getVar('nomeuser').'! </h4>';
	            	?>
	            </li>
	            <li>
	                <a href="painel.php"><i class="fa fa-dashboard fa-fw"></i> Início </a>
	            </li>
	            <li >
	                <a href="?m=servico&t=incluir"><i class="fa fa-tasks fa-fw"></i> Serviço </a>
	            </li>
	            <li>
	                <a href="#" class="item"><i class="fa fa-edit fa-fw"></i> Engenharia <span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="?m=servico&t=engenharia"> Exibir </a>
	                    </li>
	                </ul>
	                <!-- /.nav-second-level -->
	            </li>
	            <li>
	                <a href="#" class="item"><i class="fa fa-sitemap fa-fw"></i> Saneamento <span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="?m=servico&t=saneamento"> Exibir </a>
	                    </li>
	                </ul>
	                <!-- /.nav-second-level -->
	            </li>
	            <li>
	                <a href="#" class="item"><i class="fa fa-files-o fa-fw"></i> Obras <span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="?m=servico&t=obras"> Exibir </a>
	                    </li>
	                </ul>
	                <!-- /.nav-second-level -->
	            </li>
	        </ul>
	    </div>
	    <!-- /.sidebar-collapse -->
	</div>

</nav>