<?php
// require 'inc/func.php';
require 'inc/globals.php';

require 'class/Conexion.php';
require 'class/Metodos.php';

require 'class/Tela.php';
require 'class/Movimiento.php';

if(!isset($_REQUEST['action']))
{
	die('Error al ejecutar el programa: Faltan datos esenciales.');
}
else
{
	$action = $_REQUEST['action'];
	$tipo = $_REQUEST['tipo'];
}
	switch($action)
	{
		case 'delete':
			switch ($tipo)
			{
				case 'movimiento':
					$borrar = new Movimiento();
					$borrar->deleteMov($_GET['movID']);
					$seccion_volver = 'readMovimientos';
					break;
				case 'articulo':
					$borrar = new Articulo();
					$borrar->deleteArt($_GET['artID']);
					$seccion_volver = 'readArticulos';
					break;

				case 'tela':
					$borrar = new Tela();
					$borrar->deleteTela($_GET['telaID']);
					$seccion_volver = 'readTelas';
					break;
			}			

		break;
		//-----------------------------------------
		case 'update':
			switch ($tipo)
			{
				case 'movimiento':
					echo "<script>alert('Modelo Modificado!!');</script>";
					$seccion_volver = 'readMovimientos';
					break;
				case 'articulo':
					echo "<script>alert('Modelo Modificado!!');</script>";
					$seccion_volver = 'readArticulos';
					break;

				case 'tela':
					echo "<script>alert('Modelo Modificado!!');</script>";
					$seccion_volver = 'readTelas';
					break;
			}
		break;
		//-----------------------------------------
		case 'create': 
			echo "<script>alert('Modelo ingresado!!');</script>";
			switch ($tipo)
			{
				case 'movimiento':
					$seccion_volver = 'readMovimientos';
					break;
				case 'articulo':
					$seccion_volver = 'readArticulos';
					break;

				case 'tela':
					$seccion_volver = 'readTelas';
					break;
			}
	}

irA($seccion_volver);