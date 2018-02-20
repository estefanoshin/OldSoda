<?php
require 'const.php';

	if(extension_loaded('pdo_mysql'))
{
	$pdo = new PDO('mysql:host='.CONEXION_DB['host'].';dbname='.CONEXION_DB['namebase'],CONEXION_DB['user'],CONEXION_DB['pass'],array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES 'utf8'",PDO::MYSQL_ATTR_FOUND_ROWS => true));

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	
	return $pdo;		
}
else
{
	die('NO es posible conectar.');
}