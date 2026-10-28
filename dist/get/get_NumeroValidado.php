<?php
include("../conect.php");

$query ='SELECT count(*)
FROM recaudaciones:calles_alturas
WHERE d_localidad = "'.$_REQUEST["localidad"].'"
AND c_calle = '.$_REQUEST["c_calle"].'
AND '.$_REQUEST["numero"].' BETWEEN c_nro_desde AND c_nro_hasta;';

foreach ($db1 -> query($query) as $resultado) {
	$enrango = $resultado[0];
}

echo $enrango;

// if (($rango >= $desde) && ($rango <= $hasta)) {
// 	echo 1;
// }else{
// 	echo 0;
// }

?>