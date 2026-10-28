<?php

include 'connecto2.php';

session_start();

$nrocontratacion = ' null ';

if (isset($_REQUEST["nrocontratacion"]) and $_REQUEST["nrocontratacion"] != ''){
    $nrocontratacion = $_REQUEST["nrocontratacion"];
}

$nrocontratacion_ant = ' null ';

if (isset($_REQUEST["nrocontratacion_ant"]) and $_REQUEST["nrocontratacion_ant"] != ''){
    $nrocontratacion_ant = $_REQUEST["nrocontratacion_ant"];
}

$ano = ' null ';

if (isset($_REQUEST["ano"]) and $_REQUEST["ano"] != ''){
    $ano = $_REQUEST["ano"];
}

$ano_ant = ' null ';

if (isset($_REQUEST["ano_ant"]) and $_REQUEST["ano_ant"] != ''){
    $ano_ant = $_REQUEST["ano_ant"];
}



$tipo = $_REQUEST["tipo"];

$tipo_ant = $_REQUEST["tipo_ant"];


$fecha_año = date("Y");

$query="SELECT * FROM usuario where usuario = '".$_SESSION['usuario']."'";


foreach ($db->query($query) as $row){

    $query_log="insert into log(id,fecha,accion,comentario,usuario_id)
    values((select coalesce(max(id),0) + 1 from log),CURRENT,'modif.pliego','Modifica Pliego Nro: ".$nrocontratacion."' ,".$row[0].")";

   

    $db->query($query_log);

    

}	



$objeto = '';

if (isset($_REQUEST["objeto"]) and $_REQUEST["objeto"] != ''){
    $objeto = $_REQUEST["objeto"];
}

$presupuesto = '';

if (isset($_REQUEST["presupuesto"]) and $_REQUEST["presupuesto"] != ''){
    $presupuesto = $_REQUEST["presupuesto"];
}

$valor = ' null ';

if (isset($_REQUEST["valor"]) and $_REQUEST["valor"] != ''){
    $valor = $_REQUEST["valor"];
}


$nota = '';

if (isset($_REQUEST["nota"]) and $_REQUEST["nota"] != ''){
    $nota = $_REQUEST["nota"];
}

$apertura = '';

if (isset($_REQUEST["apertura"]) and $_REQUEST["apertura"] != ''){
    $apertura = $_REQUEST["apertura"].":00";
}

$fechalimite = '';

if (isset($_REQUEST["fechalimite"]) and $_REQUEST["fechalimite"] != ''){
    $fechalimite = $_REQUEST["fechalimite"].":00";
}


if (($nrocontratacion != $nrocontratacion_ant) or ($tipo != $tipo_ant) or ($ano != $ano_ant)) {

    $sql = "SELECT count(*) as cant
          FROM licitacion
          where id =$nrocontratacion
          and tipo = $tipo 
          and ano = $ano";


//    echo $sql;

    // echo "<br>";

    $row = $db->query($sql);

    $dato = $row->fetch();


    if ($dato[0] > 0) {
        echo 1; //error 1 : ya existe ese numero de contratacion para ese tipo
    }
    else {
        $update_licitacion = " UPDATE licitacion
                           SET objeto ='" . trim($objeto) . "',
                               presupuesto = '".trim($presupuesto)."',
                               valor = $valor,
                               id = ".$nrocontratacion.",
                               tipo = ".$tipo.",
                               ano = ".$ano."
                           WHERE id = " . $nrocontratacion_ant . "
                           and tipo = " . $tipo_ant."
                           and ano = ".$ano_ant;

        $update_apertura = "   UPDATE apertura
                           SET fecha ='" . $apertura . "',
                               id = ".$nrocontratacion.",
                               tipo = ".$tipo.",
                               ano = ".$ano."
                           WHERE id = " . $nrocontratacion_ant . "
                           and tipo = " . $tipo_ant ."
                           and ano = ".$ano_ant."
                           and descripcion = 'PRIMER LLAMADO'";


        $update_fechalimite = " UPDATE apertura
                           SET fecha ='" . $fechalimite . "',
                                id = ".$nrocontratacion.",
                               tipo = ".$tipo.",
                               ano = ".$ano."
                           WHERE id = " . $nrocontratacion_ant . "
                           and tipo = " . $tipo_ant ."
                           and ano = ".$ano_ant."
                           and descripcion = 'FECHA LIMITE DE COMPRA'";

        $update_apertura2l = "   UPDATE apertura
                           SET fecha ='" . $apertura . "',
                                id = ".$nrocontratacion.",
                               tipo = ".$tipo.",
                               ano = ".$ano."
                           WHERE id = " . $nrocontratacion_ant . "
                           and tipo = " . $tipo_ant ."
                           and ano = ".$ano_ant."
                           and descripcion = 'SEGUNDO LLAMADO'";


        $update_fechalimite2l = " UPDATE apertura
                           SET fecha ='" . $fechalimite . "',
                               id = ".$nrocontratacion.",
                               tipo = ".$tipo.",
                               ano = ".$ano."
                           WHERE id = " .$nrocontratacion_ant . "
                           and tipo = " . $tipo_ant ."
                           and ano = ".$ano_ant."
                           and descripcion = 'FECHA LIMITE DE COMPRA (SL)'";


        $db->query($update_licitacion);
        $db->query($update_apertura);
        $db->query($update_fechalimite);
        $db->query($update_apertura2l);
        $db->query($update_fechalimite2l);

        //actualizacion de archivos

        $path  = 'archivos/';

        // Arreglo con todos los nombres de los archivos
        $files = array_diff(scandir($path), array('.', '..'));

        $code = $nrocontratacion_ant;



        echo 2;


    }

}
else {


    $update_licitacion = " UPDATE licitacion
                           SET objeto ='" . trim($objeto) . "',
                               presupuesto = '".trim($presupuesto)."',
                               valor = $valor,
                               id = ".$nrocontratacion.",
                               tipo = ".$tipo.",
                               ano = ".$ano."
                           WHERE id = " . $nrocontratacion_ant . "
                           and tipo = " . $tipo_ant."
                           and ano = ".$ano_ant;

    $update_apertura = "   UPDATE apertura
                           SET fecha ='" . $apertura . "',
                                id = ".$nrocontratacion.",
                               tipo = ".$tipo.",
                               ano = ".$ano."
                           WHERE id = " . $nrocontratacion_ant . "
                           and tipo = " . $tipo_ant . "
                           and ano = " . $ano_ant . "
                           and descripcion = 'PRIMER LLAMADO'";


    $update_fechalimite = " UPDATE apertura
                           SET fecha ='" . $fechalimite . "',
                               id = ".$nrocontratacion.",
                               tipo = ".$tipo.",
                               ano = ".$ano."
                           WHERE id = " . $nrocontratacion_ant . "
                           and tipo = " . $tipo_ant . "
                           and ano = " . $ano_ant . "
                           and descripcion = 'FECHA LIMITE DE COMPRA'";

    $update_apertura2l = "   UPDATE apertura
                           SET fecha ='" . $apertura . "',
                               id = ".$nrocontratacion.",
                               tipo = ".$tipo.",
                               ano = ".$ano."
                           WHERE id = " . $nrocontratacion_ant . "
                           and tipo = " . $tipo_ant . "
                           and ano = " . $ano_ant . "
                           and descripcion = 'SEGUNDO LLAMADO'";


    $update_fechalimite2l = " UPDATE apertura
                           SET fecha ='" . $fechalimite . "',
                               id = ".$nrocontratacion.",
                               tipo = ".$tipo.",
                               ano = ".$ano."
                           WHERE id = " . $nrocontratacion_ant . "
                           and tipo = " . $tipo_ant . "
                           and ano = " . $ano_ant . "
                           and descripcion = 'FECHA LIMITE DE COMPRA (SL)'";


    $db->query($update_licitacion);
    $db->query($update_apertura);
    $db->query($update_fechalimite);
    $db->query($update_apertura2l);
    $db->query($update_fechalimite2l);

    echo 3;




}


