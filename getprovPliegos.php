<?php
  include("connecto2.php");


$AGENTE="select licitacion.*,tp.descripcion,proveedor_pliego.*
        from proveedor_pliego
        join licitacion on proveedor_pliego.id_pliego = licitacion.id and proveedor_pliego.tipo = licitacion.tipo and proveedor_pliego.ano = licitacion.ano
        left join tipo_pliego tp on tp.codigo = licitacion.tipo
        ";

        
  foreach ($db->query($AGENTE, PDO::FETCH_ASSOC) as $row){


    ?>

    <tr data-ri="0" class="warning" role="row"
    data-tipo="<?php echo $row['TIPO']; ?>"
    data-idpliego="<?php echo $row['ID']; ?>"
    data-anopliego="<?php echo $row['ANO']; ?>"
    data-nroproveedor="<?php echo $row['NRO_PROVEEDOR']; ?>"
    data-presupuesto="<?php echo trim($row['PRESUPUESTO']); ?>">
    

   	 <td><?php echo $row['DESCRIPCION']; ?></td>
   	 <td><?php echo $row['ID']; ?></td>
     <td><?php echo $row['ANO']; ?></td>
	   <td><?php echo $row['OBJETO']; ?></td>
	   <td><?php echo $row['NRO_PROVEEDOR']; ?></td>
     <td><?php echo $row['RAZON_SOCIAL']; ?></td>
     <td><?php echo $row['CUIT']; ?></td>
     <td><?php echo $row['EMAIL']; ?></td>
     <td><?php echo date("d/m/Y H:i:s", strtotime($row['FECHA_HORA'])); ?></td>
      

        <td colspan="1" style="padding:0.1%">

            <a class="btn btn-outline-danger borrar" data-target="#borrar" data-nroproveedor="<?php echo $row['NRO_PROVEEDOR']; ?>" data-idpliego="<?php echo $row['ID']; ?>" data-tipo="<?php echo $row['TIPO']; ?>"   data-anopliego="<?php echo $row['ANO']; ?>">
              <i class="fa fa-times" aria-hidden="true" title="Eliminar"></i>
            </a>
	    </td>
    </tr>

   <?php  }
  ?>

