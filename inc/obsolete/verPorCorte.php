<?php

	$produccion = obtenerProduccion('inicio');
	if (!empty($produccion)) {
		$anioAux = $produccion[0]['anio'];
		$tempAux = $produccion[0]['temporada'];
	} else{
		$dbVacia = true;
	}
	
?>

<section id="verPorCorte" class="claseInicio">
	<?php if ($dbVacia == true) { echo "<script>document.getElementById('verPorCorte').hidden = true;</script>";}?>
	<summary>
		<h1><?= $anioAux;?></h1>
		<h2><?= temporada($tempAux);?></h2>
	</summary>
<?php
	foreach ($produccion as $prod) {

	if($anioAux == $prod['anio'] && strtoupper($tempAux) == strtoupper($prod['temporada'])){
	}else{
?>
	<summary>
		<h1><?= $prod['anio'];?></h1>
		<h2><?= temporada($prod['temporada']);?></h2>
	</summary>

<?php } ?>

	<article>
		<a href="index.php?page=modelo&idProduccion=<?= $prod['idProduccion'];?>">
			<h3>N/C: <?= $prod['nc']." || ART: ".$prod['art'];?></h3>
			<h4>CANTIDAD: <?= $prod['cant'];?></h4>
			<img /<?= "src=img/".buscarImagen($prod['imagen'])/*.".jpg"*/;?>>
		</a>
	</article>

<?php 
$anioAux = $prod['anio'];
$tempAux = $prod['temporada'];
}

?>

</section>