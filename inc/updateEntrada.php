<?php
	$updateMov = new Movimiento();
	$data_inicial = $updateMov->buscarMovPorID($_GET['movID']);

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$errores = ValidarDatos($_POST,'movimiento');
		if(empty($errores))
	    {
	    	$updateMov->updateMov($_POST);
			irActionProcesos('update','movimiento');
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
<section id="updateMov">
	<h1>Modificar Movimiento</h1>

	<span>
<?php
	echo @$errores['fechaMov'];
	echo @$errores['tipoMov'];
	echo @$errores['cantMov'];
	echo @$errores['tallesMov'];
	echo @$errores['nombColor'];
	echo @$errores['tallerID'];
	echo @$errores['clientID'];
?>
 	</span>

<form action="" method="post">
	<table>
		<tr>
			<th>Fecha Movimiento</th>
			<th>Tipo de Movimiento</th>
			<th>Cantidad de movimiento</th>
			<th>Talles</th>
			<th>Colores</th>
			<th>Taller</th>
			<th>Cliente</th>
		</tr>

		<tr align="center">
			<td><input type="date" name="fechaMov" value="<?php echo @$data_inicial['fechaMov'];?>"></td>
			<td><input type="placeholder" name="tipoMov" value="<?php echo @$data_inicial['tipoMov'];?>"></td>
			<td><input type="placeholder" name="cantMov" value="<?php echo @$data_inicial['cantMov'];?>"></td>
			<td><input type="placeholder" name="tallesMov" value="<?php echo @$data_inicial['tallesMov'];?>"></td>
			<td><input type="placeholder" name="nombColor" value="<?php echo @$data_inicial['nombColor'];?>"></td>
			<td><input type="placeholder" name="tallerID" value="<?php echo @$data_inicial['tallerID'];?>"></td>
			<td><input type="placeholder" name="clientID" value="<?php echo @$data_inicial['clientID'];?>"></td>
			<input type="placeholder" name="movID" value="<?php echo $_GET['movID'];?>" hidden>
		</tr>
	</table>

	<input type="submit" name="submit" value="MODIFICAR">
</form>
</section>