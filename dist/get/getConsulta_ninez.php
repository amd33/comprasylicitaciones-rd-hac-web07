<?php

include("../conect.php");

          $querydni = "SELECT a.*,b.c_tramite, b.n_tramite, b.f_fecha, c.d_descripcion, d.*,e.*,f.*,g.*,h.*,
                      i.*, j.*,l.*,m.*,n.*
                  FROM desasocial.ninez a, desasocial.tramite_persona b, desasocial.tipo_tramite c, desasocial.tipo_vivienda
                   d, desasocial.pais_origen e, desasocial.situacion_conyugal f, desasocial.nivel_educativo g,
                   desasocial.estado_educativo h, desasocial.ocupacion i, desasocial.cobertura_salud j, desasocial.recibe_subsidio k, desasocial.jubilacion_pension l, desasocial.programa_social m,
                    desasocial.recibe_beca n
                  WHERE a.n_dni_menor = ".$_REQUEST['dni']."
                  AND a.n_dni_denunciante = b.n_dni
                  AND a.n_tramite = b.n_tramite
                  AND   b.c_tramite = c.c_tramite
                  AND a.c_vivienda = d.c_vivienda
                  AND a.c_pais = e.c_pais
                  AND a.c_situacion = f.c_situacion
                  AND a.c_edu_en_curso = g.c_educacion
                  AND a.c_edu_alcanz = h.c_estado
                  AND a.c_ocupacion = i.c_ocupacion
                  AND a.c_cobertura = j.c_cobertura
                  AND a.c_subsidio = k.c_subsidio
                  AND a.c_jubilacion = l.c_jubilacion
                  AND a.c_programa = m.c_programa
                  AND a.c_beca = n.c_beca;";
      
      // $resultado = pg_query($db, $querydni);
        
                     
        $resultadoquery_dni = pg_query($db, $querydni);
        while($filasresultadoquery_dni=pg_fetch_array($resultadoquery_dni)){


          $buscarcalle = "SELECT d_calle FROM calles_alturas
                          WHERE c_calle = ".$filasresultadoquery_dni["c_calle"].";";
          
          foreach ($db1 -> query($buscarcalle) as $resultadoquery) {
            $d_calle = $resultadoquery['D_CALLE'];
          }

          echo '<tr>
                  <td class="text-center">'.$filasresultadoquery_dni["d_nombre_menor"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_apellido_menor"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["n_dni_menor"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["f_fecha"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["n_tramite"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni ["d_descripcion"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["f_fecha_nac_menor"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_nombre_madre"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_apellido_madre"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["n_dni_madre"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["f_fecha_nac_madre"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_nombre_padre"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_apellido_padre"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["n_dni_padre"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["f_fecha_nac_padre"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["c_localidad"].'</td>
                  <td class="text-center">'.$d_calle.'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["n_numero"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_piso"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_dpto"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_vivienda"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_pais"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_situacion"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_hijos"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_educacion"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_estado"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_ocupacion"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_cobertura"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_subsidio"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_jubilacion"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_programa"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_beca"].'</td>


                </tr>';
        }
        
?>


  <!--                 <td class = "text center">
                  <button type="button" class="btn btn-success btn-md pull-right" style="margin-bottom: 15px" id="info" >Info</button>
                  </td> -->

<!--                                     <td class="text-center">'.$filasresultadoquery_dni["c_parentesco"].'</td> -->