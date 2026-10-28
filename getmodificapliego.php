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




$AGENTE="select licitacion.*,tp.descripcion,fecha,sl.FECHA_SL,AP_FECHA_SL,FECHA_PL,FECHA_LIM_PL,
                case when activa = 1 then 'SI'
                    when activa = 0 then 'NO' end as act,
                TO_CHAR(fecha_baja, '%d/%m/%Y') as fecha_b,
                f_apertura.FECHA_AP

          from licitacion
          left join
          (
          select id,tipo,ano,max(fecha) as FECHA
          from apertura
          group by id,tipo,ano
          ) xxx on licitacion.id = xxx.id and licitacion.tipo = xxx.tipo and licitacion.ano = xxx.ano
          left join
          (
          select id,tipo,ano, fecha as AP_FECHA_SL
          from apertura
          where descripcion = 'FECHA LIMITE DE COMPRA (SL)'
          ) ap_sl on licitacion.id = ap_sl.id and licitacion.tipo = ap_sl.tipo and licitacion.ano = ap_sl.ano
          left join
          (
          select id,tipo,ano, fecha as FECHA_SL
          from apertura
          where descripcion = 'SEGUNDO LLAMADO'
          ) sl on licitacion.id = sl.id and licitacion.tipo = sl.tipo and licitacion.ano = sl.ano

          left join
          (
          select id,tipo,ano, fecha as FECHA_PL
          from apertura
          where descripcion = 'PRIMER LLAMADO'
          ) pl on licitacion.id = pl.id and licitacion.tipo = pl.tipo and licitacion.ano = pl.ano
          left join
          (
          select id,tipo,ano, fecha as FECHA_LIM_PL
          from apertura
          where descripcion = 'FECHA LIMITE DE COMPRA'
          ) plfl on licitacion.id = plfl.id and licitacion.tipo = plfl.tipo and licitacion.ano = plfl.ano
          left join
          (
          select id,tipo,ano, max(fecha) as fecha_ap
          from apertura
          where descripcion in ('PRIMER LLAMADO','SEGUNDO LLAMADO')
          group by id,tipo,ano
          ) f_apertura on licitacion.id = f_apertura.id and licitacion.tipo = f_apertura.tipo and licitacion.ano = f_apertura.ano



          left join tipo_pliego tp on tp.codigo = licitacion.tipo

          order by f_apertura.FECHA_AP desc
        ";


     

  foreach ($db->query($AGENTE) as $row){

    ?>

    <tr data-ri="0" class="warning" role="row"
    data-tipo="<?php echo $row['TIPO']; ?>"
    data-id="<?php echo $row['ID']; ?>"
    data-ano="<?php echo $row['ANO']; ?>"
    data-objeto="<?php echo trim($row['OBJETO']); ?>"
    data-presupuesto="<?php echo trim($row['PRESUPUESTO']); ?>">
    data-nota="<?php echo trim($row['NOTA']); ?>"> data-nota="<?php echo trim($row['NOTA']); ?>">

   	   <td><?php echo $row['DESCRIPCION']; ?></td>
   	   <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['ANO']; ?></td>
	   <td><?php echo $row['OBJETO']; ?></td>
	   <td>$<?php echo $row['PRESUPUESTO']; ?></td>
       <td><?php echo date("d/m/Y H:i:s", strtotime($row['FECHA_AP'])); ?></td>
       <td><?php echo ($row['ACT']); ?></td>
       <td><?php echo ($row['FECHA_B']); ?></td>

        <?php

         if ($row['ACT'] == 'SI') {

        ?>

        <td colspan="1" style="padding:0.1%">

            <a class="btn btn-outline-warning modificar" data-toggle="modal" data-target="#modif"
               data-nrocontratacion="<?php echo $row['ID']; ?>"
               data-presupuesto="<?php echo $row['PRESUPUESTO']; ?>"
               data-valor10="<?php echo $row['VALOR']; ?>"
               data-estado="<?php echo $row['ESTADO']; ?>"
               data-tipo="<?php echo $row['TIPO']; ?>"
               data-ano="<?php echo $row['ANO']; ?>"
               data-objeto="<?php echo $row['OBJETO']; ?>"
               data-apertura="<?php echo $row['FECHA_PL']; ?>"
               data-fechalimite="<?php echo $row['FECHA_LIM_PL']; ?>"
               data-nota="<?php echo $row['NOTA']; ?>"
               data-activa="<?php echo $row['ACT']; ?>"
               data-codigo="<?php echo $row['CODIGO']; ?>">
                <i class="fa fa-file" aria-hidden="true" title="Modificar"></i>
                </a>

            <a class="btn btn-outline-danger segllamado" data-toggle="modal" data-target="#info"
               data-nrocontratacion="<?php echo $row['ID']; ?>"
               data-presupuesto="<?php echo $row['PRESUPUESTO']; ?>"
               data-valor10="<?php echo $row['VALOR']; ?>"
               data-estado="<?php echo $row['ESTADO']; ?>"
               data-tipo="<?php echo $row['TIPO']; ?>"
               data-ano="<?php echo $row['ANO']; ?>"
               data-objeto="<?php echo $row['OBJETO']; ?>"
               data-apertura="<?php echo $row['AP_FECHA_SL']; ?>"
               data-sl="<?php echo $row['FECHA_SL']; ?>"
               data-nota="<?php echo $row['NOTA']; ?>"
               data-activa="<?php echo $row['ACT']; ?>">
                <i class="fa fa-calendar" aria-hidden="true" title="Segundo Llamado"></i>
            </a>






            <a class="btn btn-outline-danger borrar" data-target="#borrar" data-nrocontratacion="<?php echo $row['ID']; ?>" data-tipo="<?php echo $row['TIPO']; ?>"  data-ano="<?php echo $row['ANO']; ?>"   >
              <i class="fa fa-times" aria-hidden="true" title="Desactivar"></i>
            </a>
	    </td>
        <?php }

         else { ?>
             <td class="text-center">
              <a class="btn btn-outline-success activar" data-target="#activar" data-nrocontratacion="<?php echo $row['ID']; ?>" data-tipo="<?php echo $row['TIPO']; ?>"  data-ano="<?php echo $row['ANO']; ?>"   >
              <i class="fa fa-check" aria-hidden="true" title="Activar"></i>
                </a>
             </td>
             <?php
         }

        ?>

    </tr>

   <?php  }
  ?>

