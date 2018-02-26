<?php
	$updateTaller = new Taller();
	$data_inicial = $updateTaller->buscarTallerPorID();
?>

<section id="updateTaller">
	<h1>TELAS</h1>

<form id="formUpdateTaller" class="needs-validation" novalidate action="action_procesos.php?action=update&tipo=taller" method="post">
	<div>
        <span class="input-group-text">Taller</span>
		<input type="text" placeholder="Ingrese un Taller..." class="form-control" name="nombTaller" required value="<?php echo $data_inicial['nombTaller'];?>">
		<div class="invalid-tooltip">Ingrese Taller</div>
    </div>

    	<input type="text" value="<?php echo $data_inicial['tallerID']; ?>" name="tallerID" hidden>

	<button class="btn btn-primary" type="submit">Modificar</button>
</form>

</section>