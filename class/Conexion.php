<?php
Class Conexion{
	private function __construct(){}

	static function conectar()
	{
		$opciones  = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); 

		$dbType = 'mysql';
		$host = 'localhost';
		$dbName = 'soda';
		$user = 'root';
		$password = '';

		$link = new PDO(
						$dbType.":host=".$host.";dbname=".$dbName,
						$user,
						$password,
						$opciones
						);	

					
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		return $link;
	}
}