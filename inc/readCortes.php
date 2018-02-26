<?php
$cortes = new Corte();
$listaCortes = $cortes->readCorte();

$articulo = new Articulo();
?>
<section id="readCortes">
	<h1>Cortes <a href="index.php?page=crearCortes"><img class="icono" src="img/site/add.png"></a></h1>
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
			$articulo->setArtID($listC['artID']);
			$datoArt = $articulo->buscarArtPorID();
?>
			<tr align="center">
				<td><?php echo $listC['corteID']; ?></td>
				<td><?php echo $listC['nc']; ?></td>
				<td><?php echo $listC['fechaCorte']; ?></td>
				<td><?php echo $listC['temporada']; ?></td>
				<td><?php print_r($datoArt['art']); ?></td>
				<td><a href="index.php?page=updateCortes&corteID=<?php echo $listC['corteID'];?>"><img class="icono" src="img/site/update.png"></a></td>
				<td><img class="icono" style="cursor: pointer;" id="<?php echo $listC['corteID'];?>" onclick="borrar('corteID','<?php echo $listC['corteID'];?>','corte')" src="img/site/delete.png"></td>
			</tr>
<?php } ?>
		</tbody>
	</table>

</section>