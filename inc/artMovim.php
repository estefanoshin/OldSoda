<?php
	$produccion = listArt($_GET['art']);
	$anioAux = $produccion[0]['anio'];
	$tempAux = $produccion[0]['temporada'];
?>

<section id="artDescripcion" class="claseArtList">
	<summary>
		<h1>Articulo: <?= $_GET['art'];?></h1>
	</summary>

	<figure><img /<?= "src=img/".buscarImagen($produccion[0]['imagen']);?>></figure>

	<table>
		<th></th>
		<th>FECHA</th>
		<th>NC</th>
		<th>TALLER</th>
		<th>CANTIDAD</th>
		<th>CLIENTE</th>
<?php
	foreach ($produccion as $prod) {
?>
		
		<tr>
			<td><a href="index.php?page=modelo&idProduccion=<?= $prod['idProduccion'];?>"><img id="goIcon" src="img/site/go.ico"></a></td>
			<td><?= $prod['fecha'];?></td>
			<td><?= $prod['nc'];?></td>
			<td><?= $prod['tela'];?></td>
			<td><?= $prod['proveedorTela'];?></td>
			<td><?= $prod['cant'];?></td>
			<td><?= temporada($prod['temporada']);?></td>
		</tr>
		
<?php 
$anioAux = $prod['anio'];
$tempAux = $prod['temporada'];
}

?>
		
	</table>
</section>

<?php
/*
<article>
		<h2><?= $prod['anio'];?></h2>
		<h3><?= temporada($prod['temporada']);?></h3>
		<a href="index.php?page=modelo&idProduccion=<?= $prod['idProduccion'];?>">
			<h4>N/C: <?= $prod['nc']?></h4>
			<h4>CANTIDAD: <?= $prod['cant'];?></h4>
		</a>
	</article>
*/
?>