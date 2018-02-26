<?php
	$updateTela = new Tela();
	$data_inicial = $updateTela->buscarTelaPorID();
?>
<section id="updateTelas">
	<h1>TELAS</h1>

<form action="action_procesos.php?action=update&tipo=tela" method="post" class="needs-validation" novalidate>
	<table class="tableContainer">
		<tr>
			<td>
				<div class="input-group-pretend">
			        <span class="input-group-text">Tela</span>
					<input type="text" placeholder="Ingrese la Tela..." class="form-control" name="nombTela" required value="<?php echo $data_inicial['nombTela'];?>">
					<div class="invalid-tooltip">Ingrese alguna Tela</div>
			    </div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="input-group-pretend">
			        <span class="input-group-text">Proveedor de Tela</span>
					<input type="text" placeholder="Ingrese un Proveedor..." class="form-control" name="proveedTela" required value="<?php echo $data_inicial['proveedTela'];?>">
			        <div class="invalid-tooltip">Ingrese algun Proveedor</div>
			    </div>
			</td>
		</tr>
	</table>


    <input type="placeholder" name="telaID" value="<?php echo $_GET['telaID'];?>" hidden>

    <button class="btn btn-primary" type="submit">Modificar</button>
</form>
</section>