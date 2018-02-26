<?php
	$entrada = new Entrada();
	$listaEntradas = $entrada->readEntrada();
?>
<section id="readEntrada">
	<h1>Movimientos 
	<a class="hoverPointer"><img class="icono" src="img/site/add.png" data-toggle="modal" data-target="#exampleModal"></a></h1>
	<table class="table table-striped">
		<thead>
		<tr align="center">
			<th scope="col">ID</th>
			<th scope="col">Fecha Entrada</th>
			<th scope="col">Cantidad de entrada</th>
			<th scope="col">Talles</th>
			<th scope="col">Colores</th>
			<th scope="col">Origen</th>
			<th scope="col" colspan="2">+</th>
		</thead>
		</tr>


<?php 
		foreach ($listaEntradas as $le) {
?>
		<tr align="center">
			<td><?php echo $le['entradaID'];?></td>
			<td><?php echo $le['fechaEntrada'];?></td>
			<td><?php echo $le['cantEntrada'];?></td>
			<td><?php echo $le['tallesEntrada'];?></td>
			<td><?php echo $le['colorEntrada'];?></td>
			<td><?php echo $le['origen'];?></td>

			<td><a href="index.php?page=updateEntradas&entradaID=<?php echo $le['entradaID'];?>"><img class="icono" src="img/site/update.png"></a></td>
			<td><img class="icono" style="cursor: pointer;" id="<?php echo $le['entradaID'];?>" onclick="borrar('entradaID','<?php echo $le['entradaID'];?>','entrada')" src="img/site/delete.png"></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Agregar Entrada de Mercadería</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="result" class="modal-body">
        ...
        <script>
        	$( "#result" ).load( "inc/crearEntrada.php" );
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