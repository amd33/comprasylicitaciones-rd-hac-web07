<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.tipo_tramite
				WHERE c_dependencia = ".$_REQUEST['c_dependencia'];
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_tramite"].'>'.$filas["d_descripcion"].'</option>';
	}
?>