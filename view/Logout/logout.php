<?php 

echo "<h1>MARIA TE AMA</h1>";
require_once("../../config/conexion.php");
session_destroy();

$obj = new Conectar();

header("location:".$obj->ruta()."/index.php");


?>