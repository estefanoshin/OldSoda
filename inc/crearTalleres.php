<section id="crearTaller">
	<h1>Taller</h1>

<form id="formCrearTaller" class="needs-validation" novalidate action="" method="post">
	<div>
        <span class="input-group-text">Taller</span>
		<input type="text" placeholder="Ingrese un Taller..." class="form-control" name="nombTaller" required>
		<div class="invalid-tooltip">Ingrese Taller</div>
    </div>

	<button class="btn btn-primary" type="submit">Agregar</button>
</form>

<script>
	var myform = document.getElementById('formCrearTaller');
	var urlActionProcesos = 'action_procesos.php?action=create&tipo=taller';
</script>
<script src="js/postAjax.js"></script>
</section>