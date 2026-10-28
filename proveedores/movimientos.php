<?php

error_reporting(E_ALL);

  ini_set('display_errors', 1);

  //putenv('INFORMIXDIR=/opt/informix'); 
  putenv('INFORMIXDIR==/opt/IBM/informix');
  putenv('DBDATE=dmy4/'); 
  $db = new PDO("informix:host=db;service=munivl_tcp;database=compras2;server=munivl_tcp;protocol=onsoctcp;EnableScrollableCursors=1;","npiersanti","nicolasjorgepier");


//if ($_REQUEST["dominio"]!="") {
  //$insertdeuda ='EXECUTE PROCEDURE spl_graba_deuda_veh_hab("999","$_REQUEST["dominio"].'",'.$_REQUEST["ano"].','.$_REQUEST["mes"].')';

    
    //echo $cuentanro;
  $selecttransac="SELECT * FROM apertura where id =".$_REQUEST['nropliego'];
    
// echo $selecttransac;
  $index=0;
    foreach ($db -> query($selecttransac) as $resultadoselecttransac) {

         echo '<div class="col-md-12 "><p><strong>'.$resultadoselecttransac["DESCRIPCION"].'</strong><br>  <p class="colsecuronn'.$index.'">'.$resultadoselecttransac["FECHA"].'</p>    </p></div>';
         $index++;
        }


        
       


?>
