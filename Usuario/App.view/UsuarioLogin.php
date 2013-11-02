<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if ($_GET['logout'] == 'y') {
		include "../App.control/UsuarioSession.php";
		expulsaVisitante();
	}
	if(isset($_GET['invalidField'])) {
		if($_GET['invalidField'][0] == 1) {
			echo "<script>alert('Usuário ou Senha Inválidos')</script>";
		}
		else {
			$campos = $_GET['invalidField'][0];
			for($i = 1; $i < count($_GET['invalidField']); $i ++) {
				$campos .= "," . $_GET['invalidField'][$i];	
			}	
			echo "<script>alert('Campos Inválidos:".$campos.".')</script>";
		}	
	}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
	<head>
		<link rel="stylesheet" type="text/css" href="../static/css/style.css">
		<title> Login </title>
	</head>
	<body>
		<div class = "Login">
			<form name = "Login" method = "POST" action = "../App.control/LoginController.php">
				<fieldset>
				<label for="login"> Login: </label>
					<input type="text" name = "login" id = "login" value=""/> <br />
					<label for="senha"> Senha: </label>
					<input type="password" name = "senha" id = "senha" value=""/> <br />
					<input type='submit' name = 'logar' value="Logar"> <br />  
					<legend> Acesso ao Sistema </legend>
				</fieldset>
			</form>
		</div>
	</body>
</html>