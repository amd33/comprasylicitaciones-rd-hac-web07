<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.institucion_entidad";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_entidad"].'>'.$filas["d_entidad"].'</option>';
	}
?>