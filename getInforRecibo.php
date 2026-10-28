<?php

error_reporting(E_ALL);

  ini_set('display_errors', 1);

  putenv('INFORMIXDIR=/opt/IBM/informix'); 
  putenv('DBDATE=dmy4/'); 
  //$db = new PDO("informix:host=db;service=munivl_tcp;database=compras2;server=munivl_tcp;protocol=onsoctcp;EnableScrollableCursors=1;","tribunal","tribunal");
  $db = new PDO("informix:host=db;service=munivl_tcp;database=recaudaciones;server=munivl_tcp;protocol=onsoctcp;EnableScrollableCursors=1;","npiersanti","nicolasjorgepier");

//if ($_REQUEST["dominio"]!="") {
  //$insertdeuda ='EXECUTE PROCEDURE spl_graba_deuda_veh_hab("999","$_REQUEST["dominio"].'",'.$_REQUEST["ano"].','.$_REQUEST["mes"].')';

    
    //echo $cuentanro;
    $selecttransac ='SELECT * from recibos WHERE n_comprob = '.$_REQUEST["recibo"];

    foreach ($db -> query($selecttransac) as $resultadoselecttransac) {

        $total = 0;
        $tasa =  $resultadoselecttransac["C_TASA"];
        $cuenta = $resultadoselecttransac["C_CUENTA"];
        $comprobante = $resultadoselecttransac["N_COMPROB"];
        $vencimiento= $resultadoselecttransac["F_PRIM_VTO"];
        $total = $total+$resultadoselecttransac["I_DEUDA"]+$resultadoselecttransac["I_REC_PRIM_VTO"]+$resultadoselecttransac["I_REC_SEG_VTO"]+$resultadoselecttransac["I_MULTA"];
        echo $tasa.",".$cuenta.",".$comprobante.",".$vencimiento.",".$total;
        }


        
       


?>
