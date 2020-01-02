<?php
	include_once '..\model\dao\conection.php';
	include_once '..\model\entity\senha.php';
	
	class DAO_senha{
		
		public function gerarNovaSenha($senha){
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo->beginTransaction();
			
			$stmt = $pdo->prepare("insert into controleSenha (posicao, preferencial) values (:posicao, :preferencial)");
			$param1 = $senha->getPosicao();
			$param2 = $senha->getPreferencial();
			$stmt->bindParam(':posicao', $param1,PDO::PARAM_INT);
			$stmt->bindParam(':preferencial', $param2,PDO::PARAM_INT);
			if (!$stmt->execute()) {
				$pdo->rollback();
				throw new Exception("Erro interno ao gerar nova senha");
			}
			
			$pdo->commit();
			return $senha;
		}
		
		public function buscaUltimaSenhaGerada($preferencial) {
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo->beginTransaction();
			
			$stmt = $pdo->prepare("select * from Paripassu.controleSenha where codigo = (select max(codigo) from Paripassu.controleSenha where preferencial = :preferencial);");
			$param1 = ($preferencial) ? 1 : 0;
			$stmt->bindParam(':preferencial', $param1,PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						$senha = new Senha($row->codigo, $row->posicao, $row->preferencial);
					}
				} else {
					$pdo->rollback();
					$retorno  = "Não há registro de senhas anteriores, para o tipo \"";
					$retorno .= ($preferencial) ? "Preferencial" : "Normal";
					$retorno .= "\".";
					return $retorno;
				}
			} else {
				$pdo->rollback();
				throw new Exception("Erro interno ao consultar próxima senha a ser atendida");
			}
			
			$pdo->commit();
			return $senha;
		}
		
		public function chamarProximaSenha(){
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo->beginTransaction();
			
			$stmt = $pdo->prepare("select * from Paripassu.controleSenha where atendendo is null order by preferencial desc, codigo limit :limite;");
			$param1 = 1;
			$stmt->bindParam(':limite', $param1,PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						$senha = new Senha($row->codigo, $row->posicao, $row->preferencial);
					}
				} else {
					$pdo->rollback();
					$retorno  = "Não há registro de novas senhas para serem atendidas.";
					return $retorno;
				}
			} else {
				$pdo->rollback();
				throw new Exception("Erro interno ao consultar próxima senha a ser atendida");
			}
			
			$stmt = $pdo->prepare("update controleSenha set atendendo = :atendendo where codigo = :codigo;");
			$param1 = 1;
			$param2 = $senha->getCodigo();
			$stmt->bindParam(':atendendo', $param1,PDO::PARAM_INT);
			$stmt->bindParam(':codigo', $param2,PDO::PARAM_INT);
			if (!$stmt->execute()) {
				$pdo->rollback();
				throw new Exception("Erro interno ao consultar próxima senha a ser atendida");
			}
			
			$pdo->commit();
			return $senha;
		}
		
		public function buscaUltimaSenhaChamada(){
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo->beginTransaction();
			
			$stmt = $pdo->prepare("select * from Paripassu.controleSenha where codigo = (select max(codigo) from Paripassu.controleSenha where atendendo is not null);");
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						$senha = new Senha($row->codigo, $row->posicao, $row->preferencial);
					}
				} else {
					$pdo->rollback();
					$retorno  = "Não há registro de senhas atendidas anteriormente.";
					return $retorno;
				}
			} else {
				$pdo->rollback();
				throw new Exception("Erro interno ao consultar próxima senha a ser atendida");
			}
			
			$pdo->commit();
			return $senha;
		}
		
		public function reiniciarSenhas(){
			$conexao = new conection();
			$pdo = $conexao -> criaPDO();
			$pdo->beginTransaction();
			
			$stmt = $pdo->prepare("delete from controleSenha where atendendo is not null;");
			if (!$stmt->execute()) {
				$pdo->rollback();
				throw new Exception("Erro interno ao reiniciar as senhas");
			}
			
			$pdo->commit();
			return "Reiniciado senhas com sucesso";
		}
		
	}
?>