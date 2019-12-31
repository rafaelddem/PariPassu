<?php
	include_once '..\model\bo\BO_senha.php';

	$bo_senha = new BO_senha();

	switch($_POST['opcao']){
		case 'Reiniciar Senhas':
			$bo_senha -> ReiniciarSenhas();
			break;
		case 'Chamar próxima senha':
		//	$senha = $bo_senha -> ChamarProximaSenha();
		//	$senha = $bo_senha -> ConsultarSenhaAtual();
			$senha = $bo_senha -> GerarNovaSenha(false);
		//	$senha = $bo_senha -> GerarNovaSenha(true);
			if (empty($senha)) {
				echo "vazio";
			} else if ($senha instanceof Senha){
				print_r($senha);
				echo "<br>";
				echo var_dump($senha);
				echo "<br>";
				echo $senha->getApresentacao();
			} else if (is_string($senha)) {
				echo $senha;
			}
//			echo "<script language='javascript'>";
//			echo "window.location.href='../view/view_gerente.php';";
//			echo "</script>";
			break;
	}
	
	class Contr_gerente{
		function ConsultarSenhaAtual(){
			$var = $bo_senha -> ConsultarSenhaAtual();
		}
	}
	
?>