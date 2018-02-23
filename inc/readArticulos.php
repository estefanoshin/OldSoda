<?php
	$articulo = new Articulo();
	$listaArt = $articulo->readArt();

	$tela = new Tela();
?>
<section id="readArt">
	<h1>ARTICULOS <a href="index.php?page=crearArt"><img class="icono" src="img/site/add.png"></a></h1>

<?php
		foreach ($listaArt as $art) {
			$tipoTela = $tela->buscarTelaPorID($tela->setTelaID($art['telaID']));
?>
		<div class="card" style="width: 18rem;">
		<a href="index.php?page=verArtSeleccionado&artID=<?php echo $art['artID'];?>">
			<img class="card-img-top btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $art['art'];?>" src="img/site/noImage.jpg" alt="Art image">
		</a>
		<div class="card-body">
			<a href="index.php?page=updateArt&artID=<?php echo $art['artID'];?>">
				<img class="icono" src="img/site/update.png">
			</a>

			<img style="cursor: pointer;" id="<?php echo $art['artID'];?>" onclick="borrar('artID','<?php echo $art['artID'];?>','articulo')" class="icono" src="img/site/delete.png">

			<h5 class="card-title">Articulo : <?php echo $art['art'];?></h5>
		    <p class="card-text"><?php echo $art['descrip'];?></p>
		</div>
		<ul class="list-group list-group-flush">

			<li class="list-group-item">Tela : <?php echo $tipoTela['nombTela'];?></li>
			<li class="list-group-item">Proveedor : <?php echo $tipoTela['proveedTela'];?></li>
		  	<li class="list-group-item">INGRESAR CANTIDAD TOTAL DEL ART</li>
		    <li class="list-group-item">INGRESAR CANTIDAD DE CORTES</li>
		</ul>
	</div>
<?php } ?>

</section>