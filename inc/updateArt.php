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
	

	echo @$errores['nombTalle'];
	echo @$errores['nombColor'];
	echo @$errores['img'];
?>
 	</span>

<form action="" method="post">
	<table>
		<tr>
			<td>Articulo</td>
			<td><input type="placeholder" name="art" value="<?php echo @$data_inicial['art'];?>"></td>
			<td><?php echo @$errores['art']; ?></td>
		</tr>

		<tr>
			<td>Cantidad</td>
			<td><input type="placeholder" name="cant" value="<?php echo @$data_inicial['cant'];?>"></td>
			<td><?php echo @$errores['cant']; ?></td>
		</tr>

		<tr>
			<td>Descripcion</td>
			<td><input type="placeholder" name="descrip" value="<?php echo @$data_inicial['descrip'];?>"></td>
			<td><?php echo @$errores['descrip']; ?></td>
		</tr>

		<tr>
			<td>Talle</td>
			<td><input type="placeholder" name="nombTalle" value="<?php echo @$data_inicial['nombTalle'];?>"></td>
			<td><?php echo @$errores['nombTalle']; ?></td>
		</tr>

		<tr>
			<td>Color</td>
			<td><input type="placeholder" name="nombColor" value="<?php echo @$data_inicial['nombColor'];?>"></td>
			<td><?php echo @$errores['nombColor']; ?></td>
		</tr>

		<tr>
			<td>Imagen</td>
			<td><input type="file" name="img" value="<?php echo @$data_inicial['img'];?>"></td>
			<td><?php echo @$errores['img']; ?></td>
		</tr>

			<input type="placeholder" name="artID" value="<?php echo $_GET['artID'];?>" hidden>
	</table>

	<input type="submit" name="submit" value="MODIFICAR">
</form>
</section>