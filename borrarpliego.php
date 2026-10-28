<?php
include("connecto2.php");
$id = $_REQUEST["nrocontratacion"];
$tipo = $_REQUEST["tipo"];
$ano =$_REQUEST["ano"];

$borrarpliego="update licitacion
               set activa = 0, fecha_baja = TODAY
               where id = ".$id." and tipo = ".$tipo." and ano = ".$ano;

$db->query($borrarpliego);








?>




