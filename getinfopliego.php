<?php 

error_reporting(E_ALL);

  ini_set('display_errors', 1);

  include 'connecto2.php';

 $code = $_REQUEST["nropliego"];
  $tipo = $_REQUEST["tipo"];

$anio = "";

if (isset($_REQUEST["ano"]) and ($_REQUEST["ano"] !='')){
  $anio = " and ano = ".$_REQUEST["ano"];
}

  
//verifica si el pliego esta vencido
$selectfecha ="select *
                from apertura
                where id = ".$code."
                AND tipo = ".$tipo.
                $anio." 
                and (descripcion = 'FECHA LIMITE DE COMPRA' or descripcion = 'FECHA LIMITE DE COMPRA (SL)')";

//echo $selectfecha;

$fecha_actual = strtotime(date("d-m-Y H:i:00",time()));

$echo = 0;

foreach ($db -> query($selectfecha) as $resultadoselectfecha) {

  //echo $resultadoselecttransac['VALOR'].",".$resultadoselecttransac['OBJETO'].",".$resultadoselecttransac['PRESUPUESTO'].",".$resultadoselecttransac['ESTADO'];

  $fecha_entrada = strtotime($resultadoselectfecha['FECHA']);

 
  if($fecha_actual <= $fecha_entrada){

    $selecttransac ='SELECT * 
    from licitacion 
    WHERE id = '.$code.'
    AND tipo = '.$tipo.$anio;

    //echo $selecttransac;

    foreach ($db -> query($selecttransac) as $resultadoselecttransac) {

      echo $resultadoselecttransac['VALOR'].",".$resultadoselecttransac['OBJETO'].",".$resultadoselecttransac['PRESUPUESTO'].",".$resultadoselecttransac['ESTADO'];
      $echo=1;


    }
  }

}


if ($echo==0) {
	echo "0";
}
