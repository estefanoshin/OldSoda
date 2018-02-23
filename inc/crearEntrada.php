<?php
$taller = new Taller();
$cliente = new Cliente();

$listaTaller = $taller->readTaller();
$listaCliente = $cliente->readClient();
?>
<section id="crearMov">
	<h1>CREAR MOVIMIENTO</h1>

<form class="needs-validation" novalidate action="" method="post">
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
			        <span class="input-group-text">Tipo de Movimiento</span>
					<select class="custom-select" required name="tipoMov">
						<option value="">Seleccione una Movimiento</option>
						<option value="salida">Salida</option>
						<option value="entrada">Entrada</option>
					</select>
					<div class="invalid-tooltip">Ingrese un Movimiento</div>
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

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Taller</span>
					<select class="custom-select" required name="tallerID">
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

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Cliente</span>
					<select class="custom-select" required name="clientID">
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
	</table>

	<button class="btn btn-primary" type="submit">Agregar</button>
</form>
</section>