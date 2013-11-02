<?php
abstract class Pessoa {

	private $nome;

	public function getNome() {
		return $this -> nome;
	}

	public function setNome($nome) {
		$this -> nome = $nome;
	}
}
?>