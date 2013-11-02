<?php
include "../App.control/UsuarioSession.php";
//protegePagina();
include_once "../../Fachada/Fachada.php";
$cabecalho = "Lista de Usuários";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
	<head>
		<link rel="stylesheet" type="text/css" href="../static/css/style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Listar Usuario</title>
	</head>
	<body>
		<?php include_once ("LayoutHeader.php"); ?>
		<div class = "centro">
			<div class="cabecalho">
				<h3><?php echo $cabecalho ?></h3>
			</div>
			<div class="table-container">
				<table border='1'>
				<tr>
					<th> ID </th>
					<th> Nome </th>
					<th> Cargo </th>
					<th> Login </th>
				</tr>
				<?php $listaUsuario = Fachada::getListUsuario("1=1 ORDER BY nome");
				foreach ($listaUsuario as $usuario) {
					echo "<tr>";
					echo "<td>";
					echo $usuario -> getId();
					echo "</td>";
					echo "<td>";
					echo $usuario -> getNome();
					echo "</td>";
					echo "<td>";
					echo $usuario -> getCargo();
					echo "</td>";
					echo "<td>";
					echo $usuario -> getLogin();
					echo "</td>";
					echo "<td><input type='button' value='Ver' onclick=\"javascript:window.location='UsuarioView.php?id=" . $usuario -> getId() . "'\" />";
					echo "<td><input type='button' value='Editar' onclick=\"javascript:window.location='UsuarioAddEdit.php?id=" . $usuario -> getId() . "'\" />";
					echo "<td><input type='button' value='Remover' onclick=\"javascript:window.location='UsuarioDel.php?id=" . $usuario -> getId() . "'\" />";
					echo "</tr>";
				}
				?>
			</table>	
			</div>
		</div>
		<?php require_once ("LayoutRodape.php"); ?>
	</body>
</html>