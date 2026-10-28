<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.ocupacion";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_ocupacion"].'>'.$filas["d_ocupacion"].'</option>';
	}
?>