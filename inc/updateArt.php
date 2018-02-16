<?php
	require 'class/Articulo.php';

	$updateArt = new Articulo();
	$data_inicial = $updateArt->buscarArtPorID($_GET['artID']);

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$errores = ValidarDatos($_POST,'articulo');
		if(empty($errores))
	    {
	    	$updateArt->updateArt($_POST);
			irActionProcesos('update','articulo');
	    }
	    else
	    {
	    	echo "<script>alert('Verifique los datos ingresados');</script>";
	    	
	    }
	}
?>
<style type="text/css">
	table{text-align: center; display: flex; justify-content: center;}
</style>
<section id="updateArt">
	<h1>Modificar Articulo</h1>

	<span>
<?php
	echo @$errores['art'];
	echo @$errores['cant'];//
	echo @$errores['descrip'];
	echo @$errores['talleID'];
	echo @$errores['colorID'];
	echo @$errores['img'];
?>
 	</span>

<form action="" method="post">
	<table>
		<tr>
			<th>Articulo</th>
			<th>Cantidad</th>
			<th>Descripcion</th>
			<th>Talle</th>
			<th>Color</th>
			<th>Imagen</th>
		</tr>

		<tr align="center">
			<td><input type="placeholder" name="art" value="<?php echo @$data_inicial['art'];?>"></td>
			<td><input type="placeholder" name="cant" value="<?php echo @$data_inicial['cant'];?>"></td>
			<td><input type="placeholder" name="descrip" value="<?php echo @$data_inicial['descrip'];?>"></td>
			<td><input type="placeholder" name="talleID" value="<?php echo @$data_inicial['talleID'];?>"></td>
			<td><input type="placeholder" name="colorID" value="<?php echo @$data_inicial['colorID'];?>"></td>
			<td><input type="placeholder" name="img" value="<?php echo @$data_inicial['img'];?>"></td>
			<input type="placeholder" name="artID" value="<?php echo $_GET['artID'];?>" hidden>
		</tr>
	</table>

	<input type="submit" name="submit" value="MODIFICAR">
</form>
</section>