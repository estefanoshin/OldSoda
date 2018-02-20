<?php
$tela = new Tela();
$listaTelas = $tela->readTela();
/*if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $create = new Articulo();
    $data_inicial = $_POST;

	if(empty($errores))
    {
		$create->createArt($_POST);
		irActionProcesos('create','articulo');
    }
    else
    {
    	echo "<script>alert('Verifique los datos ingresados')</script>";
    }
}*/
?>
<style type="text/css">
	table{text-align: center; display: flex; justify-content: center;}
</style>
<section id="test">
	<h1>CREAR ARTICULO</h1>

<form action="" method="post">
	<table>
		<tr>
			<td>Articulo</td>
			<td><input type="placeholder" name="art"></td>
		</tr>

		<tr>
			<td>Cantidad</td>
			<td><input type="placeholder" name="cant"></td>
		</tr>

		<tr>
			<td>Descripcion</td>
			<td><input type="placeholder" name="descrip"></td>
		</tr>		

		<tr>
			<td>Talle</td>
			<td><input type="placeholder" name="nombTalle"></td>
		</tr>

		<tr>
			<td>Color</td>
			<td><input type="placeholder" name="nombColor"></td>
		</tr>

		<tr>
			<td>Seleccione una Tela</td>
			<td>
				<select name="telaID">
				<?php 
					foreach ($listaTelas as $telas) {
				?>
				<option value="<?php echo $telas['telaID'];?>"><?php echo $telas['nombTela'];?></option>
				<?php } ?>
				</select>
			</td>
			<td></td>
		</tr>

		<tr>
			<td>Seleccione una imagen</td>
			<td><input type="file" name="img"></td>
		</tr>

	</table>

	<input type="submit" name="submit" value="Enviar">
</form>
</section>