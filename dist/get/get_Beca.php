<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.recibe_beca";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_beca"].'>'.$filas["d_beca"].'</option>';
	}
?>