<?php
include("../conect.php");

	$query = "SELECT * FROM desasocial.parentesco_ninez";
	$resultado = pg_query($db,$query);

	while ($filas=pg_fetch_array($resultado)) {
		echo '<option value='.$filas["c_parentesco_denunciante"].'>'.$filas["d_parentesco_denunciante"].'</option>';
	}
?>