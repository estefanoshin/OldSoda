<?php
	$tela = new Tela();
	$listaTelas = $tela->readTela();
?>
<section id="readTela">
	<h1>TELAS <a href="index.php?page=crearTelas"><img class="icono" src="img/site/add.png"></a></h1>
	<table class="centerTable">
		<tr>
			<th>ID</th>
			<th>Nombre Tela</th>
			<th>Proveedor</th>
			<th colspan="2">+</th>
		</tr>


<?php 
		foreach ($listaTelas as $t) {
?>
		<tr align="center">
			<td><?php echo $t['telaID'];?></td>
			<td><?php echo $t['nombTela'];?></td>
			<td><?php echo $t['proveedTela'];?></td>
			<td><a href="index.php?page=updateTelas&telaID=<?php echo $t['telaID'];?>"><img class="icono" src="img/site/update.png"></a></td>
			<td><img class="icono" style="cursor: pointer;" id="<?php echo $t['telaID'];?>" onclick="borrar('telaID','<?php echo $t['telaID'];?>','tela')" src="img/site/delete.png"></td>
		</tr>
<?php
		}
?>
	</table>

<script src="js/script.js"></script>
</section>