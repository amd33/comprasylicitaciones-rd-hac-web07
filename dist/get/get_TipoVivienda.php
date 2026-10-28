<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.tipo_vivienda";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_vivienda"].'>'.$filas["d_vivienda"].'</option>';
	}
?>