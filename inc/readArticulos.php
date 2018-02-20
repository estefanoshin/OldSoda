<?php
	$art = new Articulo();
	$listaArt = $art->readArt();
?>
<style type="text/css">
	table{text-align: center; display: flex; justify-content: center;}
	img{width: 25px;}
</style>
<section id="rearArt">
	<h1>ARTICULOS <a href="index.php?page=crearArt"><img src="img/site/add.png"></a></h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Nombre ART</th>
			<th>Cantidad</th>
			<th>Descripcion</th>
			<th>Talles</th>
			<th>Colores</th>
			<th>Imagen</th>
			<th colspan="2">+</th>
		</tr>


<?php 
		foreach ($listaArt as $t) {
?>
		<tr align="center">
			<td><?php echo $t['artID'];?></td>
			<td><?php echo $t['art'];?></td>
			<td><?php echo $t['cant'];?></td>
			<td><?php echo $t['descrip'];?></td>
			<td><?php echo $t['nombTalle'];?></td>
			<td><?php echo $t['nombColor'];?></td>
			<td><?php echo $t['img'];?></td>

			<td><a href="index.php?page=updateArt&artID=<?php echo $t['artID'];?>"><img src="img/site/update.png"></a></td>
			<td><img style="cursor: pointer;" id="<?php echo $t['artID'];?>" onclick="borrar('artID','<?php echo $t['artID'];?>','articulo')" src="img/site/delete.png"></td>
		</tr>
<?php
		}
?>
	</table>

<script src="js/script.js"></script>
</section>