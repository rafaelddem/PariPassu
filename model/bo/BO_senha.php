<?php
	include_once '..\model\dao\DAO_senha.php';
	
	class BO_senha{
	
		private $senha;
		private $DAO_senha;
		
		public function ReiniciarSenhas(){
			$senha = new Senha(1, false);
			$DAO_senha = new DAO_senha();
			$DAO_senha -> ReiniciarSenhas();
		}
		
		public function ConsultarSenhaAtual(){
			$DAO_senha = new DAO_senha();
			return $DAO_senha -> ConsultarSenhaAtual();
		}
		
		public function ChamarProximaSenha(){
			$DAO_senha = new DAO_senha();
			return $DAO_senha -> ChamarProximaSenha();
		}
		
		public function GerarNovaSenha($preferencial){
			$DAO_senha = new DAO_senha();
			return $DAO_senha -> GerarNovaSenha($preferencial);
		}
	
	}
?>