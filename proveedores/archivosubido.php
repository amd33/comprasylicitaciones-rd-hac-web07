<?php
include 'conect.php';
 
            
$message="";
 
// si vale 1 todo ha ido bien, 0 ha habido algun problema
$ok=1;
$cantarchivos=0;
 
if($_FILES)
{
    foreach($_FILES as $file)
    {
        if($file["error"]==UPLOAD_ERR_OK)
        {

            // movemos el archivo a la carpeta donde se encuentra este archivo
            move_uploaded_file($file["tmp_name"], "archivos/".str_replace("-", "", $_POST["informacionfiscalcuit"])."-".str_replace("-", "", $file["name"]));
            $message.="El archivo ".$file["name"]." se ha recibido correctamente\n";
            $cantarchivos++;
        }else {
             $message.="¡Error al subir el archivo!\n";
             $ok=0;
            }
    }
}else{
    $message.="No se ha recibido ningun archivo\n";
    $ok=0;
}
 if ($cantarchivos>0) {
     $message.=" \n";
 }
# devolvemos un json con la información
echo json_encode(array("ok"=>$ok,"message"=>$message));
?>