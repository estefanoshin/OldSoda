<section id="crearClientes">
	<h1>Crear Clientes</h1>

<form id="formCrearCliente" class="needs-validation" novalidate action="" method="post">
	<div>
        <span class="input-group-text">Cliente</span>
		<input type="text" placeholder="Ingrese un Cliente..." class="form-control" name="nombClient" required>
		<div class="invalid-tooltip">Ingrese Cliente</div>
    </div>

	<button class="btn btn-primary" type="submit">Agregar</button>
</form>

</section>
<script>
	var myform = document.getElementById('formCrearCliente');
	var urlActionProcesos = 'action_procesos.php?action=create&tipo=cliente';
</script>
<script src="js/postAjax.js"></script>