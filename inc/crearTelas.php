<section id="crearTela">
	<h1>TELAS</h1>

<form id="formCrearTela" class="needs-validation" novalidate action="#" method="post">
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

<script src="js/postAjax.js"></script>
</section>