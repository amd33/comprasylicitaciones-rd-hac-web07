<?php
include 'connecto2.php';

//if ($_REQUEST["dominio"]!="") {
  //$insertdeuda ='EXECUTE PROCEDURE spl_graba_deuda_veh_hab("999","$_REQUEST["dominio"].'",'.$_REQUEST["ano"].','.$_REQUEST["mes"].')';


  $anio = " and ano = ".$_REQUEST['ano'];
    
  $selecttransac="SELECT * 
                  FROM apertura 
                  where id =".$_REQUEST['nrocontratacion']." 
                  and tipo = ".$_REQUEST['tipo'].$anio;

 //echo $selecttransac;
  $index=0;
    foreach ($db -> query($selecttransac) as $resultadoselecttransac) {

         echo '<div class="col-md-12 "><p><strong>'.$resultadoselecttransac["DESCRIPCION"].'</strong><br>  <p class="colsecuronn'.$index.'">'.$resultadoselecttransac["FECHA"].'</p>    </p></div>';
         $index++;
        }






?>
