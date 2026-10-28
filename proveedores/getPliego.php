<?php

  include("conect.php");

  if ( isset($_REQUEST['estado']) ) {
    
    $tipo = $_REQUEST['tipo'];
    
    $estado = $_REQUEST['estado'];


    $AGENTE="SELECT * FROM licitacion WHERE  tipo='".$tipo."' AND estado='".$estado."'";
    
  }else{
    $AGENTE="SELECT * FROM licitacion";
  }
  
  
  foreach ($db->query($AGENTE) as $row){

    ?>

    <tr data-ri="0" class="warning"  role="row">
   	<td ><?php echo $row['TIPO']; ?></td>
   	   <td ><?php echo $row['ID']; ?></td>
		   <td ><?php echo $row['TITULO']; ?></td>
		   <td >$<?php echo $row['PRESUPUESTO']; ?></td>
       <?php
       $selecttransac="SELECT * FROM apertura where id =".$row['ID']." LIMIT 1";
    
      // echo $selecttransac;
      foreach ($db -> query($selecttransac) as $resultadoselecttransac) {

           echo '<td >'.$resultadoselecttransac["FECHA"].'</td>';
          }
      ?>
		   <td class="text-center">
		   	<a class="btn btn-info btn-action mr-1" data-toggle="modal" data-target="#info"  data-nropliego="<?php echo $row['ID']; ?>" data-presupuesto="<?php echo $row['PRESUPUESTO']; ?>" data-valorpliego="<?php echo $row['VALOR']; ?>"   data-estado="<?php echo $row['ESTADO']; ?>" data-tipocontra="<?php echo $row['TIPO']; ?>"  data-objeto="<?php echo $row['OBJETO']; ?>"  >Solicitud</a>
	      </td>

      
        
     
    </tr>
     
   <?php  }
  ?>



   


  
 