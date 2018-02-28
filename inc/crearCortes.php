<?php
$articulo = new Articulo();
$listaArt = $articulo->readArt();
?>
<section id="crearCortes">
	<form id="formCrearCorte" class="needs-validation" novalidate action="action_procesos.php?action=create&tipo=corte" method="post">
		<table class="tableContainer">
			<tr>
				<td>
					<div class="input-group-prepend">
				        <span class="input-group-text">Numero de Corte</span>
						<input type="text" placeholder="Ingrese un Numero de Corte..." class="form-control" name="nc" required>
						<div class="invalid-tooltip">Numero de Corte</div>
				    </div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="input-group-prepend">
				        <span class="input-group-text">Fecha</span>
						<input type="date" placeholder="Ingrese una Fecha..." class="form-control" name="fechaCorte" required>
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
							<option value="Otoño / Invierno">Otoño / Invierno</option>
							<option value="Primavera / Verano">Primavera / Verano</option>
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
							<option value="<?php echo $la['artID']; ?>"><?php echo $la['art']; ?></option>
<?php } ?>

						</select>
						<div class="invalid-tooltip">Ingrese un Articulo</div>
				    </div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="input-group-prepend">
				        <span class="input-group-text">Cantidad</span>
						<input type="text" placeholder="Ingrese una Cantidad..." class="form-control" name="cantidad" required>
						<div class="invalid-tooltip">Ingrese una Cantidad</div>
				    </div>
				</td>
			</tr>

		</table>
		<button class="btn btn-primary" type="submit">Agregar</button>
	</form>
</section>