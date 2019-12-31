<?php

	switch($_POST['opcao']){
		case 'Painel':
			echo "<script language='javascript'>";
			echo "window.location.href='../view/view_painel.php';";
			echo "</script>";
			break;
		case 'Terminal':
			echo "<script language='javascript'>";
			echo "window.location.href='../view/view_terminal.php';";
			echo "</script>";
			break;
	}
	
?>