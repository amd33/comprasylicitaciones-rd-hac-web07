<?php
include("../conect.php");
        
  $querytramite = "SELECT a.c_tramite, 
                          a.c_dependencia, 
                          a.d_descripcion as descritramite, 
                          b.d_descripcion as descripciondependencia
                   FROM desasocial.tipo_tramite a, 
                        desasocial.dependencias b
                   WHERE a.c_dependencia = ".$_REQUEST['dependencia']."
                   AND  a.c_dependencia = b.c_dependencia";
  $resultado = pg_query($db, $querytramite);
  //busca los codigos de tramite, dependiendo la dependencia

  while($filasquerytramite=pg_fetch_array($resultado)){
    $query_persona = "SELECT a.n_dni,
                             b.d_nombre,
                             b.d_apellido,
                             b.f_fecha_nac,
                             b.c_calle,
                             a.f_fecha,
                             a.n_tramite
                      FROM desasocial.tramite_persona a,
                           desasocial.persona b
                      WHERE c_tramite = ".$filasquerytramite['c_tramite']."
                      AND a.n_dni = b.n_dni";
    $resultadoquery_persona = pg_query($db, $query_persona);

    while($filasresultadoquery_persona=pg_fetch_array($resultadoquery_persona)){
      $n_dni = $filasresultadoquery_persona["n_dni"]; 
      $d_nombre = $filasresultadoquery_persona["d_nombre"]; 
      $d_apellido = $filasresultadoquery_persona["d_apellido"]; 
      $f_fecha_nac = $filasresultadoquery_persona["f_fecha_nac"]; 
      $c_calle = $filasresultadoquery_persona["c_calle"]; 
      $f_fecha = $filasresultadoquery_persona["f_fecha"]; 
      $n_tramite = $filasresultadoquery_persona["n_tramite"]; 
      ///////////////////////////////////////////////////////////////////////////
      $query_datos_adicionales = "SELECT n.d_educacion,
                                         e.d_estado,
                                         o.d_ocupacion,
                                         v.d_vivienda
                                  FROM desasocial.datos_adicionales a,
                                       desasocial.nivel_educativo n,
                                       desasocial.ocupacion o,
                                       desasocial.tipo_vivienda v,
                                       desasocial.estado_educativo e
                                  WHERE n_dni = ".$n_dni."
                                  AND a.c_edu_en_curso = n.c_educacion
                                  AND a.c_edu_alcanz = e.c_estado
                                  AND a.c_ocupacion = o.c_ocupacion
                                  AND a.c_vivienda = v.c_vivienda;";
      $resultadoquery_datos_adicionales = pg_query($db, $query_datos_adicionales);

      while ($filasresultadoquery_persona=pg_fetch_array($resultadoquery_datos_adicionales)) {
        $nivel_educativo_full = $filasresultadoquery_persona["d_educacion"]." ".$filasresultadoquery_persona["d_estado"];
        $d_ocupacion = $filasresultadoquery_persona["d_ocupacion"];
        $d_vivienda = $filasresultadoquery_persona["d_vivienda"];
      }
      ///////////////////////////////////////////////////////////////////////////
      $query_localidad = "SELECT d_localidad
                          FROM recaudaciones:calles_alturas
                          WHERE c_calle = ".$c_calle.";";
      
      foreach ($db1 -> query($query_localidad) as $filas_localidad) {
        $d_localidad = $filas_localidad["D_LOCALIDAD"];
      }
      ///////////////////////////////////////////////////////////////////////////
      // $query_programa_social = "SELECT d_programa
      //                           FROM desasocial.programasocial_persona a, 
      //                                desasocial.programa_social b
      //                           WHERE a.c_programa = b.c_programa
      //                           AND n_dni = ".$n_dni.";";
      // $resultadoquery_programa_social = pg_query($db, $query_programa_social);

      // while ($filasresultadoquery_programa_social=pg_fetch_array($resultadoquery_programa_social)) {
      //   $d_programa_social .= $filasresultadoquery_programa_social["d_programa"].chr(1);
      // }
      ///////////////////////////////////////////////////////////////////////////
      echo '<tr>
              <td class="text-center">'.$d_nombre.'</td>
              <td class="text-center">'.$d_apellido.'</td>
              <td class="text-center">'.$n_dni.'</td>
              <td class="text-center">'.$f_fecha_nac.'</td>
              <td class="text-center">'.$d_localidad.'</td>
              <td class="text-center">'.$nivel_educativo_full.'</td>
              <td class="text-center">'.$d_ocupacion.'</td>
              <th class="text-center">'.$d_programa_social.'</th>
              <td class="text-center">'.$d_vivienda.'</td>
              <td class="text-center">'.$f_fecha.'</td>
              <td class="text-center">'.$filasquerytramite['descritramite'].'</td>
            </tr>';
    }
  }

?>
