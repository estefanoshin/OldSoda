<?php
	$updatecliente = new Cliente();
	$data_inicial = $updatecliente->buscarClientePorID();
?>
<section id="updateClientes">
	<h1>Clientes</h1>

<form action="action_procesos.php?action=update&tipo=cliente" method="post" class="needs-validation" novalidate>
	<table class="tableContainer">
		<tr>
			<td>
				<div class="input-group-pretend">
			        <span class="input-group-text">Cliente</span>
					<input type="text" placeholder="Ingrese el cliente..." class="form-control" name="nombClient" required value="<?php echo $data_inicial['nombClient'];?>">
					<div class="invalid-tooltip">Ingrese algun Cliente</div>
			    </div>
			</td>
		</tr>
	</table>


    <input type="placeholder" name="clientID" value="<?php echo $_GET['clientID'];?>" hidden>

    <button class="btn btn-primary" type="submit">Modificar</button>
</form>
</section>