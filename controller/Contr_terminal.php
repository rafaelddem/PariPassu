<?php
	include_once '..\model\bo\BO_senha.php';

	switch($_POST['opcao']){
		case 'Gerente':
			echo "<script language='javascript'>";
			echo "window.location.href='../view/view_gerente.php';";
			echo "</script>";
			break;
		case 'Cliente':
			echo "<script language='javascript'>";
			echo "window.location.href='../view/view_cliente.php';";
			echo "</script>";
			break;
		case 'Gerar Nova Senha (Atend. Normal)':
			$bo_senha = new BO_senha();
			$bo_senha -> ChamarProximaSenha(false);
			break;
		case 'Gerar Nova Senha (Atend. Preferencial)':
			$bo_senha = new BO_senha();
			$bo_senha -> ChamarProximaSenha(true);
			break;
	}
?>