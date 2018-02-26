<?php
	$talleres = new Taller();
	$listadoTalleres = $talleres->readTaller();
?>

<section id="readTalleres">

	<h1>Talleres 
	<a class="hoverPointer"><img class="icono" src="img/site/add.png" data-toggle="modal" data-target="#exampleModal"></a></h1>

	<table class="table table-striped">
		<thead>
		<tr align="center">
			<th scope="col">ID</th>
			<th scope="col">Taller</th>
			<th scope="col" colspan="2">+</th>
		</tr>
		</thead>

<?php
	foreach ($listadoTalleres as $lt)
	{
?>
		<tbody>
		<tr align="center">
			<td><?php echo $lt['tallerID'];?></td>
			<td><?php echo $lt['nombTaller'];?></td>

			<td><a href="index.php?page=updateTalleres&tallerID=<?php echo $lt['tallerID'];?>"><img class="icono" src="img/site/update.png"></a></td>
			<td><img class="icono" style="cursor: pointer;" id="<?php echo $lt['tallerID'];?>" onclick="borrar('tallerID','<?php echo $lt['tallerID'];?>','taller')" src="img/site/delete.png"></td>
		</tr>
		</tbody>

<?php } ?>
	</table>

	<!-- INGRESAR NUEVA TALLER (MODAL) -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="result" class="modal-body">
        ...
        <script>
        	$( "#result" ).load( "inc/crearClientes.php" );
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</section>