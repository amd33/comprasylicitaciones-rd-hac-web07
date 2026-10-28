<?php

$database = "recaudaciones";
$user = "npiersanti";
$pass = "nicolasjorgepier";
if (!($connect_id = ifx_connect($database,$user,$pass)))
{
   echo "Nose puede conectar a Informix Database\n";

}

?>

