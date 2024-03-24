<?php 

require_once("../../config/conexion.php");
session_destroy();

$obj = new Conectar();

header("location:".$obj->ruta()."/index.php");


?>