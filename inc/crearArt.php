<?php
$tela = new Tela();
$listaTelas = $tela->readTela();
?>
<section id="crearArt">
	<h1>CREAR ARTICULO</h1>

<form class="needs-validation" novalidate action="action_procesos.php?action=create&tipo=articulo" method="post">
	<table>
		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Articulo</span>
					<input type="text" placeholder="Ingrese el Articulo" class="form-control" name="art" required>
					<span class="invalid-tooltip">Ingrese algun Articulo</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Cantidad</span>
					<input type="text" placeholder="Ingrese alguna Cantidad" class="form-control" name="cant" required>
					<span class="invalid-tooltip">Ingrese alguna Cantidad</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Descripcion</span>
					<input type="text" placeholder="Ingrese alguna Descripcion" class="form-control" name="descrip" required>
					<span class="invalid-tooltip">Ingrese alguna Descripcion</span>
		        </div>
			</td>
		</tr>		

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Talle</span>
					<input type="text" placeholder="Ingrese algun Talle" class="form-control" name="nombTalle" required>
					<span class="invalid-tooltip">Ingrese algun Talle</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Color</span>
					<input type="text" placeholder="Ingrese algun Color" class="form-control" name="nombColor" required>
					<span class="invalid-tooltip">Ingrese algun Color</span>
		        </div>
			</td>
		</tr>

		<tr>
			<td>
		        <div class="input-group-prepend">
			        <span class="input-group-text">Tela</span>
					<select class="custom-select" required name="telaID">
						<option value="">Seleccione una Tela</option>
						<?php 
							foreach ($listaTelas as $telas) {
						?>
						<option value="<?php echo $telas['telaID'];?>"><?php echo $telas['nombTela'];?></option>
						<?php } ?>
					</select>
					<div class="invalid-tooltip">Ingrese una Tela</div>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="custom-file">
					<input id="img" onchange="return fileValidation();" type="file" accept="image/*" class="custom-file-input" id="validatedCustomFile" name="img">
					<label class="custom-file-label" for="validatedCustomFile">Elija una imagen...</label>
				</div>
			</td>
		</tr>

		<tr>
			<td><div id="imagePreview"></div></td>
		</tr>

	</table>

	<button class="btn btn-primary" type="submit">Agregar</button>
</form>

<script src="js/validacion.js"></script>
<script src="js/validacionImagen.js"></script>
</section>