<?php
$taller = new Taller();
$listaTaller = $taller->readTaller();

$cliente = new Cliente();
$listaCliente = $cliente->readClient();

$salida = new Salida();
$data_inicial = $salida->buscarSalidaPorID();

$corte = new Corte();
$cortes = $corte->datosJson();
$corte->setCorteID($data_inicial['corteID']);
$corteInicial = $corte->buscarCortePorID();

$metodo = new Metodo();
?>

<script>var cortes = <?php echo $cortes; ?>;</script>
<script>var iValue = <?php echo $corteInicial['nc']; ?>;</script>

<script src="js/listArtEnCorte.js"></script>
<script src="angular/angular-ui.js"></script>
<script src="angular/unique.js"></script>

<section id="updateSalida" ng-app="crearEntradaSalida" ng-controller="entradaSalida">
	<h1>Modificar Salida</h1>
<form class="needs-validation" novalidate action="action_procesos.php?action=update&tipo=salida" method="post">
	<table class="tableContainer">
		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Fecha Movimiento</span>
					<input type="date"  class="form-control" name="fechaEntrada" required value="<?php echo $data_inicial['fechaSalida']; ?>">
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
					<input type="text" placeholder="Ingrese alguna Cantidad" class="form-control" name="cantSalida" required value="<?php echo $data_inicial['cantSalida']; ?>">
					<span class="invalid-tooltip">Ingrese alguna Cantidad</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Talles</span>
					<input type="text" placeholder="Ingrese Talles" class="form-control" name="tallesSalida" required value="<?php echo $data_inicial['tallesSalida']; ?>">
					<span class="invalid-tooltip">Ingrese Talles</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Colores</span>
					<input type="text" placeholder="Ingrese Colores" class="form-control" name="colorSalida" required value="<?php echo $data_inicial['colorSalida']; ?>">
					<span class="invalid-tooltip">Ingrese Colores</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
				<div id="origenOpt" class="input-group-pretend">
					<span class="input-group-text">Destino</span>
					<select name="selectDestino" id="selectOrigen" class="form-control" required ng-model="origenControl" ng-change="selectOrigen(origenControl)">
						<option value="" selected>Seleccione el Destino</option>
						<option value="cliente">Cliente</option>
						<option value="taller">Taller</option>
					</select>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="input-group-pretend">
					<input id="destino" type="placeholder" name="destino" class="form-control" required value="{{ origenControl }}" hidden>
					<input id="destinoName" type="placeholder" name="destinoName" class="form-control" required value="{{ finalSelection }}" hidden>
					<span class="invalid-tooltip">Ingrese algun Destino</span>
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
	
	<input type="placeholder" name="salidaID" value="<?php echo $_GET['salidaID']; ?>" hidden>
	<button class="btn btn-primary" type="submit">Agregar</button>
</form>
</section>