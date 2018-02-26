<?php
	$tela = new Tela();
	$listaTelas = $tela->readTela();
?>
<section id="readTela">
	<h1>TELAS 
	<a class="hoverPointer"><img class="icono" src="img/site/add.png" data-toggle="modal" data-target="#exampleModal"></a></h1>
	<table class="table table-striped">
		<thead>
		<tr align="center">
			<th scope="col">ID</th>
			<th scope="col">Nombre Tela</th>
			<th scope="col">Proveedor</th>
			<th scope="col" colspan="2">+</th>			
		</tr>
		</thead>

		<tbody>
<?php 
		foreach ($listaTelas as $t) {
			$tela->setTelaID($t['telaID']);
?>
		<tr align="center">
			<td><?php echo $t['telaID'];?></td>
			<td><?php echo $t['nombTela'];?></td>
			<td><?php echo $t['proveedTela'];?></td>
			<td><a href="index.php?page=updateTelas&telaID=<?php echo $t['telaID'];?>"><img class="icono" src="img/site/update.png"></a></td>
			<td><img class="icono" style="cursor: pointer;" id="<?php echo $t['telaID'];?>" onclick="borrarTela('telaID','<?php echo $t['telaID'];?>','tela','<?php echo $tela->verifyTelaDelete($t['telaID']); ?>')" src="img/site/delete.png"></td>

			<td><p>delete : <?php echo $tela->verifyTelaDelete($t['telaID']);?></p></td>
			
		</tr>
<?php
		}
?>
		</tbody>
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
        	$( "#result" ).load( "inc/crearTelas.php" );
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</section>