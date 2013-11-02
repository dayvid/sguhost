<?php
require_once ("Pessoa.php");
abstract class UsuarioVOAbstract extends Pessoa {

	private $id;
	private $login;
	private $senha;
	private $cargo;

	public function getId() {
		return $this -> id;
	}

	public function setId($id) {
		$this -> id = $id;
	}

	public function getLogin() {
		return $this -> login;
	}

	public function setLogin($login) {
		$this -> login = $login;
	}

	public function getSenha() {
		return $this -> senha;
	}

	public function setSenha($senha) {
		$this -> senha = $senha;
	}

	public function getCargo() {
		return $this -> cargo;
	}

	public function setCargo($cargo) {
		$this -> cargo = $cargo;
	}

}
?>