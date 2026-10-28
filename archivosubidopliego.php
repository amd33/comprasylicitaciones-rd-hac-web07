<?php
include 'connecto2.php' ;

$message="";

// si vale 1 todo ha ido bien, 0 ha habido algun problema
$ok=1;
$cantarchivos=0;
$fechapliego = date("Y-m-d");
$hoy = date("F j, Y, g:i a");
$hoy2 = date("Y-m-d H:i:s");


if (!isset($_POST["codigo"])){
    $_POST["codigo"] = $_POST["mcodigo"];
}





if($_FILES)
{
    foreach($_FILES as $file)
    {
        if($file["error"]==UPLOAD_ERR_OK)
        {

            // movemos el archivo a la carpeta donde se encuentra este archivo
            move_uploaded_file($file["tmp_name"], "archivos/".
                                                    str_replace("$", "", $_POST["codigo"])."$"
                                                    .str_replace("$", "",$file["name"]));

            $ok = 1;
            //$message.="El archivo ".$file["name"]." se ha recibido correctamente\n";
            //$cantarchivos++;
            //$insertarchivo='INSERT INTO archivos VALUES ('.$_POST["nrocontratacion"].','.$_POST["nrocontratacion"].'$'.str_replace("$", "", $file["name"]).','.$hoy2.')';
            //$db->query($insertarchivo);
        }else {
                $ok=0;
            }

    }
    // insertamos el archivo en la tabla archivos


}else{
    $message.="No se ha recibido ningun archivo\n";
    $ok=0;
}
 if ($cantarchivos>0) {
     $message.=" \n";
 }

 //$message =$file["tmp_name"].$_POST["nrocontratacion"].$file["name"];

# devolvemos un json con la información
//echo json_encode(array("ok"=>$ok,"message"=>$message, "nombre_archivo"=>$file["name"]));
echo $ok;
?>
