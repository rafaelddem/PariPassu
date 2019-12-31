<?php
class Senha{
	
	private $codigo;
	private $posicao;
	private $preferencial;
	
	public function __construct($codigo, $posicao, $preferencial){
		$this->codigo = $codigo;
		$this->posicao = $posicao;
		$this->preferencial = $preferencial;
	}
	
	public function getCodigo(){
		return $this->codigo;
	}
	
	public function setCodigo($codigo){
		if(is_numeric($codigo)){
			$this -> codigo = $codigo;
		}else{
			throw new Exception('Erro interno ao sistema na criação da senha');
		}
	}
	
	public function getPosicao(){
		return $this->posicao;
	}
	
	public function setPosicao($posicao){
		if(is_numeric($posicao)){
			$this -> posicao = $posicao;
		}else{
			throw new Exception('Erro interno ao sistema na criação da senha');
		}
	}
	
	public function getPreferencial(){
		return $this -> preferencial;
	}
	
	public function setPreferencial($preferencial){
		if(is_bool($preferencial)){
			$this -> preferencial = $preferencial;
		}else{
			$this -> preferencial = false;
		}
	}
	
	public function getApresentacao() {
		$mensagem  = ($this -> preferencial) ? "P" : "N";
		$mensagem .= str_pad($this -> posicao , 4 , '0' , STR_PAD_LEFT);
		return $mensagem;
	}
	
}
?>