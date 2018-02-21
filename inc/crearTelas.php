<section id="crearTela">
	<h1>TELAS</h1>

<form class="needs-validation" novalidate action="action_procesos.php?action=create&tipo=tela" method="post">
	<div>
        <span class="input-group-text">Tela</span>
		<input type="text" placeholder="Ingrese la Tela..." class="form-control" name="nombTela" required>
		<div class="invalid-tooltip">Ingrese alguna Tela</div>
    </div>

	<div>
        <span class="input-group-text">Proveedor de Tela</span>
		<input type="text" placeholder="Ingrese un Proveedor..." class="form-control" name="proveedTela" required>
        <div class="invalid-tooltip">Ingrese algun Proveedor</div>
    </div>

	<button class="btn btn-primary" type="submit">Agregar</button>
</form>
</section>