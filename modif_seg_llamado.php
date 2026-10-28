<?php

include 'connecto2.php';


$nrocontratacion = ' null ';

if (isset($_REQUEST["nrocontratacion"]) and $_REQUEST["nrocontratacion"] != ''){
    $nrocontratacion = $_REQUEST["nrocontratacion"];
}


$tipo = $_REQUEST["tipo"];
$ano = $_REQUEST["ano"];

$apertura = '';

if (isset($_REQUEST["apertura"]) and $_REQUEST["apertura"] != '') {
    $apertura = $_REQUEST["apertura"];
}

$fechalimite = ' null ';

if (isset($_REQUEST["fechalimite"]) and $_REQUEST["fechalimite"] != '') {
    $fechalimite = $_REQUEST["fechalimite"];
}


$sql="SELECT count(*) as cant
            FROM apertura
            where id =$nrocontratacion
            and tipo = $tipo
            and descripcion = 'SEGUNDO LLAMADO'
            and ano = $ano ";


//    echo $sql;

// echo "<br>";

$row = $db->query($sql);

$dato = $row->fetch();



if ($dato[0] == 0) {



    $nota = '';

    if (isset($_REQUEST["nota"]) and $_REQUEST["nota"] != '') {
        $nota = $_REQUEST["nota"];
    }

    $update_licitacion = " UPDATE licitacion
                       SET nota ='" . $nota . "'
                       WHERE id = " . $nrocontratacion . "
                       and ano = " . $ano . "
                       and tipo = " . $tipo;

    
    $insertapertura = 'INSERT INTO apertura VALUES(' . $nrocontratacion . ',"' . $apertura . ':00","SEGUNDO LLAMADO" ,' . $tipo . ',' . $ano . ')';


    $insertlimite = 'INSERT INTO apertura VALUES(' . $nrocontratacion . ',"' . $fechalimite . ':00","FECHA LIMITE DE COMPRA (SL)" ,' . $tipo . ',' . $ano . ')';


    $db->query($update_licitacion);
    $db->query($insertapertura);
    $db->query($insertlimite);

    echo "0";
}
else {

    $update_sl = " UPDATE apertura
                    SET fecha = '".$apertura.":00'
                    WHERE id =$nrocontratacion
                    and tipo = $tipo
                    and descripcion = 'SEGUNDO LLAMADO'
                    and ano = $ano";

    $update_fecha_limite = " UPDATE apertura
                           SET fecha = '".$fechalimite.":00'
                           WHERE id =$nrocontratacion
                           and tipo = $tipo
                           and ano = $ano
                           and descripcion = 'FECHA LIMITE DE COMPRA (SL)'";

    $db->query($update_sl);
    $db->query($update_fecha_limite);

    echo "0";


}




