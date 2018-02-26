<?php
$cortes = new Corte();
$listaCortes = $cortes->readCorte();
?>
<section id="readCortes">
	<h1>Cortes 
	<a class="hoverPointer"><img class="icono" src="img/site/add.png" data-toggle="modal" data-target="#exampleModal"></a></h1>
	<table class="table table-striped">
		<thead>
			<tr align="center">
				<th scope="col">ID</th>
				<th scope="col">NC</th>
				<th scope="col">Fecha</th>
				<th scope="col">Temporada</th>
				<th scope="col">ART</th>
				<th colspan="2">+</th>
			</tr>
		</thead>

		<tbody>
<?php
			foreach ($listaCortes as $listC) {
?>
			<tr align="center">
				<td><?php echo $listC['corteID']; ?></td>
				<td><?php echo $listC['nc']; ?></td>
				<td><?php echo $listC['fechaCorte']; ?></td>
				<td><?php echo $listC['temporada']; ?></td>
				<td><?php echo $listC['artID']; ?></td>
				<td><a href="index.php?page=updateCortes&corteID=<?php echo $le['corteID'];?>"><img class="icono" src="img/site/update.png"></a></td>
				<td><img class="icono" style="cursor: pointer;" id="<?php echo $le['corteID'];?>" onclick="borrar('corteID','<?php echo $le['corteID'];?>','corte')" src="img/site/delete.png"></td>
			</tr>
<?php } ?>
		</tbody>
	</table>

<!-- INGRESAR NUEVA TELA (MODAL) -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo Corte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="result" class="modal-body">
        ...
        <script>
        	$( "#result" ).load( "inc/crearCorte.php" );
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</section>