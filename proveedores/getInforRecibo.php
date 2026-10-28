<?php
include("conect.php");

//if ($_REQUEST["dominio"]!="") {
  //$insertdeuda ='EXECUTE PROCEDURE spl_graba_deuda_veh_hab("999","$_REQUEST["dominio"].'",'.$_REQUEST["ano"].','.$_REQUEST["mes"].')';

    
    //echo $cuentanro;
    $selecttransac ='SELECT * from recibos WHERE n_comprob = '.$_REQUEST["recibo"];

    foreach ($db -> query($selecttransac) as $resultadoselecttransac) {

        $tasa =  $resultadoselecttransac["C_TASA"];
        $cuenta = $resultadoselecttransac["C_CUENTA"];
        $comprobante = $resultadoselecttransac["N_COMPROB"];
        $vencimiento= $resultadoselecttransac["F_PRIM_VTO"];
        $total = $total+$resultadoselecttransac["I_DEUDA"]+$resultadoselecttransac["I_REC_PRIM_VTO"]+$resultadoselecttransac["I_REC_SEG_VTO"]+$resultadoselecttransac["I_MULTA"];
        echo $tasa.",".$cuenta.",".$comprobante.",".$vencimiento.",".$total;
        }


        
       


?>
