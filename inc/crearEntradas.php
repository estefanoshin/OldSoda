<?php
$taller = new Taller();
$listaTaller = $taller->readTaller();

$cliente = new Cliente();
$listaCliente = $cliente->readClient();

$corte = new Corte();
$cortes = $corte->datosJson();
?>

<script>var cortes = <?php echo $cortes; ?>;</script>

<script src="js/listArtEnCorte.js"></script>
<script src="angular/angular-ui.js"></script>
<script src="angular/unique.js"></script>

<section id="crearEntradas" ng-app="crearEntradaSalida" ng-controller="entradaSalida">
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
					<select name="corte" id="corte" class="form-control" required ng-model="datoCortes.nc" ng-change="listaArticulos(datoCortes.nc)">
						<option value="">Seleccione el Corte</option>
						<option ng-repeat="listaDatos in datoCortes | unique : 'nc'" value="{{ listaDatos.nc }}">{{ listaDatos.nc }}</option>
					</select>
					<span class="invalid-tooltip">Ingrese un Numero de Corte</span>
				</div>
			</td>
		</tr>
		
<!-- ************************ ART ************************ -->
		<tr>
			<td>
				<div id="divArticulo" class="input-group-pretend" ng-if="listaArt.length > 0">
					<span class="input-group-text">Articulo</span>
					<select name="articulo" id="articulo" class="form-control" required ng-model="inputCorteID" ng-change="selectedArt(inputCorteID); buscarArticulo(inputCorteID)">
						<option value="">Seleccione un Articulo</option>
						<option ng-repeat="listaArticulos in listaArt" value="{{ listaArticulos.corteID }}">{{ listaArticulos.art }}</option>
					</select>
					<span class="invalid-tooltip">Ingrese un Articulo</span>
				</div>
			</td>
		</tr>

		<input type="text" name="corteID" ng-bind="datoCortes.corteID" value="{{ inputCorteID }}" hidden>
		<input type="text" name="articuloID" ng-bind="datoCortes.corteID" value="{{ inputArtID }}" hidden>
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
					<select name="selectOrigen" id="selectOrigen" class="form-control" required ng-model="origenControl" ng-change="selectOrigen(origenControl)">
						<option value="" selected>Seleccione el Origen</option>
						<option value="cliente">Cliente</option>
						<option value="taller">Taller</option>
					</select>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="input-group-pretend">
					<input id="origen" type="placeholder" name="origen" class="form-control" required value="{{ origenControl }}" hidden>
					<input id="origenName" type="placeholder" name="origenName" class="form-control" required value="{{ finalSelection }}" hidden>
					<span class="invalid-tooltip">Ingrese algun origen</span>
				</div>
			</td>
		</tr>
<!-- ********************************* TALLERES Y CLIENTES -->
		<tr>
			<td>
		        <div id="cliente" class="input-group-prepend" ng-if="origenControl == 'cliente'">
			        <span class="input-group-text">Cliente</span>
					<select id="selectedClient" class="custom-select" name="clientID" ng-model="finalSelection" ng-change="chooseFinalOriginSelection(finalSelection)">
						<option value="">Seleccione un Cliente</option>
						<?php 
							foreach ($listaCliente as $cl) {
						?>
						<option value="<?php echo $cl['nombClient'];?>"><?php echo $cl['nombClient'];?></option>
						<?php } ?>
					</select>
				</div>
			</td>
		</tr>

		<tr>
			<td>
		        <div id="taller" class="input-group-prepend" ng-if="origenControl == 'taller'">
			        <span class="input-group-text">Taller</span>
					<select id="selectedTaller" class="custom-select" name="tallerID" ng-model="finalSelection" ng-change="chooseFinalOriginSelection(finalSelection)">
						<option value="">Seleccione un Taller</option>
						<?php 
							foreach ($listaTaller as $t) {
						?>
						<option value="<?php echo $t['nombTaller'];?>"><?php echo $t['nombTaller'];?></option>
						<?php } ?>
					</select>
				</div>
			</td>
		</tr>

<!-- *********************************************************************** -->
	</table>

	<button class="btn btn-primary" type="submit">Agregar</button>
</form>
</section>