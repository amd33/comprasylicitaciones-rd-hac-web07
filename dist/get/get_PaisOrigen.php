<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.pais_origen";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_pais"].'>'.$filas["d_pais"].'</option>';
	}
?>