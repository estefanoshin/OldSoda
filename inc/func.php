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
		return 'inicio';
	}
}

// function volver(){
// 	if(isset($_GET['page'])){
// 		echo 'onclick="javascript:history.back();"';
// 	}
// }

function existeModelo(){
		global $pdo;
		$busqueda = $pdo->query('SELECT fecha, anio, temporada, art, descripcion, SUM(cant) AS cantTot, tela, cant, imagen FROM produccion GROUP BY art ORDER BY anio DESC, temporada;');
		$dato = ifBusqueda($busqueda);
		return $dato;
}

function listArt($art){
		global $pdo;

		$busqueda = $pdo->query('SELECT idProduccion, nc, fecha, anio, temporada, tela, proveedorTela, art, descripcion, cant, imagen FROM produccion WHERE art = "'.$art.'" ORDER BY anio DESC, temporada;');	

		$dato = ifBusqueda($busqueda);
		return $dato;
}

function obtenerProduccion($art){
	global $pdo;

	if($art == 'inicio'){	
		$busqueda = $pdo->query('SELECT idProduccion, anio, fecha, temporada, cliente, nc, art, descripcion, tela, proveedorTela, cant, talles, colores, taller, imagen FROM produccion ORDER BY anio DESC, temporada;');
		$dato = ifBusqueda($busqueda);
		return $dato;

	} else{
		$busqueda = $pdo->query('SELECT anio, fecha, temporada, cliente, nc, art, descripcion, tela, proveedorTela, cant, talles, colores, taller, imagen FROM produccion WHERE art = '.$art.';');
		
		$dataProd = $busqueda->fetch(PDO::FETCH_ASSOC);

		return $dataProd;
	}
}

function busqPorId($id){
	global $pdo;	

	$busqueda = $pdo->query('SELECT idProduccion, anio, fecha, temporada, cliente, nc, art, descripcion, tela, proveedorTela, cant, talles, colores, taller, imagen FROM produccion WHERE idProduccion = '.$id.';');
		
	$dataProd = $busqueda->fetch(PDO::FETCH_ASSOC);

	return $dataProd;
}

function temporada($temp){
	if(!strcmp(strtoupper($temp), 'OI')){
		return 'OTOÑO-INVIERNO';
	} else{
		return 'PRIMAVERA-VERANO';
	}
}

function buscarImagen($img){
	if(!file_exists('img/'.$img/*.'.jpg'*/)){
		return 'site/noImage.jpg';
	} else{
		return $img;
	}
}

function crearModelo($datos){
	global $pdo;


		if($_FILES['adjImg']['error'] == NO_SUBE_IMAGEN) //4
		{
			$tieneFoto = false;
			$datos['imagen'] = 'noImage';
		}
		else
		{
			$tieneFoto = true;
		}
		
		$busqueda = $pdo->prepare('INSERT INTO `produccion` (`anio`, `fecha`, `temporada`, `cliente`, `nc`, `art`, `descripcion`, `tela`, `proveedorTela`, `cant`, `talles`, `colores`,/* `taller`, */`imagen`) VALUES (:anio, :fecha, :temporada, :cliente, :nc, :art, :descripcion, :tela, :proveedorTela, :cant, :talles, :colores,/* :taller, */:imagen);');

		$busqueda->bindValue(":anio",$datos['anio']);
		$busqueda->bindValue(":fecha",$datos['fecha']);
		$busqueda->bindValue(":temporada",$datos['temporada']);
		$busqueda->bindValue(":cliente",$datos['cliente']);
		$busqueda->bindValue(":nc",$datos['nc']);
		$busqueda->bindValue(":art",$datos['art']);
		$busqueda->bindValue(":descripcion",$datos['descripcion']);
		$busqueda->bindValue(":tela",$datos['tela']);
		$busqueda->bindValue(":proveedorTela",$datos['proveedorTela']);
		$busqueda->bindValue(":cant",$datos['cant']);
		$busqueda->bindValue(":talles",$datos['talles']);
		$busqueda->bindValue(":colores",$datos['colores']);
		// $busqueda->bindValue(":taller",$datos['taller']); //undefined index
		$busqueda->bindValue(":art",$datos['art']);
		$busqueda->bindValue(":imagen",$datos['imagen']);

		$exito = $busqueda->execute();
		
		if ($exito && $tieneFoto)
	{
		move_uploaded_file($_FILES['adjImg']['tmp_name'], 'img/'.$datos['imagen']/*.'.jpg'*/);
	}

	return $exito;
}


function ValidarFoto($name_input_formu)
{

	if($_FILES[$name_input_formu]['error'] == NO_SUBE_IMAGEN)
	{
		return 0;
	}

	if($_FILES[$name_input_formu]['error'] != 0)
	{
		return IMAGEN_ERROR['upload'];
	}

	if($_FILES[$name_input_formu]['type'] != 'image/jpg' && $_FILES[$name_input_formu]['type'] != 'image/png' && $_FILES[$name_input_formu]['type'] != 'image/bmp' && $_FILES[$name_input_formu]['type'] != 'image/jpeg')
	{
		return IMAGEN_ERROR['formato'];
	}
	
	if($_FILES[$name_input_formu]['size'] > IMAGEN_BYTES_TOTAL_ACEPTADO)
	{
		return IMAGEN_ERROR['tamanio'];
	}

	return 0;
}

///-----------------------------------------

function ValidarDatosProducto($datos)
{
	$errores = array();
	
	/*// Valido el nombre:
	if(empty($datos['Nombre']))
	{
		$errores['Nombre'] = 'Ingrese el nombre del producto';
	}
	*/
	// Valido la cantidad:
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
	
	// Valido el Articulo:
	if(empty($datos['art']))
	{
		$errores['art'] = 'Ingrese el Articulo.';
	}
	
	// Valido el Numero de Corte
	if(empty($datos['nc']))
	{
		$errores['nc'] = 'Ingrese el Numero de Corte.';
	}

	// Valido el Cliente
	if(empty($datos['cliente']))
	{
		$errores['cliente'] = 'Ingrese el nombre del cliente.';
	}

	// Valido la Descripcion
	if(empty($datos['descripcion']))
	{
		$errores['descripcion'] = 'Ingrese la Descripcion.';
	}
	
	// Valido la Fecha
	if(empty($datos['fecha']))
	{
		$errores['fecha'] = 'Ingrese la Fecha.';
	}

	// Valido la Temporada
	if(empty($datos['temporada']))
	{
		$errores['temporada'] = 'Ingrese una Temporada.';
	}

	// Valido la tela
	if(empty($datos['tela']))
	{
		$errores['tela'] = 'Ingrese la Tela.';
	}

	// Valido el proveedor de tela
	if(empty($datos['proveedorTela']))
	{
		$errores['proveedorTela'] = 'Ingrese una Proveedor de Tela.';
	}

	// Valido los talles
	if(empty($datos['talles']))
	{
		$errores['talles'] = 'Ingrese una Proveedor de talles.';
	}

	// Valido los colores
	if(empty($datos['colores']))
	{
		$errores['colores'] = 'Ingrese algun color.';
	}

	if($datos['adjImg'])
	{
		switch(validarFoto('adjImg'))
		{
			case IMAGEN_ERROR['upload']: // 1
				$errores['adjImg'] = 'Error de Sistema: NO es posible cargar su imagen. Intente luego.'; 
			break;
				
			case IMAGEN_ERROR['formato']: // 2
				$errores['adjImg'] = 'Formato aceptado: JPG / JPEG / BMP / PNG.'; 
			break;
				
			case IMAGEN_ERROR['tamanio']: // 3
				$errores['adjImg'] = 'La imagen NO debe superar los 40 MB'; 
			break;
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

function isChecked($data,$checkedData){
	if(empty($data)){
	} else {
		if($data == $checkedData){
			echo 'checked';			
		}
	}
}

function checkTalles($data){
	if(empty($data)){
	} else{
		echo 'checked';
	}
}

function checkColorData($data){
	if(empty($data)){
	} else {
		switch ($data) {
			case 'cVarios':
				echo "<script>
				cVarios.checked = true;
				</script>";
				break;
			
			case 'eColorList':
				echo "<script>
				eColorList.checked = true;;
				optionColorList.hidden = false;
				</script>";
				break;
			case 'cPalette':
				echo "<script>
				// cPalette.checked = true;
				// optionPalette.hidden = false;
				</script>";
				break;
		}
	}
}