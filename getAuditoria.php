<?php
  include("connecto2.php");


$AGENTE="select log.*,usuario.usuario
         from log
         join usuario on log.usuario_id = usuario.id
         
        ";

        
  foreach ($db->query($AGENTE, PDO::FETCH_ASSOC) as $row){


    ?>

    <tr data-ri="0" class="warning" role="row">
    

   	 <td><?php echo $row['ID']; ?></td>
   	 <td><?php echo $row['FECHA']; ?></td>
     <td><?php echo $row['ACCION']; ?></td>
	   <td><?php echo $row['COMENTARIO']; ?></td>
	   <td><?php echo $row['USUARIO']; ?></td>
    </tr>

   <?php  }
  ?>