<?php
$taller = new Taller();
$listaTaller = $taller->readTaller();

$cliente = new Cliente();
$listaCliente = $cliente->readClient();

$entrada = new Entrada();
$data_inicial = $entrada->buscarEntradaPorID();

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

<section id="updateEntrada" ng-app="crearEntradaSalida" ng-controller="entradaSalida">
	<h1>Modificar Entrada</h1>

<form class="needs-validation" novalidate action="action_procesos.php?action=update&tipo=entrada" method="post">
	<table class="tableContainer">
		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Fecha Movimiento</span>
					<input type="date"  class="form-control" name="fechaEntrada" required value="<?php echo $data_inicial['fechaEntrada']; ?>">
					<span class="invalid-tooltip">Ingrese una Fecha</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
				<div id="divCorte" class="input-group-pretend">
					<span class="input-group-text">Corte</span>
					<select
						name="corte"
						id="corte"
						class="form-control"
						required
						ng-model="datoCortes.nc"
						ng-change="listaArticulos(datoCortes.nc)"
						ng-init="listaArticulos('<?php echo $corteInicial['nc']; ?>'); datoCortes.nc = '<?php echo $corteInicial['nc']; ?>'"
						>
						<option value="">Seleccione el Corte</option>
						<option ng-repeat="listaDatos in datoCortes | unique : 'nc'" value="{{ listaDatos.nc }}">{{ listaDatos.nc }}</option>
					</select>
					<a class="btn btn-primary" href="index.php?page=crearCortes">Nuevo Corte</a>
					<span class="invalid-tooltip">Ingrese un Numero de Corte</span>
				</div>
			</td>
		</tr>
	
<!-- ************************ ART ************************ -->
		<tr>
			<td>
				<div id="divArticulo" class="input-group-pretend" ng-if="listaArt.length > 0">
					<span class="input-group-text">Articulo</span>
					<select
						name="articulo"
						id="articulo"
						class="form-control"
						required
						ng-model="inputCorteID"
						ng-change="selectedArt(inputCorteID); buscarArticulo(inputCorteID)"
						ng-init="inputCorteID = '<?php echo $corteInicial['corteID']; ?>'"
						>
						<option value="">Seleccione un Articulo</option>
						<option ng-repeat="listaArticulos in listaArt" value="{{ listaArticulos.corteID }}">{{ listaArticulos.art }}</option>
					</select>
					<a class="btn btn-primary" href="index.php?page=crearArt">Nuevo Articulo</a>
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
					<input type="text" placeholder="Ingrese alguna Cantidad" class="form-control" name="cantEntrada" required value="<?php echo $data_inicial['cantEntrada'] ?>">
					<span class="invalid-tooltip">Ingrese alguna Cantidad</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Talles</span>
					<input type="text" placeholder="Ingrese Talles" class="form-control" name="tallesEntrada" required value="<?php echo $data_inicial['tallesEntrada'] ?>">
					<span class="invalid-tooltip">Ingrese Talles</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Colores</span>
					<input type="text" placeholder="Ingrese Colores" class="form-control" name="colorEntrada" required value="<?php echo $data_inicial['colorEntrada'] ?>">
					<span class="invalid-tooltip">Ingrese Colores</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
				<div id="origenOpt" class="input-group-pretend">
					<span class="input-group-text">Origen</span>
					<select
						name="selectOrigen"
						id="selectOrigen"
						class="form-control"
						required
						ng-model="origenControl"
						ng-change="selectOrigen(origenControl)"
						ng-init="origenControl = '<?php echo $data_inicial['origen']; ?>'">
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
					<select
						id="selectedClient"
						class="custom-select"
						name="clientID"
						ng-model="finalSelection"
						ng-change="chooseFinalOriginSelection(finalSelection)"
						<?php if($data_inicial['origen']=='cliente'){ ?>
							ng-init="finalSelection = '<?php echo $data_inicial['origenName']; ?>'"
						<?php }else{ ?>
							ng-init="finalSelection = ''"
						<?php } ?>>
						<option value="">Seleccione un Cliente</option>
						<?php 
							foreach ($listaCliente as $cl) {
						?>
						<option value="<?php echo $cl['nombClient'];?>"><?php echo $cl['nombClient'];?></option>
						<?php } ?>
					</select>
					<a class="btn btn-primary" href="index.php?page=crearClientes">Nuevo Cliente</a>
				</div>
			</td>
		</tr>

		<tr>
			<td>
		        <div id="taller" class="input-group-prepend" ng-if="origenControl == 'taller'">
			        <span class="input-group-text">Taller</span>
					<select
						id="selectedTaller"
						class="custom-select"
						name="tallerID"
						ng-model="finalSelection"
						ng-change="chooseFinalOriginSelection(finalSelection)"
						<?php if($data_inicial['origen']=='taller'){ ?>
							ng-init="finalSelection = '<?php echo $data_inicial['origenName']; ?>'"
						<?php }else{ ?>
							ng-init="finalSelection = ''"
						<?php } ?>>
						<option value="">Seleccione un Taller</option>
						<?php 
							foreach ($listaTaller as $t) {
						?>
						<option value="<?php echo $t['nombTaller'];?>"><?php echo $t['nombTaller'];?></option>
						<?php } ?>
					</select>
					<a class="btn btn-primary" href="index.php?page=crearTalleres">Nuevo Taller</a>
				</div>
			</td>
		</tr>

<!-- *********************************************************************** -->
	</table>
	
	<input type="placeholder" name="entradaID" value="<?php echo $_GET['entradaID']; ?>" hidden>
	<button class="btn btn-primary" type="submit">Agregar</button>
</form>
</section>