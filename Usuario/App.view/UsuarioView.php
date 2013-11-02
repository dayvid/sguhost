<?php
include "../App.control/UsuarioSession.php";
//protegePagina();
require_once ("../../Fachada/Fachada.php");
require_once ("../App.model/UsuarioVO.php");

if ($_GET['id']) {
	$id = $_GET['id'];
	$objUsuario = Fachada::getByIdUsuario($id);
} else {
	$objUsuario = new UsuarioVO();
}
$opcao = "Voltar";
$cabecalho = "Visualização de Usuário";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
	<head>
		<link rel="stylesheet" type="text/css" href="../static/css/style.css">
		<title> 
			Visualizar Usuário
		</title>
	</head>
	<body>
		<?php include_once("LayoutHeader.php"); ?>
		<div class="centro">
			<div class="cabecalho">
				<h3><?php echo $cabecalho ?></h3>
			</div>
			<div class = "form-container">
				<form name = "formUsuarioCadastro" method = "POST" action = "UsuarioList.php">
					<fieldset>
						<input disabled type="hidden" name = "id" id = "id" value="<?php echo $objUsuario->getId()?>"/>
						<label for="nome"> Nome: </label>
						<input disabled  type="text" name = "nome" id = "nome" value="<?php echo $objUsuario->getNome() ?>"/> <br />
						<label for="login"> Login: </label>
						<input  disabled type="text" name = "login" id = "login" value="<?php echo $objUsuario->getLogin() ?>"/> <br />
						<label for="senha"> Senha: </label>
						<input  disabled type="password" name = "senha" id = "senha" value="<?php echo $objUsuario->getSenha() ?>"/> <br />
						<label for="cargo"> Cargo: </label>
						<input  disabled type="text" name = "cargo" id = "cargo" value="<?php echo $objUsuario->getCargo() ?>"/> <br />
						<input  type="submit" value = "<?php echo $opcao ?>"/>
						<legend> Dados do Usuário </legend>
					</fieldset>
				</form>
			</div>
			<div class="msgErro">
				<?php
				if (isset($_GET['msg'])) {
					$resultado = "Preencha os campos corretamente: ";
					foreach (explode(",", $_GET['msg']) as $i) {
						$resultado .= "\\n" . strtoupper($i);
					}
					echo "<script>alert('$resultado')</script>";
				}
				?>
			</div>
		</div>
		<?php require_once ("LayoutRodape.php"); ?>
	</body>
</html>