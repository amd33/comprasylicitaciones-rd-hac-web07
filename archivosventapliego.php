<?php

// Ruta del directorio donde están los archivos -- ojo al subir
//$path  = '/var/www/html/Compras-seba/compras-y-licitaciones/archivos';

$path  = 'archivos/';

// $path = "archivos/";
// Arreglo con todos los nombres de los archivos
$files = array_diff(scandir($path), array('.', '..'));

$codigo = $_REQUEST["codigo"];


foreach($files as $file){
    // Divides en dos el nombre de tu archivo utilizando el .
    $data          = explode("$", $file);



    // cuit del archivo
    $cod      = $data[0];
     // nombre del archivo
    $nombredelarchivo = $data[1];
    if($cod == $codigo){
        //echo '<div class="col-md-12"><a href="https://www.vicentelopez.gov.ar/compras/archivos/'.$cuit.'-'.$nombredelarchivo.'" target="_blank">'.$cuit.'-'.$nombredelarchivo.'</a></div>';
        echo '<div class="col-md-12">
                <div class="col-md-12">
                  <a href="archivos/'.$codigo.'$'.$nombredelarchivo.'" target="_blank">'.$nombredelarchivo.'</a>
                </div>
               </div>';

    }
}

// echo php_ini_loaded_file();
?>

