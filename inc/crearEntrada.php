<?php
$taller = new Taller();
$cliente = new Cliente();

$listaTaller = $taller->readTaller();
$listaCliente = $cliente->readClient();
?>
<section id="crearMov">
	<h1>Crear nueva Entrada</h1>

<form class="needs-validation" novalidate action="action_procesos.php?action=create&tipo=entrada" method="post">
	<table class="tableContainer">
		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Fecha Movimiento</span>
					<input type="date"  class="form-control" name="fechaMov" required>
					<span class="invalid-tooltip">Ingrese una Fecha</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Cantidad</span>
					<input type="text" placeholder="Ingrese alguna Cantidad" class="form-control" name="cantMov" required>
					<span class="invalid-tooltip">Ingrese alguna Cantidad</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="input-group-pretend">
					<select name="selectOrigen" id="selectOrigen" class="form-control">
						<option value="" selected>Seleccione de donde viene la mercaderia</option>
						<option value="cliente">Cliente</option>
						<option value="taller">Taller</option>
						<span class="invalid-tooltip">Ingrese algun origen</span>
						<input id="origen" type="placeholder" name="origen">
					</select>
				</div>
			</td>
		</tr>

ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR 
SEGUIR HACIENDO CODIGO ACA
PHP ERRRROOOOOR!!! :D








<!-- ********************************* TALLERES Y CLIENTES -->
		<tr>
			<td>
		        <div id="cliente" class="input-group-prepend" >
			        <span class="input-group-text">Cliente</span>
					<select id="selectedClient" class="custom-select" required name="clientID">
						<option value="">Seleccione un Cliente</option>
						<?php 
							foreach ($listaCliente as $cl) {
						?>
						<option value="<?php echo $cl['clientID'];?>"><?php echo $cl['nombClient'];?></option>
						<?php } ?>
					</select>
					<div class="invalid-tooltip">Ingrese un Cliente</div>
				</div>
			</td>
		</tr>

		<tr>
			<td>
		        <div id="taller" class="input-group-prepend">
			        <span class="input-group-text">Taller</span>
					<select id="selectedTaller" class="custom-select" required name="tallerID">
						<option value="">Seleccione un Taller</option>
						<?php 
							foreach ($listaTaller as $t) {
						?>
						<option value="<?php echo $t['tallerID'];?>"><?php echo $t['nombTaller'];?></option>
						<?php } ?>
					</select>
					<div class="invalid-tooltip">Ingrese un Taller</div>
				</div>
			</td>
		</tr>

<!-- *********************************************************************** -->
		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Talles</span>
					<input type="text" placeholder="Ingrese Talles" class="form-control" name="tallesMov" required>
					<span class="invalid-tooltip">Ingrese Talles</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Colores</span>
					<input type="text" placeholder="Ingrese Colores" class="form-control" name="nombColor" required>
					<span class="invalid-tooltip">Ingrese Colores</span>
		        </div>
			</td>
		</tr>
	</table>

	<button class="btn btn-primary" type="submit">Agregar</button>
</form>
<script src="js/clienteORtaller.js"></script>
</section>