<?php
	$entrada = new Entrada();
	$listaEntradas = $entrada->readEntrada();

	$taller = new Taller();
	$listaTaller = $taller->readTaller();

	$cliente = new Cliente();
	$listaCliente = $cliente->readClient();

	$metodo = new Metodo();
?>
<section id="readEntrada">
	<h1>Entradas 
	<a href="index.php?page=crearEntradas" class="hoverPointer"><img class="icono" src="img/site/add.png" data-toggle="modal" data-target="#exampleModal"></a></h1>
	<table class="table table-striped">
		<thead>
		<tr align="center">
			<th scope="col">ID</th>
			<th scope="col">Fecha Entrada</th>
			<th scope="col">Articulo</th>
			<th scope="col">Cantidad de entrada</th>
			<th scope="col">Talles</th>
			<th scope="col">Colores</th>
			<th scope="col" colspan="2">Entregado de: </th>

			<th scope="col" colspan="2">+</th>
		</thead>
		</tr>


<?php 
		foreach ($listaEntradas as $le) {
?>
		<tr align="center">
			<td><?php echo $le['entradaID'];?></td>
			<td><?php echo $le['fechaEntrada'];?></td>
			<td><?php echo $entrada->mostrarNombreArticulo($le['articuloID']);?></td>
			<td><?php echo $le['cantEntrada'];?></td>
			<td><?php echo $le['tallesEntrada'];?></td>
			<td><?php echo $le['colorEntrada'];?></td>
			<td><?php echo $le['origen'];?> : </td>
			<td><?php echo $le['origenName'];?></td>

			<td><a href="index.php?page=updateEntradas&entradaID=<?php echo $le['entradaID'];?>"><img class="icono" src="img/site/update.png"></a></td>
			<td><img class="icono" style="cursor: pointer;" id="<?php echo $le['entradaID'];?>" onclick="borrar('entradaID','<?php echo $le['entradaID'];?>','entrada')" src="img/site/delete.png"></td>
		</tr>
<?php
		}
?>
	</table>

</section>