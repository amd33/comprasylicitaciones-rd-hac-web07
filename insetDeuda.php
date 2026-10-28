<?php
include("conect.php");

if ($_REQUEST["dominio"]!="") {
	$insertdeuda ='EXECUTE PROCEDURE spl_graba_deuda_veh_hab("'.$_REQUEST["legajo"].'","'.$_REQUEST["dominio"].'",'.$_REQUEST["ano"].','.$_REQUEST["mes"].')';

	
foreach ($db -> query($insertdeuda) as $resultadoinsertdeuda) {

		echo $resultadoinsertdeuda['LC_RESULTADO'].",".$resultadoinsertdeuda['LC_CODERR'];
    }
}


?>