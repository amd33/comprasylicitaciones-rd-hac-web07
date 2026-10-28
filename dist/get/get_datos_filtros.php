<?php 
include("../conect.php");
$triggered = false;
$triggered = $_REQUEST['triggered'];

if ($triggered) {
	$query_persona = "SELECT p.d_nombre, p.d_apellido, p.n_dni, p.f_fecha_nac, p.c_localidad, n.d_educacion, e.d_estado,
o.d_ocupacion, tv.d_vivienda, 
--ps.d_programa,
t.f_fecha, tt.d_descripcion as d_tramite,
dp.d_descripcion as d_dependencia 
FROM desasocial.persona p, desasocial.datos_adicionales d, desasocial.tramite_persona t, 
--desasocial.programasocial_persona pp,
--desasocial.programa_social ps,
desasocial.ocupacion o, desasocial.nivel_educativo n, desasocial.estado_educativo e, 
desasocial.tipo_vivienda tv, desasocial.tipo_tramite tt, desasocial.dependencias dp
WHERE p.n_dni = d.n_dni
AND p.n_dni = t.n_dni
--AND pp.n_dni = p.n_dni
--AND pp.c_programa = ps.c_programa
AND d.c_edu_en_curso = n.c_educacion
AND d.c_edu_alcanz = e.c_estado
AND o.c_ocupacion = d.c_ocupacion
AND tv.c_vivienda = d.c_vivienda
AND t.c_tramite = tt.c_tramite
AND tt.c_dependencia = dp.c_dependencia";

	if ($_REQUEST['nombre'] != "" || $_REQUEST['apellido'] != "") {
		$query_persona .= " AND p.d_nombre LIKE '%".$_REQUEST['nombre']."%' AND p.d_apellido LIKE '%".$_REQUEST['apellido']."%'";
	}

	if ($_REQUEST['dni'] != "") {
		$query_persona .= " AND (TRIM(SUBSTRING(TO_CHAR(p.n_dni,'99999999'),1,LENGTH('".$_REQUEST['dni']."')+1)) = '".$_REQUEST['dni']."' OR TRIM(SUBSTRING(TO_CHAR(p.n_dni,'9999999'),1,LENGTH('".$_REQUEST['dni']."')+1)) = '".$_REQUEST['dni']."')";
	}

	if ($_REQUEST['fechanacimientodesde'] != "" && $_REQUEST['fechanacimientohasta'] != "") {
		$query_persona .= " AND p.f_fecha_nac BETWEEN '".$_REQUEST['fechanacimientodesde']."' AND '".$_REQUEST['fechanacimientohasta']."'";
	}

	if ($_REQUEST['localidad'] > -1) {
		$query_persona .= " AND p.c_localidad = ".$_REQUEST['localidad'];
	}

	if ($_REQUEST['educacioncurso'] > -1 && $_REQUEST['educacionalcanz'] > -1) {
		$query_persona .= " AND d.c_edu_en_curso = ".$_REQUEST['educacioncurso']." AND d.c_edu_alcanz = ".$_REQUEST['educacionalcanz'];
	}

	if ($_REQUEST['ocupacion'] > -1) {
		$query_persona .= " AND d.c_ocupacion = ".$_REQUEST['ocupacion'];
	}

	if ($_REQUEST['vivienda'] > -1) {
		$query_persona .= " AND d.c_vivienda = ".$_REQUEST['vivienda'];
	}

	if ($_REQUEST['dependencia'] > -1) {
		$query_persona .= " AND dp.c_dependencia = ".$_REQUEST['dependencia'];
		if ($_REQUEST['tipotramite'] > -1) {
			$query_persona .= " AND tt.c_tramite = ".$_REQUEST['tipotramite'];
		}
	}

	$resultado_persona = pg_query($db, $query_persona);
	$affected_persona = pg_affected_rows($resultado_persona);
	if ($affected_persona>0) {
		while($filas_persona=pg_fetch_array($resultado_persona)){
			$query_localidad = "SELECT d_localidad FROM recaudaciones:localidades WHERE c_provincia = 2 AND c_partido = 110 AND c_localidad = ".$filas_persona['c_localidad'];
			foreach ($db1 -> query($query_localidad) as $resultadoquery) {
				$d_localidad = $resultadoquery['D_LOCALIDAD'];
			}

			$edad = date("Y-m-d") - $filas_persona['f_fecha_nac'];

			// $d_programa = "";
			// $programa_social = "SELECT ps.d_programa as programa 
			// 					FROM desasocial.programa_social ps, desasocial.programasocial_persona psp
			// 					WHERE ps.c_programa = psp.c_programa
			// 					AND psp.n_dni = ".$filas_persona['n_dni'];

			// if ($_REQUEST['programa']>-1) {
			// 	$programa_social .= " AND ps.c_programa = ".$_REQUEST['programa'];
			// }

			// $resultado_programa = pg_query($db, $programa_social);
			// while($filas_programa=pg_fetch_array($resultado_programa)){
			// 	$d_programa .= $filas_programa['programa']." - ";
			// }

			###########################################################################################
			
			$array_seleccionado = $_REQUEST['programa'];
			$d_programa = "";
			$query_programa = "SELECT ps.c_programa as codigo_programa, 
									  ps.d_programa as programa 
								FROM desasocial.programa_social ps, desasocial.programasocial_persona psp
								WHERE ps.c_programa = psp.c_programa
								AND psp.n_dni = ".$filas_persona['n_dni'].";";

			$resultado_programa = pg_query($db, $query_programa);
			if (count($array_seleccionado)>0) {
				$array_codigos = [];
				$array_descripciones = [];
				while($filas_programa=pg_fetch_array($resultado_programa)){
					array_push($array_codigos, $filas_programa['codigo_programa']);
					array_push($array_descripciones, $filas_programa['programa']);
				}

				$array_intersect = array_intersect($array_codigos, $array_seleccionado);
				if ($array_intersect === $array_seleccionado) {
					for ($i=0; $i < count($array_descripciones); $i++) {
						$d_programa .= $array_descripciones[$i]." - ";
					}
				}
				
			}elseif(count($array_seleccionado)==0){
				while($filas_programa=pg_fetch_array($resultado_programa)){
					$d_programa .= $filas_programa['programa']." - ";
				}
			}

			echo '<tr>
              <td class="text-center">'.$filas_persona['d_nombre'].'</td>
              <td class="text-center">'.$filas_persona['d_apellido'].'</td>
              <td class="text-center">'.$filas_persona['n_dni'].'</td>
              <td class="text-center">'.$edad.'</td>
              <td class="text-center">'.trim($d_localidad).'</td>
              <td class="text-center">'.$filas_persona['d_educacion'].' '.$filas_persona['d_estado'].'</td>
              <td class="text-center">'.$filas_persona['d_ocupacion'].'</td>
              <td class="text-center">'.$d_programa.'</td>
              <td class="text-center">'.$filas_persona['d_vivienda'].'</td>
              <td class="text-center">'.$filas_persona['f_fecha'].'</td>
              <td class="text-center">'.$filas_persona['d_tramite'].'</td>
              <td class="text-center">'.$filas_persona['d_dependencia'].'</td>
            </tr>';
		}
	}
}
?>