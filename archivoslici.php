<?php


if (!isset($_POST["codigo"])){
    $codigo = $_POST["mcodigo"];
}
else {
    $codigo = $_POST["codigo"];
}


$path  = 'archivos/';


// Arreglo con todos los nombres de los archivos
$files = array_diff(scandir($path), array('.', '..'));

foreach($files as $file){
    // Divides en dos el nombre de tu archivo utilizando el .
    $data          = explode("$", $file);
    // codigo del archivo
    $codigo_arch      = $data[0];
    // nombre del archivo
    $nombredelarchivo = $data[1];
    if($codigo == $codigo_arch){
        //echo '<div class="col-md-12"><a href="https://www.vicentelopez.gov.ar/compras/archivos/'.$cuit.'-'.$nombredelarchivo.'" target="_blank">'.$cuit.'-'.$nombredelarchivo.'</a></div>';
        echo '<div class="col-md-12">
                <div class="col-md-12">
                 <input type="button" class="btn btn-outline-danger" id="borrar_archivo" value="X" onclick="javascript:borra_arch(\''.$codigo.'$'.$nombredelarchivo.'\')">
                  <a href="archivos/'.$codigo.'$'.$nombredelarchivo.'" target="_blank">'.$nombredelarchivo.'</a>


                </div>
               </div>';

    }
}

// echo php_ini_loaded_file();
?>






<script>
    function borra_arch(arch){
        $.ajax({
            type: 'POST',
            data: {
                arch: arch,
            },
            url: 'borrar_archivo.php',
            success: function(){

                $.ajax({
                    type: "POST",
                    url: "archivoslici.php",
                    data: { codigo: <?php echo $codigo ?>,
                           },
                    success: function(data){
                        //console.log(data);
                        $('#archivoslici').html(data);

                    },
                    error: function(data)
                    {
                        alert("error");
                    }
                });



                alert('El archivo fue eliminado.');

            }
        })
    }
</script>
