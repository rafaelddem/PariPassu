<?php

	include_once '..\model\bo\BO_senha.php';

	switch($_GET['param']){
		case "normal":
			$bo_senha = new BO_senha();
			echo $bo_senha -> gerarNovaSenha(false);
			break;
		case "preferencial":
			$bo_senha = new BO_senha();
			echo $bo_senha -> gerarNovaSenha(true);
			break;
	}

?>