<?php

// Ruta del directorio donde están los archivos
$path  = '/var/www/html/comprasylicitaciones/archivos/'; 

// Arreglo con todos los nombres de los archivos
$files = array_diff(scandir($path), array('.', '..')); 

$code = $_REQUEST["cuit"];

foreach($files as $file){
    // Divides en dos el nombre de tu archivo utilizando el . 
    $data          = explode("-", $file);
    // cuit del archivo
    $cuit      = $data[0];
    // nombre del archivo 
    $nombredelarchivo = $data[1];
    if($code == $cuit){
        echo '<div class="col-md-12"><a href="http://www.vicentelopez.gov.ar/compras/archivos/'.$cuit.'-'.$nombredelarchivo.'" target="_blank">'.$cuit.'-'.$nombredelarchivo.'</a></div>';        
    }
}
?>
