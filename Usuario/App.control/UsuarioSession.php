<?php
include_once ("../../BD/Conexao.php");
require_once ("../../Fachada/Fachada.php");
require_once ("../App.model/UsuarioVO.php");

$_SG['abreSessao'] = true;
$_SG['validaSempre'] = true;
$_SG['paginaLogin'] = '../App.view/UsuarioLogin.php';
$_SG['tabela'] = 'Usuario';
$usuarioTeste = new UsuarioVO();

if ($_SG['abreSessao']) {
	session_start();
}

function protegePagina($idUsuario, $idPermissao) {
	global $_SG;
	global $usuarioTeste;
	$usuarioTeste -> setLogin($_SESSION['usuarioLogin']);
	$usuarioTeste -> setSenha($_SESSION['usuarioSenha']);
	if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome']) != 1) {
		if ($_SG['validaSempre']) {
			if (!Fachada::validarLoginUsuario($usuarioTeste)) {
				if (!Fachada::temPermissao($idUsuario, $idPermissao)) {
					expulsaVisitante();
				}
			}
		}
	}
}

function expulsaVisitante($camposInvalidos = null) {
	global $_SG;
	session_unset();
	session_destroy();
	if (isset($camposInvalidos)) {
		$campos = "?invalidField[]=" . $camposInvalidos[0];
		for ($i = 1; $i < count($camposInvalidos); $i++) {
			$campos .= "&invalidField[]=" . $camposInvalidos[$i];
		}
	}
	header("Location: " . $_SG['paginaLogin'] . "$campos");
}
?>