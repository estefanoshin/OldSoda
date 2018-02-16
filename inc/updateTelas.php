<?php
	require 'class/Tela.php';

	$updateTela = new Tela();
	$data_inicial = $updateTela->buscarTelaPorID($_GET['telaID']);

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$errores = ValidarDatos($_POST,'tela');
		if(empty($errores))
	    {
	    	$updateTela->updateTela($_POST);
			irActionProcesos('update','tela');
	    }
	    else
	    {
	    	echo "<script>alert('Verifique los datos ingresados');</script>";
	    	
	    }
	}
?>
<style type="text/css">
	table{text-align: center; display: flex; justify-content: center;}
</style>
<section id="test">
	<h1>TELAS</h1>
<?php
		echo @$errores['nombTela'].'<br>';
    	echo @$errores['proveedTela'];
 ?>

<form action="" method="post">
	<table>
		<tr>
			<th>Nombre Tela</th>
			<th>Proveedor</th>
		</tr>

		<tr align="center">
			<td><input type="placeholder" name="nombTela" value="<?php echo $data_inicial['nombTela'];?>"></td>
			<td><input type="placeholder" name="proveedTela" value="<?php echo $data_inicial['proveedTela'];?>"></td>
			<input type="placeholder" name="telaID" value="<?php echo $_GET['telaID'];?>" hidden>
		</tr>
	</table>

	<input type="submit" name="submit" value="MODIFICAR">
</form>
</section>