<?php $produccion = busqPorId($_GET['idProduccion']); ?>
<section id="modelo" class="claseModelo">

	<summary>
		<h2><?= "NC: ".$produccion['nc']." - ART: ".$produccion['art']."<br>".strtoupper($produccion['descripcion']);?></h2>
	</summary>

<article>
	<table>
		<tr>
			<td>TEMPORADA: <?= strtoupper($produccion['temporada']);?></td>
			<td>AÑO: <?= $produccion['anio'];?></td>
		</tr>
		
		<tr>
			<td colspan="2">TELA: <?= strtoupper($produccion['tela']);?></td>
		</tr>

		<tr>
			<td colspan="2">STOCK: #STOCK / <?= $produccion['cant'];?></td>
		</tr>

		<tr>
			<td colspan="2">VENTA: </td>
		</tr>
		<tr>
			<td><button onclick="alert('NO FUNCIONO !!');">MODIFICAR</button></td>
			<td><button onclick="alert('NO FUNCIONO !!');">BORRAR</button></td>
		</tr>
	</table>
	<img src="img/<?= buscarImagen($produccion['imagen'])/*.'.jpg'*/;?>">
</article>

</section>