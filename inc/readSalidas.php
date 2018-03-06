<?php
	$salida = new Salida();
	$listaSalidas = $salida->readSalida();

	$taller = new Taller();
	$listaTaller = $taller->readTaller();

	$cliente = new Cliente();
	$listaCliente = $cliente->readClient();

	$metodo = new Metodo();
?>
<section id="readSalidas">
	<h1>Salidas 
	<a href="index.php?page=crearSalidas" class="hoverPointer"><img class="icono" src="img/site/add.png" data-toggle="modal" data-target="#exampleModal"></a></h1>
	<table class="table table-striped">
		<thead>
		<tr align="center">
			<th scope="col">ID</th>
			<th scope="col">Fecha Salida</th>
			<th scope="col">Articulo</th>
			<th scope="col">Cantidad de Salida</th>
			<th scope="col">Talles</th>
			<th scope="col">Colores</th>
			<th scope="col" colspan="2">Destino</th>

			<th scope="col" colspan="2">+</th>
		</thead>
		</tr>


<?php 
		foreach ($listaSalidas as $ls) {
?>
		<tr align="center">
			<td><?php echo $ls['salidaID'];?></td>
			<td><?php echo $ls['fechaSalida'];?></td>
			<td><?php echo $salida->mostrarNombreArticulo($ls['articuloID']);?></td>
			<td><?php echo $ls['cantSalida'];?></td>
			<td><?php echo $ls['tallesSalida'];?></td>
			<td><?php echo $ls['colorSalida'];?></td>
			<td><?php echo $ls['destino'];?> : </td>
			<td><?php echo $salida->mostrarNombredestino($ls['destino'],$ls['destinoID']);?></td>

			<td><a href="index.php?page=updateEntradas&salidaID=<?php echo $ls['salidaID'];?>"><img class="icono" src="img/site/update.png"></a></td>
			<td><img class="icono" style="cursor: pointer;" id="<?php echo $ls['salidaID'];?>" onclick="borrar('salidaID','<?php echo $ls['salidaID'];?>','salida')" src="img/site/delete.png"></td>
		</tr>
<?php
		}
?>
	</table>

</section>