<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.situacion_conyugal";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_situacion"].'>'.$filas["d_situacion"].'</option>';
	}
?>