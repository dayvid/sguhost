<?php
abstract class UsuarioBOAbstract {

	public static function getById($id) {
		include_once "UsuarioDAO.php";
		return UsuarioDAO::getById($id);
	}

	public static function getListAll() {
		include_once "UsuarioDAO.php";
		return UsuarioDAO::getListAll();
	}

	public static function getList($condicao) {
		include_once "UsuarioDAO.php";
		return UsuarioDAO::getList($condicao);
	}

	public static function delete($id) {
		include_once "UsuarioDAO.php";
		return UsuarioDAO::delete($id);
	}

	public static function deleteCondicao($condicao) {
		include_once "UsuarioDAO.php";
		return UsuarioDAO::deleteCondicao($condicao);
	}

	public static function insert($usuario) {
		include_once "UsuarioDAO.php";
		return UsuarioDAO::insert($usuario);	
	}

	public static function update($usuario) {
		include_once "UsuarioDAO.php";
		return UsuarioDAO::update($usuario);
	}

	public static function validarLogin($usuario) {
		include_once "UsuarioDAO.php";
		return UsuarioDAO::validarLogin($usuario);
	}
	
	public static function getListPermissao($condicao) {
		include_once "UsuarioDAO.php";
		return UsuarioDAO::getListPermissao($condicao);		
	}
}
?>