<?php
  include("conect.php");
  $AGENTE="SELECT * FROM AGENTE WHERE id >= 167898 AND cuit>1 AND id IN (SELECT id  FROM postulante)";
  
  foreach ($db->query($AGENTE) as $row){

    $DOMICILIOCOMERCIAL="SELECT * FROM domicilio WHERE ID =".$row['DOMICILIOCOMERCIAL_ID'];
   
    foreach ($db->query($DOMICILIOCOMERCIAL) as $rowcomercial) {
      $comercialcodigo_postal =  $rowcomercial["CODIGO_POSTAL"];
      $comerciallocalidad =  $rowcomercial["LOCALIDAD"];
      $comercialdepartamento =  $rowcomercial["DEPARTAMENTO"];
      $comercialpiso =  $rowcomercial["PISO"];
      $comercialcalle =  $rowcomercial["CALLE"];
      $comercialnumero =  $rowcomercial["NUMERO"];
      
    }

    $DOMICILIOLEGAL="SELECT * FROM domicilio WHERE ID =".$row['DOMICILIOLEGAL_ID'];
    
    foreach ($db->query($DOMICILIOLEGAL) as $rowlegal) {
      $legalcodigo_postal = $rowlegal["CODIGO_POSTAL"];
      $legallocalidad = $rowlegal["LOCALIDAD"];
      $legaldepartamento = $rowlegal["DEPARTAMENTO"];
      $legalpiso = $rowlegal["PISO"];
      $legalcalle = $rowlegal["CALLE"];
      $legalnumero = $rowlegal["NUMERO"];
    }

    ?>

    <tr>
      <td><?php echo $row['CUIT'];?></td>
      <td><?php echo  substr(trim($row['RAZONSOCIAL']), 0, 40);?></td>
      <td>
        <?php

        if(strtoupper(trim($row['ULTIMO_ESTADO']))==strtoupper("ALTA POSTULANTE")){
          ?>
          <div class="badge badge-info text-uppercase estado"><?php
          echo strtoupper(trim($row['ULTIMO_ESTADO']));
          ?></div><?php
        }

        if(trim($row['ULTIMO_ESTADO'])=="DOCUMENTACION"){
          ?>
          <div class="badge badge-primary text-uppercase estado"><?php
          echo trim($row['ULTIMO_ESTADO']);
          ?></div><?php
        }

        if(trim($row['ULTIMO_ESTADO'])=="APROBADO"){
          ?>
          <div class="badge badge-success text-uppercase estado"><?php
          echo trim($row['ULTIMO_ESTADO']);
          ?></div><?php
        }

        if(trim($row['ULTIMO_ESTADO'])=="EDICION POSTULANTE"){
          ?>
          <div class="badge badge-warning text-uppercase estado"><?php
          echo trim($row['ULTIMO_ESTADO']);
          ?></div><?php
        }
        if(trim($row['ULTIMO_ESTADO'])=="OBSERVAR"){
          ?>
          <div class="badge badge-danger text-uppercase estado"><?php
          echo trim($row['ULTIMO_ESTADO']);
          ?></div><?php
        }


        ?>
      </td>
      <td><div class=" text-uppercase"><?php echo $row['RESPONSABILIDAD'];?></div></td>
      <td>
        <a href="#" data-toggle="modal" data-target="#emailsender" data-cuit="<?php echo $row['CUIT'];?>" data-razonsocial="<?php echo trim($row['RAZONSOCIAL']);?>" data-email="<?php echo $row['CORREO'];?>" class="font-weight-600"><i class="fas fa-envelope"></i> <?php echo $row['CORREO'];?></a>
      </td>
      <td class="text-center">
        <a class="btn btn-info btn-action mr-1" data-toggle="modal" data-target="#info"  data-email="<?php echo $row['CORREO'];?>" data-razonsocial="<?php echo trim($row['RAZONSOCIAL']);?>" data-cuit="<?php echo $row['CUIT'];?>" data-responsabilidad="<?php echo $row['RESPONSABILIDAD'];?>" data-correo="<?php echo $row['CORREO'];?>" data-ib="<?php echo $row['INGRESOSBRUTOS'];?>" data-telefono="<?php echo $row['TELEFONO'];?>" data-comercialcodigo_postal="<?php echo $comercialcodigo_postal;?>" data-comerciallocalidad="<?php echo $comerciallocalidad;?>" data-comercialdepartamento="<?php echo $comercialdepartamento;?>" data-comercialpiso="<?php echo $comercialpiso;?>" data-comercialcalle="<?php echo trim($comercialcalle);?>" data-comercialnumero="<?php echo $comercialnumero;?>"  data-legalcodigo_postal="<?php echo $legalcodigo_postal;?>" data-legallocalidad="<?php echo $legallocalidad;?>" data-legaldepartamento="<?php echo $legaldepartamento;?>" data-legalpiso="<?php echo $legalpiso;?>" data-legalcalle="<?php echo trim($legalcalle);?>" data-legalnumero="<?php echo $legalnumero;?>"><i class="fas fa-pencil-alt"></i></a>
        <a class="btn btn-success btn-action" data-toggle="modal" data-target="#aprobar"  data-email="<?php echo $row['CORREO'];?>" data-razonsocial="<?php echo trim($row['RAZONSOCIAL']);?>" data-cuit="<?php echo $row['CUIT'];?>" data-responsabilidad="<?php echo $row['RESPONSABILIDAD'];?>" data-correo="<?php echo $row['CORREO'];?>" data-ib="<?php echo $row['INGRESOSBRUTOS'];?>" data-telefono="<?php echo $row['TELEFONO'];?>" data-comercialcodigo_postal="<?php echo $comercialcodigo_postal;?>" data-comerciallocalidad="<?php echo $comerciallocalidad;?>" data-comercialdepartamento="<?php echo $comercialdepartamento;?>" data-comercialpiso="<?php echo $comercialpiso;?>" data-comercialcalle="<?php echo trim($comercialcalle);?>" data-comercialnumero="<?php echo $comercialnumero;?>"  data-legalcodigo_postal="<?php echo $legalcodigo_postal;?>" data-legallocalidad="<?php echo $legallocalidad;?>" data-legaldepartamento="<?php echo $legaldepartamento;?>" data-legalpiso="<?php echo $legalpiso;?>" data-legalcalle="<?php echo trim($legalcalle);?>" data-legalnumero="<?php echo $legalnumero;?>"><i class="fas fa-check-square"></i></a>
        <a class="btn btn-warning btn-action" data-toggle="modal" data-target="#bitacora"  data-email="<?php echo $row['CORREO'];?>" data-razonsocial="<?php echo trim($row['RAZONSOCIAL']);?>" data-cuit="<?php echo $row['CUIT'];?>" data-responsabilidad="<?php echo $row['RESPONSABILIDAD'];?>" data-correo="<?php echo $row['CORREO'];?>" data-ib="<?php echo $row['INGRESOSBRUTOS'];?>" data-telefono="<?php echo $row['TELEFONO'];?>" data-comercialcodigo_postal="<?php echo $comercialcodigo_postal;?>" data-comerciallocalidad="<?php echo $comerciallocalidad;?>" data-comercialdepartamento="<?php echo $comercialdepartamento;?>" data-comercialpiso="<?php echo $comercialpiso;?>" data-comercialcalle="<?php echo trim($comercialcalle);?>" data-comercialnumero="<?php echo $comercialnumero;?>"  data-legalcodigo_postal="<?php echo $legalcodigo_postal;?>" data-legallocalidad="<?php echo $legallocalidad;?>" data-legaldepartamento="<?php echo $legaldepartamento;?>" data-legalpiso="<?php echo $legalpiso;?>" data-legalcalle="<?php echo trim($legalcalle);?>" data-legalnumero="<?php echo $legalnumero;?>"><i class="fas fa-book"></i></a>
        <?php
        $pos  = strpos($_REQUEST['usuario'], "AMENDOLA");
        $pos1 = strpos($_REQUEST['usuario'], "LIPAROTI");
        $pos2 = strpos($_REQUEST['usuario'], "JORGE PIERSANTI");
         


        
        if ( ($pos === false) && ($pos1 === false) && ($pos2 === false)  ) {
         
        }else{
          ?>
         <a class="btn btn-danger btn-action" data-toggle="modal" data-target="#delete"  data-email="<?php echo $row['CORREO'];?>" data-razonsocial="<?php echo trim($row['RAZONSOCIAL']);?>" data-cuit="<?php echo $row['CUIT'];?>" data-responsabilidad="<?php echo $row['RESPONSABILIDAD'];?>" data-correo="<?php echo $row['CORREO'];?>" data-ib="<?php echo $row['INGRESOSBRUTOS'];?>" data-telefono="<?php echo $row['TELEFONO'];?>" data-comercialcodigo_postal="<?php echo $comercialcodigo_postal;?>" data-comerciallocalidad="<?php echo $comerciallocalidad;?>" data-comercialdepartamento="<?php echo $comercialdepartamento;?>" data-comercialpiso="<?php echo $comercialpiso;?>" data-comercialcalle="<?php echo trim($comercialcalle);?>" data-comercialnumero="<?php echo $comercialnumero;?>"  data-legalcodigo_postal="<?php echo $legalcodigo_postal;?>" data-legallocalidad="<?php echo $legallocalidad;?>" data-legaldepartamento="<?php echo $legaldepartamento;?>" data-legalpiso="<?php echo $legalpiso;?>" data-legalcalle="<?php echo trim($legalcalle);?>" data-legalnumero="<?php echo $legalnumero;?>"><i class="fas fa-trash"></i></a>
         <?php
        }
        ?>


      </td>
    </tr>
   <?php }
  ?>