		
		<div class="header">
			<div class="logo">
				<img src="../static/img/logo.png">
			</div>
			<ul class="menu">
				<?php echo " Olá, <b>" . $_SESSION['usuarioNome'] . "</b><br />"; ?>
				
				<li>
					<a href="UsuarioList.php">Home</a>
				</li>
				<li>
					<a href="UsuarioList.php">Usuario</a>
					<ul>
						<li>
							<a href="UsuarioAddEdit.php">Criar Funcionário</a>
						</li>
						<li>
							<a href="UsuarioList.php">Listar Funcionários</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="UsuarioLogin.php?logout=y">Sair</a>
				</li>
			</ul>
		</div>
