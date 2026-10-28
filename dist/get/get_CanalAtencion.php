<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.canal_atencion";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_canal"].'>'.$filas["d_canal"].'</option>';
	}
?>