<?php
	$produccion = existeModelo();
?>

<section id="page" class="claseInicio">

<?php
	foreach ($produccion as $prod) {
?>
	<article>
		<table>
			<tr>
				<td colspan="2">
			<h3>ART: <?= strtoupper($prod['art']);?><br>
				TELA: <?= strtoupper($prod['tela']);?><br>
				CANTIDAD TOTAL: <?= $prod['cantTot'];?>
			</h3>
				</td>


			</tr>
			<tr>
				<td colspan="2"><img <?= "src=img/".buscarImagen($prod['imagen'])/*.".jpg"*/;?>></td>
			</tr>

			<tr>
				<td><a href="index.php?page=artDescripcion&art=<?= $prod['art'];?>"><button>Descripcion</button></a></td>
				<td><a href="index.php?page=artMovim&art=<?= $prod['art'];?>"><button>Movimientos</button></a></td>
			</tr>
		</table>
	</article>

<?php }?>

</section>