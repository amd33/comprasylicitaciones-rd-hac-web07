<?php
include("connecto2.php");
$id = $_REQUEST["nrocontratacion"];
$tipo = $_REQUEST["tipo"];
$ano =date("Y");

$borrarpliego="update licitacion
               set activa = 1, fecha_baja = null
               where id = ".$id." and tipo = ".$tipo;

$db->query($borrarpliego);








?>




