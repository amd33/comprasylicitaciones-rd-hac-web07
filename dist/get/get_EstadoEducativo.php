<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.estado_educativo";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_estado"].'>'.$filas["d_estado"].'</option>';
	}
?>