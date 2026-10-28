<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.dependencias
				WHERE c_dependencia != 4
				ORDER BY c_dependencia";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_dependencia"].'>'.$filas["d_descripcion"].'</option>';
	}
?>