<?php
abstract class Conexao {	
	private static $mysqli;
	private static $server = "localhost";
	private static $user = "colocarUsuario";
	private static $pass = "colocarSenha";
	private static $dbName = "sguhost";
	
	public static function getDB() {
		try {
			self::$mysqli = new mysqli(self::$server, self::$user, self::$pass, self::$dbName);
			if (mysqli_connect_errno()) {
				throw new Exception('Erro ao conectar!');
			}
		} catch(Exception $e) {
			echo $e->getMessage();
		}
		return self::$mysqli;
	}
}
?>
