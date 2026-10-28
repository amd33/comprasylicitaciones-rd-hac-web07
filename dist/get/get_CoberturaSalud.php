<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.cobertura_salud";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_cobertura"].'>'.$filas["d_cobertura"].'</option>';
	}
?>