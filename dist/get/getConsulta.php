<?php

include("../conect.php");

      $querydni = "SELECT a.n_dni, b.d_nombre, b.d_apellido, a.f_fecha, a.n_tramite, a.c_tramite,
                        c.c_dependencia, c.d_descripcion as descritramite, d.d_descripcion as descripciondependencia
                        FROM desasocial.tramite_persona a, desasocial.persona b,
                        desasocial.tipo_tramite c, desasocial.dependencias d
                        WHERE a.n_dni = ".$_REQUEST['dni']."
                        AND a.n_dni = b.n_dni
                        AND a.c_tramite = c.c_tramite
                        AND c.c_dependencia = d.c_dependencia";
      
      // $resultado = pg_query($db, $querydni);
        
                     
        $resultadoquery_dni = pg_query($db, $querydni);
        while($filasresultadoquery_dni=pg_fetch_array($resultadoquery_dni)){
          echo '<tr>
                  <td class="text-center">'.$filasresultadoquery_dni["d_nombre"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["d_apellido"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["n_dni"].'</td>
                  <td class="text-center">'.$filasresultadoquery_dni["f_fecha"].'</td>
                  
                  <td class="text-center">'.$filasresultadoquery_dni["descripciondependencia"].'</td>
                </tr>';
        }
        
      
                        
?>
