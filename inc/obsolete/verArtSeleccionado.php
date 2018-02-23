<?php
	$articulo = new Articulo();
	$listaArt = $articulo->buscarArtPorID();
?>
<section id="verArtSeleccionado">
	<article>
		<figure>
			<img src="img/site/noImage.jpg">
		</figure>

		<table>
			<tr>
				<th>Numero de Corte</th>
				<th>Cantidad</th>
				<th>Talles</th>
				<th>Colores</th>
			</tr>
		</table>
	</article>
</section>