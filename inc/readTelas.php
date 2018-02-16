<?php
	require 'class/Tela.php';
	$tela = new Tela();
	$listaTelas = $tela->readTela();
?>
<style type="text/css">
	table{text-align: center; display: flex; justify-content: center;}
	img{width: 25px;}
</style>
<section id="readTela">
	<h1>TELAS <a href="index.php?page=CrearTelas"><img src="img/site/add.png"></a></h1>
	<table>
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
			<td><a href="index.php?page=UpdateTelas&telaID=<?php echo $t['telaID'];?>"><img src="img/site/update.png"></a></td>
			<td><img style="cursor: pointer;" id="<?php echo $t['telaID'];?>" onclick="borrar('telaID','<?php echo $t['telaID'];?>','tela')" src="img/site/delete.png"></td>
		</tr>
<?php
		}
?>
	</table>

<br><br>
<div>
	<h3>___________________________________</h3>

	<h4>Select listado de telas</h4>
	<select name="selectListadoTelas">
<?php 
			foreach ($listaTelas as $t) {
?>
	<option value="<?php echo $t['nombTela'];?>"><?php echo $t['nombTela'];?></option>
<?php }?>
	</select>
</div>

<script src="js/script.js"></script>
</section>