<?php
include "../App.control/UsuarioSession.php";
//protegePagina($_SESSION['usuadioID'], Fachada::getListPermissao("WHERE Permissao LIKE 'Criar Usuario' LIMIT 1"));
include_once "../../Fachada/Fachada.php";
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$objUsuario = Fachada::getByIdUsuario($id);
	$opcao = "Salvar Alterações";
	$cabecalho = "Edição de Funcionário";
} else {
	require_once "../App.model/UsuarioVO.php";
	$objUsuario = new UsuarioVO();
	$opcao = "Cadastrar Funcionário";
	$cabecalho = "Cadastro de Funcionário";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
	<head>
		<link rel="stylesheet" type="text/css" href="../static/css/style.css">			
		<title> 
			<?php echo($objUsuario -> getId() != 0 ? "Edição de Funcionário" : "Cadastro de Funcionário"); ?> 
		</title>
		<script>
		
		</script>
	</head>
	<body>
		<div class="corpo">
			<?php require_once ("LayoutHeader.php"); ?>
			<div class = "centro">
				<div class="cabecalho">
					<h3><?php echo $cabecalho ?></h3>
				</div>
				<div class = "form-container">
					<form name = "formUsuarioCadastro" method = "POST" action = "../App.control/UsuarioController.php">
						<fieldset>
							<legend> Dados do Funcionário </legend>
							<div id="dadosDoUsuario">
								<input type="hidden" name = "id" id = "id" value="<?php echo $objUsuario->getId()?>"/>
								<label for="nome"> Nome: </label>
								<input type="text" name = "nome" id = "nome" value="<?php echo $objUsuario->getNome() ?>"/> <br />
								<label for="login"> Login: </label>
								<input type="text" name = "login" id = "login" value="<?php echo $objUsuario->getLogin() ?>"/> <br />
								<label for="senha"> Senha: </label>
								<input type="password" name = "senha" id = "senha" value=""/> <br />
								<label for="cargo"> Cargo: </label>
								<input type="text" name = "cargo" id = "cargo" value="<?php echo $objUsuario->getCargo() ?>"/> <br />
							</div>
							<div id="permissoes">
								<hr />
								<label for="permissoes"> <strong> <p> Permissões do Funcionário </p> </strong></label> <br />
									<div class="coluna">
										<input type="checkbox" name="grupo" id="criarUsuario" value="criarUsuario"/> Criar Funcionário <br />
										<input type="checkbox" name="grupo" id="listarUsuario" value="listarUsuarios"/> Listar Funcionários <br />
										<input type="checkbox" name="grupo" id="editarUsuario" value="editarUsuario"/> Editar Funcionário <br />
										<input type="checkbox" name="grupo" id="excluirUsuario" value="excluirUsuario"/> Excluir Funcionário <br />			
									</div>
									<div class="coluna">
										<input type="checkbox" name = "grupo" id = "criarServiço" value = "criarServiço" /> Criar Serviço <br />
										<input type="checkbox" name = "grupo" id = "listarServiço" value = "listarServiço"/> Listar Serviços <br />
										<input type="checkbox" name = "grupo" id = "editarServiço" value = "editarServiço"/> Editar Serviço <br />
										<input type="checkbox" name = "grupo" id = "excluirServiço" value = "excluirServiço"/> Excluir Serviço <br />
									</div>
									<div class="coluna">
										<input type="checkbox" name = "grupo" id = "criarCliente" value = "criarCliente" /> Criar Cliente <br />
										<input type="checkbox" name = "grupo" id = "listarCliente" value = "listarClientes"/> Listar Clientes <br />
										<input type="checkbox" name = "grupo" id = "editarCliente" value = "editarCliente"/> Editar Requente <br />
										<input type="checkbox" name = "grupo" id = "excluirCliente" value = "excluirCliente"/> Excluir Cliente <br />
									</div>
							</div>
							<input type="submit" value = "<?php echo $opcao ?>"/>
							<input type="submit" name="voltar" value = "Voltar" />
						</fieldset>
					</form>
				</div>
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