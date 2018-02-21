<?php
$updateArt = new Articulo();
$selection = new Metodo();
$tela = new Tela();

$listaTelas = $tela->readTela();
$data_inicial = $updateArt->buscarArtPorID();
?>
<section id="updateArt">
	<h1>Modificar Articulo</h1>

<form action="action_procesos.php?action=update&tipo=articulo" method="post" class="needs-validation" novalidate>

<table>
	<tr>
		<td>
	        <div class="input-group-prepend">
		        <span class="input-group-text">Articulo</span>
				<input type="text" placeholder="Ingrese el Articulo" class="form-control" name="art" value="<?php echo $data_inicial['art'];?>" required>
				<span class="invalid-tooltip">Ingrese algun Articulo</span>
	        </div>
		</td>
	</tr>

	<tr>
		<td>
	        <div class="input-group-prepend">
		        <span class="input-group-text">Cantidad</span>
				<input type="text" placeholder="Ingrese alguna Cantidad" class="form-control" name="cant" required value="<?php echo $data_inicial['cant'];?>">
				<span class="invalid-tooltip">Ingrese alguna Cantidad</span>
	        </div>
		</td>
	</tr>

	<tr>
		<td>
	        <div class="input-group-prepend">
		        <span class="input-group-text">Descripcion</span>
				<input type="text" placeholder="Ingrese alguna Descripcion" class="form-control" name="descrip" required value="<?php echo $data_inicial['descrip'];?>">
				<span class="invalid-tooltip">Ingrese alguna Descripcion</span>
	        </div>
		</td>
	</tr>		

	<tr>
		<td>
	        <div class="input-group-prepend">
		        <span class="input-group-text">Talle</span>
				<input type="text" placeholder="Ingrese algun Talle" class="form-control" name="nombTalle" required value="<?php echo $data_inicial['nombTalle'];?>">
				<span class="invalid-tooltip">Ingrese algun Talle</span>
	        </div>
		</td>
	</tr>

	<tr>
		<td>
	        <div class="input-group-prepend">
		        <span class="input-group-text">Color</span>
				<input type="text" placeholder="Ingrese algun Color" class="form-control" name="nombColor" required value="<?php echo $data_inicial['nombColor'];?>">
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
					<option value="<?php echo $telas['telaID'];?>" <?php echo $selection->selected($telas['telaID'],$data_inicial['telaID']);?>><?php echo $telas['nombTela'];?></option>
					<?php } ?>
				</select>
				<div class="invalid-tooltip">Ingrese una Tela</div>
			</div>
		</td>

		<td>
			<!-- MODAL BUTTON -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			  + Nueva Tela
			</button>				
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

<input type="placeholder" name="artID" value="<?php echo $_GET['artID'];?>" hidden>

<button class="btn btn-primary" type="submit">Modificar</button>

</form>

<!-- INGRESAR NUEVA TELA (MODAL) -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Tela</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="result" class="modal-body">
        ...
        <script>
        	$( "#result" ).load( "inc/crearTelas.php" );
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="js/validacionImagen.js"></script>
</section>