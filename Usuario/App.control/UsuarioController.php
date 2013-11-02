<?php
if ($_POST['voltar']) {
	header("Location: ../App.view/UsuarioList.php");
} else {
	if (!strlen(validarUsuario())) {
		include_once "../App.model/UsuarioVO.php";
		include_once "../../Fachada/Fachada.php";
		$usuario = new UsuarioVO();
		$usuario -> setId($_POST['id']);
		$usuario -> setNome($_POST['nome']);
		$usuario -> setLogin($_POST['login']);
		$usuario -> setSenha(md5(trim($_POST['senha'])));
		$usuario -> setCargo($_POST['cargo']);	
		if(!count(Fachada::getListUsuario("login='".$usuario->getLogin()."'"))) {
			if ($usuario -> getId()) {
				Fachada::updateUsuario($usuario);
				echo "<script>alert('Usuário alterado com sucesso.');window.location='../App.view/UsuarioList.php';</script>";
			} else {
				Fachada::insertUsuario($usuario);
				echo "<script>alert('Usuário salvo com sucesso.');window.location='../App.view/UsuarioList.php';</script>";
			}	
		} else {
			$msg = "Usuário já existe!";
			header("Location: ../App.view/UsuarioAddEdit.php?msg=" . $msg);
		}
	} else {
		$msg = validarUsuario();
		header("Location: ../App.view/UsuarioAddEdit.php?msg=" . $msg);
	}
}
function validarUsuario() {
	$status = "";
	if (is_numeric($_POST['nome']) || empty($_POST['nome'])) {
		$status .= "nome";
	}
	if (is_numeric($_POST['login']) || empty($_POST['login'])) {
		$status .= ",login";
	}
	if (strlen($_POST['senha']) <= 5 || empty($_POST['senha'])) {
		$status .= ",senha";
	}
	if (is_numeric($_POST['cargo']) || empty($_POST['cargo'])) {
		$status .= ",cargo";
	}
	return $status;
}
?>