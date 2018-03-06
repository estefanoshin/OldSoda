<?php
$taller = new Taller();
$listaTaller = $taller->readTaller();

$cliente = new Cliente();
$listaCliente = $cliente->readClient();

$articulo = new Articulo();
$listaArticulo = $articulo->readArt();

$entrada = new Entrada();
$data_inicial = $entrada->buscarEntradaPorID();

$metodo = new Metodo();

?>
<section id="updateEntrada">
	<h1>Crear nueva Entrada</h1>

<form class="needs-validation" novalidate action="action_procesos.php?action=update&tipo=entrada" method="post">
	<table class="tableContainer">
		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Fecha Movimiento</span>
					<input type="date"  class="form-control" name="fechaEntrada" value="<?php echo $data_inicial['fechaEntrada']; ?>" required>
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
						<option value="<?php echo $a['artID']; ?>" <?php $metodo->selected($a['artID'], $data_inicial['articuloID']) ?>><?php echo $a['art']; ?></option>
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
					<input type="text" placeholder="Ingrese alguna Cantidad" class="form-control" name="cantEntrada" value="<?php echo $data_inicial['cantEntrada']; ?>" required>
					<span class="invalid-tooltip">Ingrese alguna Cantidad</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Talles</span>
					<input type="text" placeholder="Ingrese Talles" class="form-control" name="tallesEntrada" value="<?php echo $data_inicial['tallesEntrada']; ?>" required>
					<span class="invalid-tooltip">Ingrese Talles</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Colores</span>
					<input type="text" placeholder="Ingrese Colores" class="form-control" name="colorEntrada" value="<?php echo $data_inicial['colorEntrada']; ?>" required>
					<span class="invalid-tooltip">Ingrese Colores</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
				<div id="origenOpt" class="input-group-pretend">
					<span class="input-group-text">Origen</span>
					<select name="selectOrigen" id="selectOrigen" class="form-control" required>
						<option value="">Seleccione el Origen</option>
						<option <?php $metodo->selected($data_inicial['origen'],'cliente'); ?> value="cliente">Cliente</option>
						<option <?php $metodo->selected($data_inicial['origen'],'taller'); ?> value="taller">Taller</option>
					</select>
				</div>
			</td>
		</tr>

				<input id="origen" type="placeholder" name="origen" value="<?php echo $data_inicial['origen']; ?>" hidden>
		<tr>
			<td>
				<div class="input-group-pretend">
					<input id="origenID" type="placeholder" name="origenID" class="form-control" value="<?php echo $data_inicial['origenID']; ?>" required hidden>
					<span class="invalid-tooltip">Ingrese algun origen</span>
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
						<option <?php $metodo->selected($data_inicial['origenID'],$cl['clientID']); ?> value="<?php echo $cl['clientID'];?>"><?php echo $cl['nombClient'];?></option>
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
						<option <?php $metodo->selected($data_inicial['origenID'],$t['tallerID']); ?> value="<?php echo $t['tallerID'];?>"><?php echo $t['nombTaller'];?></option>
						<?php } ?>
					</select>
				</div>
			</td>
		</tr>
		
		<input type="placeholder" value="<?php echo $_GET['entradaID']; ?>" name="entradaID" hidden>

<!-- *********************************************************************** -->
	</table>

	<button class="btn btn-primary" type="submit">Agregar</button>
</form>
<script>
	var origin = $('#selectOrigen').val();
	if(origin == 'cliente'){
		$('#taller').hide();
	}
		if(origin == 'taller'){
		$('#cliente').hide();
	}
</script>
<script src="js/clienteORtaller.js"></script>
</section>