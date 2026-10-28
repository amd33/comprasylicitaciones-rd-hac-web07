<?php
  include("conect.php");
  $AGENTE="SELECT cuit,razonsocial,responsabilidad,correo FROM AGENTE WHERE id IN (SELECT id  FROM proveedor)";

  foreach ($db->query($AGENTE) as $row) {
    ?>

    <tr>
      <td><?php echo $row['CUIT'];?></td>
      <td><?php echo $row['RAZONSOCIAL'];?></td>
      <td><div class="badge badge-warning"><?php echo $row['RESPONSABILIDAD'];?></div></td>
      <td>
        <a href="#" data-toggle="modal" data-target="#emailsender" data-razonsocial="<?php echo $row['RAZONSOCIAL'];?>" data-email="<?php echo $row['CORREO'];?>" class="font-weight-600"><i class="fas fa-envelope"></i> <?php echo $row['CORREO'];?></a>
      </td>
      <td class="text-center">
        <a class="btn btn-info btn-action mr-1" data-toggle="modal" data-target="#info"  data-email="<?php echo $row['CORREO'];?>" data-razonsocial="<?php echo $row['RAZONSOCIAL'];?>" data-cuit="<?php echo $row['CUIT'];?>"><i class="fas fa-pencil-alt"></i></a>
        <a class="btn btn-success btn-action" data-toggle="modal" data-target="#aprobar"  data-email="<?php echo $row['CORREO'];?>" data-razonsocial="<?php echo $row['RAZONSOCIAL'];?>" data-cuit="<?php echo $row['CUIT'];?>"><i class="fas fa-check-square"></i></a>
        <a class="btn btn-warning btn-action" data-toggle="modal" data-target="#bitacora"  data-email="<?php echo $row['CORREO'];?>" data-razonsocial="<?php echo $row['RAZONSOCIAL'];?>" data-cuit="<?php echo $row['CUIT'];?>"><i class="fas fa-book"></i></a>

      </td>
    </tr>
   <?php }
  ?>