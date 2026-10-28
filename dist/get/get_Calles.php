<?php
	include("../conect.php");

	$query ='SELECT * FROM recaudaciones:calles_alturas
						WHERE d_localidad = "'.$_REQUEST["localidad"].'"';

	foreach ($db1 -> query($query) as $resultadoquery) {
		echo '<option data-codigocalle="'.$resultadoquery['C_CALLE'].'" value="'.trim($resultadoquery['D_CALLE']).'">';
	}
?>