<?php
	include_once '..\model\dao\conection.php';
	include_once '..\model\entity\senha.php';
	
	class DAO_senha{
	
		private $senha;
		
		public function ChamarProximaSenha(){
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo->beginTransaction();
			
			//Busca próxima senha a ser atendida
			$stmt = $pdo->prepare("select * from controleSenha where atendendo is null order by preferencial desc, posicao limit :limite;");
			$param1 = 1;
			$stmt->bindParam(':limite', $param1,PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						$senha = new Senha($row->codigo, $row->posicao, $row->preferencial);
					}
				} else {
					$pdo->rollback();
					return "Não há senhas não atendidas";
				}
			} else {
				$pdo->rollback();
				return "Erro interno ao consultar próxima senha a ser atendida";
			}
			
			//Exclui senhas já atendidas
			$stmt = $pdo->prepare("delete from controleSenha where atendendo = :atendendo;");
			$param1 = 1;
			$stmt->bindParam(':atendendo', $param1,PDO::PARAM_INT);
			if (!$stmt->execute()) {
				$pdo->rollback();
				return "Erro interno ao consultar próxima senha a ser atendida";
			}
			
			//Marca a próxima senha como sendo atendida
			$stmt = $pdo->prepare("update controleSenha set atendendo = :atendendo where codigo = :codigo;");
			$param1 = 1;
			$param2 = $senha->getCodigo();
			$stmt->bindParam(':atendendo', $param1,PDO::PARAM_INT);
			$stmt->bindParam(':codigo', $param2,PDO::PARAM_INT);
			if (!$stmt->execute()) {
				$pdo->rollback();
				return "Erro interno ao consultar próxima senha a ser atendida";
			}
			
			$pdo->commit();
			return $senha;
		}
		
		public function ConsultarSenhaAtual(){
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo->beginTransaction();
			
			//Busca próxima senha a ser atendida
			$stmt = $pdo->prepare("select * from controleSenha where atendendo is not null;");
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						$senha = new Senha($row->codigo, $row->posicao, $row->preferencial);
					}
				} else {
					$pdo->rollback();
					return "Não há senhas sendo atendidas";
				}
			} else {
				$pdo->rollback();
				return "Erro interno ao consultar a senha sendo atendida";
			}
			
			$pdo->commit();
			return $senha;
		}
		
		public function GerarNovaSenha($preferencial){
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo->beginTransaction();
			
			//Busca próxima senha a ser atendida
			$stmt = $pdo->prepare("select * from controleSenha where preferencial = :preferencial and atendendo is null order by posicao desc limit :limite;");
			$param1 = ($preferencial) ? 1 : 0;
			$param2 = 1;
			$stmt->bindParam(':preferencial', $param1,PDO::PARAM_INT);
			$stmt->bindParam(':limite', $param2,PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						$posicao = $row->posicao;
						if($posicao >= 9999){
							$pdo->rollback();
							$retorno  = "O número máximo de senhas foi atingido, para senhas te tipo \"";
							$retorno .= ($preferencial) ? "Preferencial" : "Normal";
							$retorno .= "\".\nFavor, solicite ao gerente uma nova senha.";
							return $retorno;
						} else {
							$senha = new Senha($row->codigo, $row->posicao, $row->preferencial);
						}
					}
				} else {
					$senha = new Senha(0, 1, $param1);
				}
			} else {
				$pdo->rollback();
				return "Erro interno ao consultar próxima senha a ser atendida";
			}
			
			//Inserir nova senha
			$stmt = $pdo->prepare("insert into controleSenha (posicao, preferencial) values (:posicao, :preferencial)");
			$senha->setPosicao($senha->getPosicao() + 1);
			$param1 = $senha->getPosicao();
			$param2 = $senha->getPreferencial();
			$stmt->bindParam(':posicao', $param1,PDO::PARAM_INT);
			$stmt->bindParam(':preferencial', $param2,PDO::PARAM_INT);
			
			if (!$stmt->execute()) {
				$pdo->rollback();
				return "Erro interno ao gerar nova senha";
			}
			
			$pdo->commit();
			return $senha;
		}
		
		/**/
		
		public function ReiniciarSenhas(){
			return new Senha(1, false);
		}
	
	}
?>