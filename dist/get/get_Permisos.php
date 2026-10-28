<?php
include("../conect.php");

$n_legajo = $_REQUEST['usuario'];


	$query = "SELECT * FROM desasocial.permisos
			  WHERE c_permiso NOT IN 
			  (SELECT c_permiso
				 FROM desasocial.usuarios_permisos
				 WHERE n_legajo = ".$n_legajo.");";

	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_permiso"].'>'.$filas["d_permiso"].'</option>';
	}
?>