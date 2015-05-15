<?php
	include('pages/header.php');
	if(isset($_GET['m'])) $modulo = $_GET['m'];
	if(isset($_GET['t'])) $tela = $_GET['t'];

	if (isset($modulo) && isset($tela)):
		loadModulo($modulo, $tela);
	else:
		echo '<p class="center"> Escolha uma opção do menu ao lado! </p>';
	endif;
	
	include('pages/footer.php'); 
?>