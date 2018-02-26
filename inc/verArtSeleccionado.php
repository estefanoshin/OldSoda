<?php
	$articulo = new Articulo();
	$listaArt = $articulo->buscarArtPorID();
?>
<section id="verArtSeleccionado">
	<article>
		<figure>
			<img src="img/site/noImage.jpg">
		</figure>

	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">Numero de Corte</th>
				<th scope="col">Cantidad</th>
				<th scope="col">Talles</th>
				<th scope="col">Colores</th>
			</tr>
		</thead>


		</table>
	</article>
</section>