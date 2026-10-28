<?php
include("../conect.php");

	$query = "SELECT DISTINCT(n_cud) FROM desasocial.cud
				WHERE n_dni = ".$_REQUEST['dni'];
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo $filas["n_cud"];
	}
?>