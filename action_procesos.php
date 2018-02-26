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
				case 'entrada':
					$borrar = new Entrada();
					$borrar->deleteEntrada();
					$seccion_volver = 'readEntradas';
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

				case 'taller':
					$borrar = new Taller();
					$borrar->deleteTaller();
					$seccion_volver = 'readTalleres';
					break;

				case 'cliente':
					$borrar = new Cliente();
					$borrar->deleteClient();
					$seccion_volver = 'readClientes';
					break;
			}			

		break;
		//-----------------------------------------
		case 'update':
			switch ($tipo)
			{
				case 'entrada':
					$obj = new Entrada();
					$check = $obj->updateEntrada();
					if($check)
					{
						echo "<script>alert('Modificado exitosamente!!');</script>";
					}
					$seccion_volver = 'readEntradas';
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

				case 'taller':
					$obj = new Taller();
					$check = $obj->updateTaller();
					if($check)
					{
						echo "<script>alert('Modificado exitosamente!!');</script>";
					}
					$seccion_volver = 'readTalleres';
					break;

				case 'cliente':
					$obj = new Cliente();
					$check = $obj->updateClient();
					if($check)
					{
						echo "<script>alert('Modificado exitosamente!!');</script>";
					}
					$seccion_volver = 'readClientes';
					break;
			}
		break;
		//-----------------------------------------
		case 'create': 
			// echo "<script>alert('Modelo ingresado!!');</script>";
			switch ($tipo)
			{
				case 'entrada':
					$obj = new Entrada();
					$check = $obj->createEntrada();
					if($check)
					{
						echo "<script>alert('Agregado exitosamente!!');</script>";
					}
					$seccion_volver = 'readEntradas';
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

				case 'taller':
					$obj = new Taller();
					$check = $obj->createTaller();
					if($check)
					{
						echo "<script>alert('Agregado exitosamente!!');</script>";
					}
					$seccion_volver = 'readTalleres';
					break;

				case 'cliente':
					$obj = new Cliente();
					$check = $obj->createClient();
					if($check)
					{
						echo "<script>alert('Agregado exitosamente!!');</script>";
					}
					$seccion_volver = 'readClientes';
					break;
			}
	}


$volver = $functions->irA($seccion_volver);