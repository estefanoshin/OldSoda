<?php
$selection = new Metodo();

$corte = new Corte();
$data_inicial = $corte->buscarCortePorID();

$articulo = new Articulo();
$listaArt = $articulo->readArt();
?>
<section id="updateCortes">
	<form id="formCrearCorte" class="needs-validation" novalidate action="action_procesos.php?action=update&tipo=corte" method="post">
		<table class="tableContainer">
			<tr>
				<td>
					<div class="input-group-prepend">
				        <span class="input-group-text">Numero de Corte</span>
						<input type="text" placeholder="Ingrese un Numero de Corte..." class="form-control" name="nc" required value="<?php echo $data_inicial['nc']; ?>">
						<div class="invalid-tooltip">Numero de Corte</div>
				    </div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="input-group-prepend">
				        <span class="input-group-text">Fecha</span>
						<input type="date" placeholder="Ingrese una Fecha..." class="form-control" name="fechaCorte" required value="<?php echo $data_inicial['fechaCorte']; ?>">
						<div class="invalid-tooltip">Ingrese una Fecha</div>
				    </div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="input-group-prepend">
				        <span class="input-group-text">Temporada</span>
						<select class="custom-select" required name="temporada">
							<option value="">Seleccione una Temporada</option>
							<option value="Otoño / Invierno" <?php echo $selection->selected('Otoño / Invierno',$data_inicial['temporada']);?>>Otoño / Invierno</option>
							<option value="Primavera / Verano"  <?php echo $selection->selected('Primavera / Verano',$data_inicial['temporada']);?>>Primavera / Verano</option>
						</select>
						<div class="invalid-tooltip">Ingrese una Temporada</div>
				    </div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="input-group-prepend">
				        <span class="input-group-text">Articulo</span>
						<select class="custom-select" required name="artID">
							<option value="">Seleccione un Articulo</option>

<?php
foreach ($listaArt as $la) {
?>
							<option value="<?php echo $la['artID']; ?>" <?php echo $selection->selected($la['artID'],$data_inicial['artID']);?>><?php echo $la['art']; ?></option>
<?php } ?>
						</select>
						<div class="invalid-tooltip">Ingrese un Articulo</div>
				    </div>
				</td>
			</tr>

			<input type="placeholder" name="corteID" value="<?php echo $_GET['corteID']; ?>" hidden>

		</table>
		<button class="btn btn-primary" type="submit">Agregar</button>
	</form>
</section>