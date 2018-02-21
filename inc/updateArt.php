<?php
$updateArt = new Articulo();
$selection = new Metodo();
$tela = new Tela();

$listaTelas = $tela->readTela();
$data_inicial = $updateArt->buscarArtPorID();
?>
<section id="updateArt">
	<h1>Modificar Articulo</h1>

<form action="action_procesos.php?action=update&tipo=articulo" method="post">
	<table>
		<tr>
			<td>Articulo</td>
			<td><input type="placeholder" name="art" value="<?php echo $data_inicial['art'];?>"></td>
		</tr>

		<tr>
			<td>Cantidad</td>
			<td><input type="placeholder" name="cant" value="<?php echo $data_inicial['cant'];?>"></td>
		</tr>

		<tr>
			<td>Descripcion</td>
			<td><input type="placeholder" name="descrip" value="<?php echo $data_inicial['descrip'];?>"></td>
		</tr>

		<tr>
			<td>Talle</td>
			<td><input type="placeholder" name="nombTalle" value="<?php echo $data_inicial['nombTalle'];?>"></td>
		</tr>

		<tr>
			<td>Color</td>
			<td><input type="placeholder" name="nombColor" value="<?php echo $data_inicial['nombColor'];?>"></td>
		</tr>

		<tr>
			<td>Seleccione una Tela</td>
			<td>
				<select name="telaID">
				<?php 
					foreach ($listaTelas as $telas) {
				?>
				<option value="<?php echo $telas['telaID'];?>" <?php $selection->selected($telas['telaID'],$data_inicial['telaID']);?>><?php echo $telas['nombTela'];?></option>
				<?php } ?>
				</select>
			</td>
			<td></td>
		</tr>

		<tr>
			<td>Imagen</td>
			<td><input type="file" name="img" value="<?php echo $data_inicial['img'];?>"></td>
		</tr>

			<input type="placeholder" name="artID" value="<?php echo $_GET['artID'];?>" hidden>
	</table>

	<input type="submit" name="submit" value="MODIFICAR">
</form>
</section>