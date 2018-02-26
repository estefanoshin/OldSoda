<?php
	$clientes = new Cliente();
	$listadoClientes = $clientes->readClient();
?>

<section id="readClientes">

	<h1>Clientes 
	<a class="hoverPointer"><img class="icono" src="img/site/add.png" data-toggle="modal" data-target="#exampleModal"></a></h1>

	<table class="table table-striped">
		<thead>
		<tr align="center">
			<th scope="col">ID</th>
			<th scope="col">Taller</th>
			<th scope="col" colspan="2"></th>
		</tr>
		</thead>

		<tbody>
<?php
	foreach ($listadoClientes as $lc)
	{
?>
		<tr align="center">
			<td><?php echo $lc['clientID'];?></td>
			<td><?php echo $lc['nombClient'];?></td>

			<td><a href="index.php?page=updateClientes&clientID=<?php echo $lc['clientID'];?>"><img class="icono" src="img/site/update.png"></a></td>
			<td><img class="icono" style="cursor: pointer;" id="<?php echo $lc['clientID'];?>" onclick="borrar('clientID','<?php echo $lc['clientID'];?>','cliente')" src="img/site/delete.png"></td>
		</tr>

<?php } ?>
		</tbody>
	</table>

	<!-- INGRESAR NUEVA TALLER (MODAL) -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="resulc" class="modal-body">
        ...
        <script>
        	$( "#resulc" ).load( "inc/crearClientes.php" );
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</section>