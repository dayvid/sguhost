<?php
class UsuarioDAO {

	public static function getById($id) {
		include_once "UsuarioVO.php";
		include_once "../../BD/Conexao.php";
		$mysqli = Conexao::getDB();
		$sql = $mysqli -> prepare("SELECT * FROM Usuario WHERE idUsuario = ?");
		$sql -> bind_param('i', $id);
		if ($sql) {
			$sql -> execute();
			$sql -> bind_result($id, $nome, $login, $senha, $cargo);
			$sql -> fetch();
			$usuario = new UsuarioVO();
			$usuario -> setId($id);
			$usuario -> setNome($nome);
			$usuario -> setLogin($login);
			$usuario -> setSenha($senha);
			$usuario -> setCargo($cargo);
			$sql -> close();
			$mysqli -> close();
			return $usuario;
		}
	}

	public static function insert($usuario) {
		include_once "../../BD/Conexao.php";
		$mysqli = Conexao::getDB();
		$sql = $mysqli -> prepare("INSERT INTO Usuario (nome,login,senha,cargo) VALUES (?,?,?,?)");
		$sql -> bind_param('ssss', $usuario -> getNome(), $usuario -> getLogin(), $usuario -> getSenha(), $usuario -> getCargo());
		$sql -> execute();
		$newID = $sql -> insert_id;
		$sql -> close();
		$mysqli -> close();
		return $newID;
	}

	public static function delete($id) {
		include_once "../../BD/Conexao.php";
		$mysqli = Conexao::getDB();
		$sql = $mysqli -> prepare("DELETE FROM Usuario WHERE idUsuario = ?");
		$sql -> bind_param('i', $id);
		$isDeletado = $sql -> execute();
		$sql -> close();
		$mysqli -> close();
		return $isDeletado;
	}

	public static function deleteCondicao($condicao) {
		include_once "../../BD/Conexao.php";
		$mysqli = Conexao::getDB();
		$sql = $mysqli -> prepare("DELETE FROM Usuario WHERE " . $condicao);
		$isDeletado = $sql -> execute();
		$sql -> close();
		$mysqli -> close();
		return $isDeletado;
	}

	public static function update($usuario) {
		include_once "../../BD/Conexao.php";
		$mysqli = Conexao::getDB();
		$sql = $mysqli -> prepare("UPDATE Usuario SET 
				nome = ?,
				login = ?,
				senha = ?,
				cargo = ?
				WHERE idUsuario = ?");
		$sql -> bind_param('ssssi', $usuario -> getNome(), $usuario -> getLogin(), $usuario -> getSenha(), $usuario -> getCargo(), $usuario -> getId());
		$sql -> execute();
		$sql -> close();
		$mysqli -> close();
	}

	public static function getListAll() {
		include_once "UsuarioVO.php";
		include_once "../../BD/Conexao.php";
		$mysqli = Conexao::getDB();
		$sql = 'SELECT * FROM Usuario';
		if ($sql = $mysqli -> prepare($sql)) {
			$sql -> execute();
			$sql -> bind_result($id, $nome, $login, $senha, $cargo, $nivel);
			$i = 0;
			$lista = array();
			while ($sql -> fetch()) {
				$usuario = new UsuarioVO();
				$usuario -> setId($id);
				$usuario -> setNome($nome);
				$usuario -> setLogin($login);
				$usuario -> setSenha($senha);
				$usuario -> setCargo($cargo);
				$usuario -> setNivel($nivel);
				$lista[$i] = $usuario;
				$i++;
			}
			$mysqli -> close();
			return $lista;
		}
	}

	public static function getList($condicao) {
		include_once "UsuarioVO.php";
		include_once "../../BD/Conexao.php";
		$mysqli = Conexao::getDB();
		$sql = 'SELECT idUsuario, nome, login, cargo FROM Usuario WHERE ' . $condicao;
		if ($stmt = $mysqli -> prepare($sql)) {
		
			$stmt -> execute();
			$stmt -> bind_result($id, $nome, $login, $cargo);
			$lista = array();
			$i = 0;
			while ($stmt -> fetch()) {	
				$usuario = new UsuarioVO();
				$usuario -> setId($id);
				$usuario -> setNome($nome);
				$usuario -> setCargo($cargo);
				$usuario -> setLogin($login);
				$lista[$i] = $usuario;
				$i++;
			}
			$mysqli -> close();
			$stmt -> close();
			return $lista;
		}
	}

	function validarLogin($usuario) {
		include_once "../../BD/Conexao.php";
		global $_SG;
		$nusuario = $usuario -> getLogin();
		$nsenha = $usuario -> getSenha();
		$mysqli = Conexao::getDB();
	
		$sql = "SELECT idUsuario, nome FROM Usuario WHERE BINARY login = ? AND BINARY senha = ? LIMIT 1";
		if ($stmt = $mysqli -> prepare($sql)) {
			$stmt -> bind_param('ss', $nusuario, $nsenha);
			$stmt -> execute();
			$stmt -> bind_result($id, $nome);
			$stmt -> fetch();
			if (!empty($id)) {
				$_SESSION['usuarioID'] = $id;
				$_SESSION['usuarioNome'] = $nome;
				$_SESSION['usuarioLogin'] = $nusuario;
				$_SESSION['usuarioSenha'] = $nsenha;
				return true;
			}
		}
		return false;
	}
	
	function getListPermissao($condicao) {
		include_once "../../BD/Conexao.php";
		include_once "PermissaoVO";
		$condicao = mysqli_real_escape_string($condicao);
		$mysqli = Conexao::getDB();
		$sql = "SELECT idPermissao FROM UsuarioPermissao WHERE " . $condicao;
		if($stmt = $mysqli -> prepare($sql)) {
			$stmt -> execute();
			$stmt -> bind_result($idPermissao);
			$lista = array();
			while($stmt -> fetch()) {
				$permissao = new PermissaoVO();
				$permissao -> setId($idPermissao);
				$lista[count($lista)] = $permissao;
			}
			return $lista;
		}		
	}
}
?>