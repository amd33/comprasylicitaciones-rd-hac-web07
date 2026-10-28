<?php

// Ruta del directorio donde están los archivos
$path  = '/var/www/html/stisla/archivos'; 

// Arreglo con todos los nombres de los archivos
$files = array_diff(scandir($path), array('.', '..')); 

$code = "22222222222";

foreach($files as $file){
    // Divides en dos el nombre de tu archivo utilizando el . 
    $data          = explode("-", $file);
    // cuit del archivo
    $cuit      = $data[0];
    // nombre del archivo 
    $nombredelarchivo = $data[1];


    if($code == $cuit){
        echo $cuit.$nombredelarchivo."<br>";
        // Realizamos un break para que el ciclo se interrumpa
        
    }
}
?>