<?php
include('../conect.php');
$dni = $_REQUEST['dni'];

$querypersona = "SELECT a.d_nombre,
						a.d_apellido,
						a.f_fecha_nac,
						a.n_cuit,
						a.d_telefono,
						a.d_mail,
						a.c_localidad,
						a.c_calle,
						a.n_numero,
						a.d_piso,
						a.d_dpto,
						b.c_vivienda,
						b.c_pais,
						b.c_situacion,
						b.d_hijos,
						b.c_parentesco,
						b.c_edu_en_curso,
						b.c_edu_alcanz,
						b.c_ocupacion,
						b.c_cobertura,
						b.c_subsidio,
						b.c_jubilacion,
						b.c_programa,
						b.c_beca,
						b.d_observacion,
						b.c_entidad
				FROM desasocial.persona a, desasocial.datos_adicionales b
				WHERE a.n_dni = b.n_dni
				AND a.n_dni = ".$dni.";";

$resultado = pg_query($db,$querypersona);

while ($filas=pg_fetch_row($resultado)) {
	// $d_nombre = $filas['d_nombre'];
	// $d_apellido = $filas['d_apellido'];
	// $f_fecha_nac = $filas['f_fecha_nac'];
	// $n_cuit = $filas['n_cuit'];
	// $d_telefono = $filas['d_telefono'];
	// $d_mail = $filas['d_mail'];
	// $c_localidad = $filas['c_localidad'];
	// $c_calle = $filas['c_calle'];
	// $n_numero = $filas['n_numero'];
	// $d_piso = $filas['d_piso'];
	// $d_dpto = $filas['d_dpto'];
	// $c_vivienda = $filas['c_vivienda'];
	// $c_pais = $filas['c_pais'];
	// $c_situacion = $filas['c_situacion'];
	// $d_hijos = $filas['d_hijos'];
	// $c_parentesco = $filas['c_parentesco'];
	// $c_edu_en_curso = $filas['c_edu_en_curso'];
	// $c_edu_alcanz = $filas['c_edu_alcanz'];
	// $c_ocupacion = $filas['c_ocupacion'];
	// $c_cobertura = $filas['c_cobertura'];
	// $c_subsidio = $filas['c_subsidio'];
	// $c_jubilacion = $filas['c_jubilacion'];
	// $c_programa = $filas['c_programa'];
	// $c_beca = $filas['c_beca'];
	// $d_observacion = $filas['d_observacion'];
	// $c_entidad = $filas['c_entidad'];

	for ($i=0; $i < count($filas); $i++) { 
		echo $filas[$i].",";
	}
};


?>