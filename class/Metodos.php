<?php
function irActionProcesos($action,$tipo)
{
	echo "<script>window.location.assign(window.location.origin+'/soda/action_procesos.php?action=".$action."&tipo=".$tipo."');</script>";
}

function irA($section)
{
	echo "<script>window.location.assign(window.location.origin+'/soda/index.php?page=".$section."');</script>";
}

function ifBusqueda($busqueda){

	if (!$busqueda) {
		echo "error";
		return array();
	}else{
		$result = $busqueda->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		}
}

function obtenerSeccion(){
	if(isset($_GET['page'])){
		return $_GET['page'];
	} else{
		return 'readArticulos';
	}
}

function ValidarDatos($datos,$seccion)
{
	$errores = array();
	
	if($seccion == 'tela')
	{
		// Valido el Nombre de Tela:
		if(empty($datos['nombTela']))
		{
			$errores['nombTela'] = 'Ingrese el Nombre de Tela.';
		}
		
		// Valido el Proveedor de Tela
		if(empty($datos['proveedTela']))
		{
			$errores['proveedTela'] = 'Ingrese el Proveedor de Tela.';
		}	
	}
	
	if($seccion == 'articulo')
	{
		//Valido Cantidad
		if(empty($datos['cant']))
		{
			$errores['cant'] = 'Ingrese la cantidad.';
		}
		else
		{
			if(!is_numeric($datos['cant']) || $datos['cant'] <= 0)
			{
				$errores['cant'] = 'Las cantidades deben ser numeros.';
			}
		}

		// Valido el Articulo
		if(empty($datos['art']))
		{
			$errores['art'] = 'Ingrese el Articulo.';
		}

		// Valido la Descripcion
			if(empty($datos['descrip']))
		{
			$errores['descrip'] = 'Ingrese una Descripcion';
		}

		// Valido el Talle
			if(empty($datos['nombTalle']))
		{
			$errores['nombTalle'] = 'Ingrese un Talle';
		}
		
		// Valido el Color
			if(empty($datos['nombColor']))
		{
			$errores['nombColor'] = 'Ingrese un Color';
		}
	}

	if($seccion == 'movimiento')
	{

		// Valido la Fecha
		if(empty($datos['fechaMov']))
		{
			$errores['fechaMov'] = 'Ingrese una Fecha.';
		}

		// Valido el Tipo de Movimiento
			if(empty($datos['tipoMov']))
		{
			$errores['tipoMov'] = 'Ingrese un Tipo de Movimiento';
		}

		//Valido Cantidad
		if(empty($datos['cantMov']))
		{
			$errores['cantMov'] = 'Ingrese la cantidad.';
		}
		else
		{
			if(!is_numeric($datos['cantMov']) || $datos['cantMov'] <= 0)
			{
				$errores['cantMov'] = 'Las cantidades deben ser numeros.';
			}
		}
		// Valido el Talle
			if(empty($datos['tallesMov']))
		{
			$errores['tallesMov'] = 'Ingrese un Talle';
		}
		
		// Valido el Color
			if(empty($datos['nombColor']))
		{
			$errores['nombColor'] = 'Ingrese un Color';
		}

		// Valido el Taller
			if(empty($datos['tallerID']))
		{
			$errores['tallerID'] = 'Ingrese un Taller';
		}

		// Valido el Cliente
			if(empty($datos['clientID']))
		{
			$errores['clientID'] = 'Ingrese un Cliente';
		}
	}
	/*
	// Valido el stock:
	if(empty($datos['Stock']))
	{
		$errores['Stock'] = 'Ingrese el valor de stock.';
	}
	else
	{
		if(!is_numeric($datos['Stock']) || $datos['Stock'] < 0 || 
		substr_count($datos['Stock'],'.') == 1)
		{
			$errores['Stock'] = 'El valor del stock NO es correcto.';
		}
	}*/

	return $errores;
}

// function errorCode($errores){
// 	foreach ($errores as $index => $value) {
// 		// if($index-strlen($index)==0)
// 		// {
// 		// 	$errorCode += $index."=".$value;
// 		// }
// 		// else
// 		// {
// 		// 	$errorCode += $index."=".$value."&";
// 		// }
// 		// return $errorCode;
// 	}
// }


/*function metodoJoin($dato,$tabla,$joined,$primerID,$segundoID)
{
	$link = Conexion::conectar();
	$sql = "SELECT ".$dato." FROM ".$tabla." JOIN ".$joined." WHERE ".$tabla.".".$primerID." = ".$joined.".".$segundoID;

	$stmt = $link->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo $sql;

    if($stmt->rowCount() == 0)
    {
        echo  '<h2>No existe informacion buscada en la base de datos</h2>';
        return $result;
    }
    else
    {
        return $result;
    }
}*/

function tipoDeMovimiento($tipoMov,$destino)
{
	if($tipoMov == 'entrada')
	{
		
	}
	
	if($tipoMov == 'salida')
	{
		if($destino == 'taller')
		{

		}

		if($destino == 'cliente')
		{
			
		}
	}
}