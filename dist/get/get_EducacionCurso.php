<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.educacion_curso";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_educacion"].'>'.$filas["d_educacion"].'</option>';
	}
?>