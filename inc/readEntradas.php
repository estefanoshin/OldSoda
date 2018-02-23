<?php
	$mov = new Movimiento();
	$listaMov = $mov->readMov();
?>
<section id="readMov">
	<!-- <h1>Movimientos <a href="index.php?page=crearMov"><img class="icono" src="img/site/add.png"></a></h1> -->
	<h1>Movimientos 
	<a class="hoverPointer"><img class="icono" src="img/site/add.png" data-toggle="modal" data-target="#exampleModal"></a></h1>
	<table class="table table-striped">
		<thead>
		<tr align="center">
			<th scope="col">ID</th>
			<th scope="col">Fecha Movimiento</th>
			<th scope="col">Tipo de Movimiento</th>
			<th scope="col">Cantidad de movimiento</th>
			<th scope="col">Talles</th>
			<th scope="col">Colores</th>
			<th scope="col">Taller</th>
			<th scope="col">Cliente</th>
			<th scope="col" colspan="2">+</th>
		</thead>
		</tr>


<?php 
		foreach ($listaMov as $t) {
?>
		<tr align="center">
			<td><?php echo $t['movID'];?></td>
			<td><?php echo $t['fechaMov'];?></td>
			<td><?php echo $t['tipoMov'];?></td>
			<td><?php echo $t['cantMov'];?></td>
			<td><?php echo $t['tallesMov'];?></td>
			<td><?php echo $t['nombColor'];?></td>
			<td><?php echo $t['tallerID'];?></td>
			<td><?php echo $t['clientID'];?></td>

			<td><a href="index.php?page=updateMov&movID=<?php echo $t['movID'];?>"><img class="icono" src="img/site/update.png"></a></td>
			<td><img class="icono" style="cursor: pointer;" id="<?php echo $t['movID'];?>" onclick="borrar('movID','<?php echo $t['movID'];?>','movimiento')" src="img/site/delete.png"></td>
		</tr>
<?php
		}
?>
	</table>

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
        	$( "#result" ).load( "inc/crearMov.php" );
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="js/script.js"></script>
</section>