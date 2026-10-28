<?php
	include("../conect.php");

	$query ='SELECT * FROM recaudaciones:localidades
				WHERE c_provincia = 2
				AND c_partido = 110;';

	foreach ($db1 -> query($query) as $resultadoquery) {
		echo '<option value="'.$resultadoquery['C_LOCALIDAD'].'">'.trim($resultadoquery['D_LOCALIDAD']).'</option>';
	}
?>