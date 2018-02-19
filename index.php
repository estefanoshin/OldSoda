<?php
require 'inc/globals.php';

require 'class/Conexion.php';
require 'class/Metodos.php';

$section = obtenerSeccion();

require 'inc/header.php';
require 'inc/'.$section.'.php';
require 'inc/footer.php';