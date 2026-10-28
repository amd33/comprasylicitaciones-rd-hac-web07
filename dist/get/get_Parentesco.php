<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.parentesco";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_parentesco"].'>'.$filas["d_parentesco"].'</option>';
	}
?>