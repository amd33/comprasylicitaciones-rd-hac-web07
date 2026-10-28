<?php
include("../conect.php");

$n_dni = $_REQUEST['dni'];
$query = "SELECT * FROM desasocial.programasocial_persona
			WHERE n_dni = ".$n_dni.";";
$resultado = pg_query($db,$query);

while ($filas=pg_fetch_array($resultado)) {
	$respuesta[] = $filas;
}
echo json_encode($respuesta);
?>