<?php
	include("../conect.php");

	$query ='SELECT c_postal 
						FROM recaudaciones:localidades
						WHERE c_provincia = 2
						AND c_partido = 110
						AND c_localidad = '.$_REQUEST["c_localidad"].';';

	foreach ($db1 -> query($query) as $resultadoquery) {
		echo $resultadoquery['C_POSTAL'];
	}
?>