<?php
include('../conect.php');
$dni_denunciante = $_REQUEST['dni_denunciante'];

$querypersona = "SELECT d_nombre,
						d_apellido,
						f_fecha_nac,
						n_cuit,
						d_telefono,
						d_mail,
						c_localidad,
						c_calle,
						n_numero,
						d_piso,
						d_dpto
				FROM desasocial.persona
				WHERE n_dni = ".$dni_denunciante."";

$resultado = pg_query($db,$querypersona);

while ($filas=pg_fetch_row($resultado)) {
	for ($i=0; $i < count($filas); $i++) { 
		echo $filas[$i].",";
	}
};


?>