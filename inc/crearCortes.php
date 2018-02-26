<section id="crearCortes">
	<form id="formCrearCorte" class="needs-validation" novalidate action="" method="post">
	<div>
        <span class="input-group-text">Numero de Corte</span>
		<input type="text" placeholder="Ingrese un Numero de Corte..." class="form-control" name="nc" required>
		<div class="invalid-tooltip">Numero de Corte</div>
    </div>

	<button class="btn btn-primary" type="submit">Agregar</button>
</form>
</section>

<script>
	var myform = document.getElementById('formCrearCorte');
	var urlActionProcesos = 'action_procesos.php?action=create&tipo=corte';
</script>
<script src="js/postAjax.js"></script>