<?php
require 'config/config.php';
$functions = new Metodo;

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
					$borrar->deleteMov();
					$seccion_volver = 'readMovimientos';
					break;
				case 'articulo':
					$borrar = new Articulo();
					$borrar->deleteArt();
					$seccion_volver = 'readArticulos';
					break;

				case 'tela':
					$borrar = new Tela();
					$borrar->deleteTela();
					$seccion_volver = 'readTelas';
					break;
			}			

		break;
		//-----------------------------------------
		case 'update':
			switch ($tipo)
			{
				case 'movimiento':
					$obj = new Movimiento();
					$check = $obj->updateMov();
					if($check)
					{
						echo "<script>alert('Modificado exitosamente!!');</script>";
					}
					$seccion_volver = 'readMovimientos';
					break;
				case 'articulo':
					$obj = new Articulo();
					$check = $obj->updateArt();
					if($check)
					{
						echo "<script>alert('Modificado exitosamente!!');</script>";
					}
					$seccion_volver = 'readArticulos';
					break;

				case 'tela':
					$obj = new Tela();
					$check = $obj->updateTela();
					if($check)
					{
						echo "<script>alert('Modificado exitosamente!!');</script>";
					}
					$seccion_volver = 'readTelas';
					break;
			}
		break;
		//-----------------------------------------
		case 'create': 
			// echo "<script>alert('Modelo ingresado!!');</script>";
			switch ($tipo)
			{
				case 'movimiento':
					$obj = new Movimiento();
					$check = $obj->createMov();
					if($check)
					{
						echo "<script>alert('Agregado exitosamente!!');</script>";
					}
					$seccion_volver = 'readMovimientos';
					break;
				case 'articulo':
					$obj = new Articulo();
					$check = $obj->createArt();
					if($check)
					{
						echo "<script>alert('Agregado exitosamente!!');</script>";
					}
					$seccion_volver = 'readArticulos';
					break;

				case 'tela':
					$obj = new Tela();
					$check = $obj->createTela();
					if($check)
					{
						echo "<script>alert('Agregado exitosamente!!');</script>";
					}
					$seccion_volver = 'readTelas';
					break;
			}
	}

$volver = $functions->irA($seccion_volver);