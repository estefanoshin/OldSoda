<?php
	require 'class/Movimiento.php';
	require 'class/Taller.php';
	require 'class/Cliente.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $create = new Movimiento();

    $errores = ValidarDatos($_POST, 'movimiento');
    $data_inicial = $_POST;

	if(empty($errores))
    {
		$create->createMov($_POST);
		irActionProcesos('create','movimiento');
    }
    else
    {
    	echo "<script>alert('Verifique los datos ingresados')</script>";
    }
}

    $talleres = new Taller();
    $clientes = new Cliente();
    $listaTaller = $talleres->readTaller();
    $listaCliente = $clientes->readClient();
?>
<style type="text/css">
	table{text-align: center; display: flex; justify-content: center;}
</style>
<section id="test">
	<h1>CREAR MOVIMIENTO</h1>

	<span>
<?php
	echo @$errores['fechaMov'];
	echo @$errores['tipoMov'];
	echo @$errores['cantMov'];
	echo @$errores['tallesMov'];
	echo @$errores['colorID'];
	echo @$errores['tallerID'];
	echo @$errores['clientID'];
 ?>
	</span>

<form action="" method="post">
	<table>
		<tr>
			<th>Fecha Movimiento</th>
			<th>Tipo de Movimiento</th>
			<th>Cantidad</th>
			<th>Talles</th>
			<th>Colores</th>
			<th>Taller</th>
			<th>Cliente</th>
		</tr>

		<tr align="center">
			<td><input type="date" name="fechaMov" value="<?php echo @$data_inicial['fechaMov'];?>"></td>
			<td>
				<select name="tipoMov">
					<option value="salida">Salida</option>
					<option value="entrada">Entrada</option>
				</select>
			</td>
			<td><input type="placeholder" name="cantMov" value="<?php echo @$data_inicial['cantMov'];?>"></td>
			<td><input type="placeholder" name="tallesMov" value="<?php echo @$data_inicial['tallesMov'];?>"></td>
			<td><input type="placeholder" name="nombColor" value="<?php echo @$data_inicial['nombColor'];?>"></td>

			<td>
				<select name="tallerID">
				<?php 
					foreach ($listaTaller as $t) {
				?>
				<option value="<?php echo $t['tallerID'];?>"><?php echo $t['nombTaller'];?></option>
				<?php } ?>
				</select>
			</td>

			<td>
				<select name="clientID">
				<?php 
					foreach ($listaCliente as $cl) {
				?>
				<option value="<?php echo $cl['clientID'];?>"><?php echo $cl['nombClient'];?></option>
				<?php } ?>
				</select>
			</td>
		</tr>

		<tr>
			<td colspan="5"></td>
			<td><button type="button">Agregar Taller</button></td>
			<td><button>Agregar Cliente</button></td>
		</tr>
	</table>

	<input type="submit" name="submit" value="Enviar">
</form>
</section>