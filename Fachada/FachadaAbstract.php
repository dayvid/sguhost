<?php
abstract class FachadaAbstract {
	/*-------------------- Funcionário--------------------*/
	public static function getByIdUsuario($id) {
		include_once "../App.model/UsuarioBO.php";
		return UsuarioBO::getById($id);
	}

	public static function getListAllUsuario() {
		include_once "../App.model/UsuarioBO.php";
		return UsuarioBO::getListAll();
	}

	public static function getListUsuario($condicao) {
		include_once "../App.model/UsuarioBO.php";
		return UsuarioBO::getList($condicao);
	}

	public static function deleteUsuario($id) {
		include_once "../App.model/UsuarioBO.php";
		return UsuarioBO::delete($id);
	}

	public static function deleteCondicaoUsuario($condicao) {
		include_once "../App.model/UsuarioBO.php";
		return UsuarioBO::deleteCondicao($condicao);
	}

	public static function insertUsuario($usuario) {
		include_once ("../App.model/UsuarioBO.php");	
		return UsuarioBO::insert($usuario);
	}

	public static function updateUsuario($usuario) {
		include_once "../App.model/UsuarioBO.php";
		return UsuarioBO::update($usuario);
	}

	public static function validarLoginUsuario($usuario) {
		include_once "../App.model/UsuarioBO.php";
		return UsuarioBO::validarLogin($usuario);
	}
	
	public static function getListPermissao($condicao) {
		include_once "../App.model/UsuarioBO.php";
		return UsuarioBO::getListPermissao($condicao);
	}
}
?>