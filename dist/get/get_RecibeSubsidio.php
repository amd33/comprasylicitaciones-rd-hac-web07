<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.recibe_subsidio";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_subsidio"].'>'.$filas["d_subsidio"].'</option>';
	}
?>