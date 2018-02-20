<?php
// require 'inc/const.php';
session_start();

function autoCarga($clase)
{
	require_once 'class/'.$clase.'.php';
}

spl_autoload_register('autoCarga');