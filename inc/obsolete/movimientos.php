<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$errores = ValidarDatosProducto($_POST);
	$data_inicial = $_POST;

	if(empty($errores))
	{
		// $exitoOperacion =  crearMov($_POST); //CREAR FUNCION
		echo "<script>alert('Movimiento ingresado!!')</script>";
		$data_inicial='';
	} else{
		$data_inicial = $_POST;
		echo "<script>alert('Verifique sus datos');</script>";

	}
}
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
?>
<section id="movimientos" class="claseNuevoCorte">
	<span>
			<ul>
				<li class="error_dato"><?= @ $errores['fecha'];?></li>
				<li class="error_dato"><?= @ $errores['movimiento'];?></li>
				<li class="error_dato"><?= @ $errores['cant'];?></li>
				<li class="error_dato"><?= @ $errores['nc'];?></li>
				<li class="error_dato"><?= @ $errores['art'];?></li>
				<li class="error_dato"><?= @ $errores['taller'];?></li>
				<li class="error_dato"><?= @ $errores['talles'];?></li>
				<li class="error_dato"><?= @ $errores['colores'];?></li>
				<li class="error_dato"><?= @ $errores['adjImg'];?></li>
			</ul>
		</span>
	<form action="" method="post" enctype="multipart/form-data">
		<summary>
			<h1>Nuevo Corte</h1>
		</summary>

		<table style="text-align: center;">
			<tr>
				<td><h3>FECHA:</h3><input type="date" name="fecha" value="<?= @ $data_inicial['fecha'];?>">
				</td><!-- DB_FECHA -->
				<input id="anio" type="placeholder" hidden="" name="anio">
				<td>
					<h3>MOVIMIENTO:</h3>
					<ul>
						<li><input id="entrada" type="radio" name="mov" value="entrada" <?php @ isChecked($data_inicial['movimiento'],'entrada');?>><label for="entrada">ENTRADA</label></li>
						<li><input id="salida" type="radio" name="mov" value="salida" <?php @ isChecked($data_inicial['movimiento'],'salida');?>><label for="salida">SALIDA</label></li>
						<input id="movimiento" type="placeholder" name="movimiento" value="<?= @ $data_inicial['movimiento'];?>" hidden>
					</ul>
				</td>
				<td>CANTIDAD: <input type="placeholder" name="cant" value="<?= @ $data_inicial['cant'];?>"></td>
			</tr>

			<tr>
				<td>NC: <input type="text" name="nc" value="<?= @ $data_inicial['nc'];?>"></td>

				<td>ART: <input type="text" name="art" value="<?= @ $data_inicial['art'];?>"></td>

				
			</tr>

			<tr>
				<td>TALLER: <input type="text" name="taller" value="<?= @ $data_inicial['taller'];?>"></td>

				<td>DESTINO: <input type="text" name="destino" value="<?= @ $data_inicial['destino'];?>"></td>
			</tr>

			<tr>
				<td id="talles">TALLES: 

						<input id="1" type="checkbox" name="1" value="1" <?php @ checkTalles($data_inicial['1']);?>><label for="1">1</label>
						<input id="2" type="checkbox" name="2" value="2" <?php @ checkTalles($data_inicial['2']);?>><label for="2">2</label>
						<input id="3" type="checkbox" name="3" value="3" <?php @ checkTalles($data_inicial['3']);?>><label for="3">3</label>
						<input id="4" type="checkbox" name="4" value="4" <?php @ checkTalles($data_inicial['4']);?>><label for="4">4</label>
						<input id="5" type="checkbox" name="5" value="5" <?php @ checkTalles($data_inicial['5']);?>><label for="5">5</label>
						<br>

						<input id="S" type="checkbox" name="6" value="S" <?php @ checkTalles($data_inicial['6']);?>><label for="S">S</label>
						<input id="M" type="checkbox" name="7" value="M" <?php @ checkTalles($data_inicial['7']);?>><label for="M">M</label>
						<input id="L" type="checkbox" name="8" value="L" <?php @ checkTalles($data_inicial['8']);?>><label for="L">L</label>
						<input id="XL" type="checkbox" name="9" value="XL"><label for="XL" <?php @ checkTalles($data_inicial['9']);?>>XL</label>
						<br>


						<input id="unico" type="checkbox" name="10" value="unico" <?php @ checkTalles($data_inicial['10']);?>><label for="unico">UNICO</label>

					<input id="listaTalles" type="placeholder" hidden="" name="talles" value="<?= @ $data_inicial['talles'];?>">
				</td>

				<td>
					<h3>COLORES</h3>
					<ul>
						<li><input id="cVarios" type="radio" name="palette" value="cVarios"><label for="palette">VARIOS</label></li>
						<li><input id="eColorList" type="radio" name="palette" value="eColorList"><label for="palette">ESCRIBIR LISTA</label></li>
						<li><input id="cPalette" type="radio" name="palette" value="cPalette"><label for="palette">PALETA DE COLORES(BETA TEST)</label></li>
					</ul>
				</td>

				<td>
					<div id="optionPalette" hidden="true">
						<button id="agregarColor" class="jscolor{valueElement:'valueSpan',styleElement:'styleSpan',value:'ff6699'}">
					    ELEGIR NUEVO COLOR </button>

						<span id="valueSpan" hidden=""></span>
						<button id="nuevaCelda" type="button">AGREGAR COLOR</button><br>
						<!-- VISTA PREVIA: <span id="styleSpan" hidden="true">COLOR</span> -->
						<button id="borrarTodo" type="button">BORRAR TODO</button>
					</div>
					<div id="optionColorList" hidden="true"><h4>ESCRIBIR LISTA DE COLORES:</h4> <input id="listaColores" type="placeholder" name="colores" value="<?= @ $data_inicial['colores'];?>"></div><!-- COLORES PARA DB -->

				</td>
			</tr>
				
			<tr>
				<td id="tablaColores" colspan="4"></td>
			</tr>

			<tr>
				<td></td>
				<td></td>
				<td><input id="nuevoCorte" type="submit" name="agregar" value="AGREGAR_CORTE"></td>
			</tr>
		</table>	
	</form>

<?php @ checkColorData($data_inicial['palette']);?>
<script src="inc/jscolor.js"></script>
<script src="inc/miScript.js"></script>
<script src="inc/movScript.js"></script>
</section>