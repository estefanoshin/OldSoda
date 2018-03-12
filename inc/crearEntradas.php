<?php
$taller = new Taller();
$listaTaller = $taller->readTaller();

$cliente = new Cliente();
$listaCliente = $cliente->readClient();

$art = new Articulo();

$corte = new Corte();
$cortes = $corte->datosJson();
?>
<script>var cortes = []// = <?php //echo $cortes; ?>;</script>
<?php
foreach ($cortes as $crt) {	
?>
<script>cortes.push(<?php echo json_encode($crt); ?>)</script>

<?php } ?>


<script src="js/listArtEnCorte.js"></script>

<div ng-app="crearEntradaSalida" ng-controller="corte">
	
	<div ng-repeat="listaDatos in datoCortes">
		<p>Corte : {{ listaDatos.corteID }} | Articulo : {{ listaDatos.artID }}</p>
	</div>
</div>

<section id="crearEntradas">
	<h1>Crear nueva Entrada</h1>
<form class="needs-validation" novalidate action="action_procesos.php?action=create&tipo=entrada" method="post">
	<table class="tableContainer">
		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Fecha Movimiento</span>
					<input type="date"  class="form-control" name="fechaEntrada" required>
					<span class="invalid-tooltip">Ingrese una Fecha</span>
		        </div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="divCorte" class="input-group-pretend">
					<span class="input-group-text">Corte</span>
					<select name="corte" id="corte" class="form-control" required>
						<option value="">Seleccione el Corte</option>

						<?php 
						$listaCorte = $corte->buscarCorte();
						foreach ($listaCorte as $c) { 
						?>
						<option value="<?php echo $c['corteID']; ?>"><?php echo $c['nc']; ?></option>
						<?php } ?>

					</select>
					<span class="invalid-tooltip">Ingrese un Numero de Corte</span>
				</div>
			</td>
		</tr>

<!-- ************************ ART ************************ -->
		<tr>
			<td>
				<div id="divArticulo" class="input-group-pretend">
					<span class="input-group-text">Articulo</span>
					<select name="articuloID" id="articuloID" class="form-control" required>
						<option value="">Seleccione un Articulo</option>

						<?php
						// $corte->setCorteID(/*ALGUN VALOR*/);
						// $listaArt = $corte->buscarArtPorCorte();
						foreach ($listaArt as $a) { 
							$art->setArtID($a['artID']);
							$datoArt = $art->buscarArtPorID();

						?>

						<option value="<?php echo $a['artID']; ?>"><?php echo $datoArt['art']; ?></option>
						<?php } ?>

					</select>
					<span class="invalid-tooltip">Ingrese un Articulo</span>
				</div>
			</td>
		</tr>

<!-- ************************************************************************ -->

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Cantidad</span>
					<input type="text" placeholder="Ingrese alguna Cantidad" class="form-control" name="cantEntrada" required>
					<span class="invalid-tooltip">Ingrese alguna Cantidad</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Talles</span>
					<input type="text" placeholder="Ingrese Talles" class="form-control" name="tallesEntrada" required>
					<span class="invalid-tooltip">Ingrese Talles</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Colores</span>
					<input type="text" placeholder="Ingrese Colores" class="form-control" name="colorEntrada" required>
					<span class="invalid-tooltip">Ingrese Colores</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
				<div id="origenOpt" class="input-group-pretend">
					<span class="input-group-text">Origen</span>
					<select name="selectOrigen" id="selectOrigen" class="form-control" required>
						<option value="" selected>Seleccione el Origen</option>
						<option value="cliente">Cliente</option>
						<option value="taller">Taller</option>
					</select>
				</div>
			</td>
		</tr>

				<input id="origen" type="placeholder" name="origen" hidden>
		<tr>
			<td>
				<div class="input-group-pretend">
					<input id="origenID" type="placeholder" name="origenID" class="form-control" required hidden>
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
	$('#divArticulo').hide();

	var articuloHTML = "";


	$('#corte').change(function(){
		// var corte = $('#corte option:selected').val();

		$('#divArticulo').show();
		// $('#divArticulo').append(articuloHTML);
		// $('#divArticulo').contents().unwrap();
	});


</script>
<script src="js/clienteORtaller.js"></script>
</section>