<?php
require_once ("UsuarioSession.php");
require_once ("../App.model/UsuarioVO.php");
require_once ("../../Fachada/Fachada.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = (isset($_POST['login'])) ? $_POST['login'] : '';
	$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
	
	$objUsuario = new UsuarioVO();
	$objUsuario->setLogin($usuario);
	$objUsuario->setSenha(md5(trim($senha)));
	
	if (!count(validaCampos())) {
		if (Fachada::validarLoginUsuario($objUsuario)) {
			header("Location: ../index.php");
		}
		else {
			$array = array();
			$array[0] = 1;
			expulsaVisitante($array);
		}
	} else {
		expulsaVisitante(validaCampos());
	}
}

function validaCampos() {
	$camposInvalidos = array();
	if (strlen($_POST['senha']) <= 5 || empty($_POST['senha'])) {
		$camposInvalidos[count($camposInvalidos)] = "senha";
	}
	if (is_numeric($_POST['login']) || empty($_POST['login'])) {
		$camposInvalidos[count($camposInvalidos)] = "login";
	}
	return $camposInvalidos;
}
?>