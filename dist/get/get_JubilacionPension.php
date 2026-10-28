<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.jubilacion_pension";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_jubilacion"].'>'.$filas["d_jubilacion"].'</option>';
	}
?>