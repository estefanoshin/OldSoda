<?php
	require 'class/Movimiento.php';
	$mov = new Movimiento();
	$listaMov = $mov->readMov();
?>
<style type="text/css">
	table{text-align: center; display: flex; justify-content: center;}
	img{width: 25px;}
</style>
<section id="readMov">
	<h1>Movimientos <a href="index.php?page=crearMov"><img src="img/site/add.png"></a></h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Fecha Movimiento</th>
			<th>Tipo de Movimiento</th>
			<th>Cantidad de movimiento</th>
			<th>Talles</th>
			<th>Colores</th>
			<th>Taller</th>
			<th>Cliente</th>
			<th colspan="2">+</th>
		</tr>


<?php 
		foreach ($listaMov as $t) {
?>
		<tr align="center">
			<td><?php echo $t['movID'];?></td>
			<td><?php echo $t['fechaMov'];?></td>
			<td><?php echo $t['tipoMov'];?></td>
			<td><?php echo $t['cantMov'];?></td>
			<td><?php echo $t['tallesMov'];?></td>
			<td><?php echo $t['nombColor'];?></td>
			<td><?php echo $t['tallerID'];?></td>
			<td><?php echo $t['clientID'];?></td>

			<td><a href="index.php?page=updateMov&movID=<?php echo $t['movID'];?>"><img src="img/site/update.png"></a></td>
			<td><img style="cursor: pointer;" id="<?php echo $t['movID'];?>" onclick="borrar('movID','<?php echo $t['movID'];?>','movimiento')" src="img/site/delete.png"></td>
		</tr>
<?php
		}
?>
	</table>

<script src="js/script.js"></script>
</section>