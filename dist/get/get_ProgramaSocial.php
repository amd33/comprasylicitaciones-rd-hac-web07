<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.programa_social";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_programa"].'>'.$filas["d_programa"].'</option>';
	}
?>