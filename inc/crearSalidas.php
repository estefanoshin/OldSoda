<?php
$taller = new Taller();
$listaTaller = $taller->readTaller();

$cliente = new Cliente();
$listaCliente = $cliente->readClient();

$articulo = new Articulo();
$listaArticulo = $articulo->readArt();
?>
<section id="crearSalidas">
	<h1>Crear nueva Salida</h1>

<form class="needs-validation" novalidate action="action_procesos.php?action=create&tipo=salida" method="post">
	<table class="tableContainer">
		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Fecha Movimiento</span>
					<input type="date"  class="form-control" name="fechaSalida" required>
					<span class="invalid-tooltip">Ingrese una Fecha</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
				<div id="origenOpt" class="input-group-pretend">
					<span class="input-group-text">Articulo</span>
					<select name="articuloID" id="articuloID" class="form-control" required>
						<option value="">Seleccione el Articulo</option>

						<?php foreach ($listaArticulo as $a) { ?>
						<option value="<?php echo $a['artID']; ?>"><?php echo $a['art']; ?></option>
						<?php } ?>

					</select>
					<span class="invalid-tooltip">Ingrese un Articulo</span>
				</div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Cantidad</span>
					<input type="text" placeholder="Ingrese alguna Cantidad" class="form-control" name="cantSalida" required>
					<span class="invalid-tooltip">Ingrese alguna Cantidad</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Talles</span>
					<input type="text" placeholder="Ingrese Talles" class="form-control" name="tallesSalida" required>
					<span class="invalid-tooltip">Ingrese Talles</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Colores</span>
					<input type="text" placeholder="Ingrese Colores" class="form-control" name="colorSalida" required>
					<span class="invalid-tooltip">Ingrese Colores</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
				<div id="origenOpt" class="input-group-pretend">
					<span class="input-group-text">Destino</span>
					<select name="selectDestino" id="selectOrigen" class="form-control" required>
						<option value="" selected>Seleccione el Destino</option>
						<option value="cliente">Cliente</option>
						<option value="taller">Taller</option>
					</select>
				</div>
			</td>
		</tr>

				<input id="origen" type="placeholder" name="destino" hidden>
		<tr>
			<td>
				<div class="input-group-pretend">
					<input id="origenID" type="placeholder" name="destinoID" class="form-control" required hidden>
					<span class="invalid-tooltip">Ingrese algun Destino</span>
				</div>
			</td>
		</tr>
<!-- ********************************* TALLERES Y CLIENTES -->
		<tr>
			<td>
		        <div id="cliente" class="input-group-prepend" >
			        <span class="input-group-text">Cliente</span>
					<select id="selectedClient" class="custom-select" name="clientID">
						<option value="">Seleccione un Cliente</option>
						<?php 
							foreach ($listaCliente as $cl) {
						?>
						<option value="<?php echo $cl['clientID'];?>"><?php echo $cl['nombClient'];?></option>
						<?php } ?>
					</select>
				</div>
			</td>
		</tr>

		<tr>
			<td>
		        <div id="taller" class="input-group-prepend">
			        <span class="input-group-text">Taller</span>
					<select id="selectedTaller" class="custom-select" name="tallerID">
						<option value="">Seleccione un Taller</option>
						<?php 
							foreach ($listaTaller as $t) {
						?>
						<option value="<?php echo $t['tallerID'];?>"><?php echo $t['nombTaller'];?></option>
						<?php } ?>
					</select>
				</div>
			</td>
		</tr>

<!-- *********************************************************************** -->
	</table>

	<button class="btn btn-primary" type="submit">Agregar</button>
</form>
<script>
	$('#cliente').hide();
	$("#taller").hide();
</script>
<script src="js/clienteORtaller.js"></script>
</section>