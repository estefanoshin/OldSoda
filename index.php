<?php
require 'config/config.php';
// require 'inc/globals.php';

// require 'class/Conexion.php';

$metodo = new Metodo();
$section = $metodo->obtenerSeccion();

require 'inc/header.php';
require 'inc/'.$section.'.php';
require 'inc/footer.php';