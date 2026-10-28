<?php

error_reporting(E_ALL);

  ini_set('display_errors', 1);

  putenv('INFORMIXDIR=/opt/IBM/informix'); 
  putenv('DBDATE=dmy4/'); 
   $db = new PDO("informix:host=db;service=munivl_tcp;database=recaudaciones;server=munivl_tcp;protocol=onsoctcp;EnableScrollableCursors=1;","npiersanti","nicolasjorgepier");
  //$db = new PDO("informix:host=db;service=1526;database=recaudaciones;server=prd_diamenos1_tcp;protocol=onsoctcp;EnableScrollableCursors=1;","npiersanti","nicolasjorgepier");


  $insertdeuda ='EXECUTE PROCEDURE sp_recibo_prov (0 ,'.$_REQUEST["valor"].',TODAY)';




    foreach ($db->query($insertdeuda)as $resultadoselecttransac) {

        echo $resultadoselecttransac["0"];
        $insertrecibo ='INSERT INTO compras2:recibolici VALUES('.$resultadoselecttransac["0"].','.$_REQUEST["lici"].','.$_REQUEST["numerodeproveedor"].')';
        //echo $insertrecibo;
        $db->query($insertrecibo);
        }

        
       


?>
