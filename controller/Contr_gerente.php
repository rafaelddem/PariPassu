<?php

	include_once '..\model\bo\BO_senha.php';

	switch($_GET['param']){
		case "atual":
			$bo_senha = new BO_senha();
			echo $bo_senha -> buscaUltimaSenhaChamada();
			break;
		case "proxima":
			$bo_senha = new BO_senha();
			echo $bo_senha -> chamarProximaSenha();
			break;
		case "reiniciar":
			$bo_senha = new BO_senha();
			echo $bo_senha -> reiniciarSenhas();
			break;
	}

?>