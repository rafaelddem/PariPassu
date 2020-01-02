<?php
	include_once '..\model\dao\DAO_senha.php';
	
	class BO_senha{
	
		private $senha;
		private $DAO_senha;
		
		public function gerarNovaSenha($preferencial){
			$DAO_senha = new DAO_senha();
			try{
				$senha = $DAO_senha -> buscaUltimaSenhaGerada($preferencial);
				if ($senha instanceof Senha){
					if ($senha -> getPosicao() < 9999) {
						$senha -> setPosicao($senha -> getPosicao() + 1);
					} else {
						$retorno  = "O número máximo de senhas foi atigido para ";
						$retorno .= ($preferencial) ? "Preferencial" : "Normal";
						$retorno .= "\".\nPor favor, informe ao Gerente";
						return $retorno;
					}
				} else if (is_string($senha)) {
					$senha = new Senha(0, 1, $preferencial ? 1 : 0);
				}
				$novaSenha = $DAO_senha -> gerarNovaSenha($senha);
				return $novaSenha -> getApresentacao();
			}catch (Exception $e){
				echo $e->getMessage();
			}
		}
		
		public function chamarProximaSenha(){
			$DAO_senha = new DAO_senha();
			try{
				$senha = $DAO_senha -> chamarProximaSenha();
				if ($senha instanceof Senha){
					return $senha -> getApresentacao();
				} else if (is_string($senha)) {
					return $senha;
				}
			}catch (Exception $e){
				echo $e->getMessage();
			}
		}
		
		public function reiniciarSenhas(){
			$DAO_senha = new DAO_senha();
			return $DAO_senha -> reiniciarSenhas();
		}
		
		public function buscaUltimaSenhaChamada(){
			$DAO_senha = new DAO_senha();
			try{
				$senha = $DAO_senha -> buscaUltimaSenhaChamada();
				if ($senha instanceof Senha){
					return $senha -> getApresentacao();
				} else if (is_string($senha)) {
					return "N0000";
				}
			}catch (Exception $e){
				return $e->getMessage();
			}
		}
	
	}
?>