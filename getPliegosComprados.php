<?php

include("connecto2.php");
/*
  if ( isset($_REQUEST['estado']) ) {

    $tipo = $_REQUEST['tipo'];

    $estado = $_REQUEST['estado'];


    $AGENTE="SELECT * FROM licitacion WHERE  tipo='".$tipo."' AND estado='".$estado."'";

  }else{
    $AGENTE="SELECT * FROM licitacion";
  }
  */

$licitaciones="select licitacion.*,tipo_pliego.descripcion
                from licitacion
                left join tipo_pliego on licitacion.tipo = tipo_pliego.codigo
                
                order by licitacion.id desc
                ";


foreach ($db->query($licitaciones) as $row){

    ?>

    <tr data-ri="0" class="warning"  role="row">
        <td ><?php echo $row['DESCRIPCION']; ?></td>
        <td ><?php echo $row['ID']; ?></td>
        <td ><?php echo $row['OBJETO']; ?></td>
        <td >$<?php echo $row['PRESUPUESTO']; ?></td>
        <td ><?php echo "343"; ?></td>
        <td ><?php echo "Enrique"; ?></td>
        
        <td class="text-center">
            <a class="btn btn-info btn-action mr-1" data-toggle="modal" data-target="#info"  data-nropliego="<?php echo $row['ID']; ?>" data-presupuesto="<?php echo $row['PRESUPUESTO']; ?>" data-valorpliego="<?php echo $row['VALOR']; ?>"   data-estado="<?php echo $row['ESTADO']; ?>" data-tipocontra="<?php echo $row['TIPO']; ?>"  data-objeto="<?php echo $row['OBJETO']; ?>" data-txttipocontra="<?php echo $row['DESCRIPCION']; ?>" data-codigo="<?php echo $row['CODIGO']; ?>">Solicitud</a>
        </td>




    </tr>

<?php  }
?>







