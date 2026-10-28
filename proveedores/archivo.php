<?php
include 'conect.php';
 
/*
:       $("#domiciliopostalcalle").val(),
:        $("#domiciliopostalnumero").val(),
:          $("#domiciliopostallocalidad").val(),
:         $("#domiciliopostalcodigopostal").val(),
:          $("#domiciliopostaldepartamento").val(),
:         $("#domiciliopostalpiso").val(),


:         $("#domiciliolegalcalle").val(),
:       $("#domiciliolegalnumero").val(),
:     $("#domiciliolegallocalidad").val(),
:          $("#domiciliolegalcodigopostal").val(),
:     $("#domiciliolegalpiso").val(),
:          $("#domiciliolegaldepartamento").val(),


optlist1:       $("#optlist1").val()
*/
 $exist=444;
   

if($exist!=124)
{
   $insert="INSERT INTO DOMICILIO            
             VALUES (0,'".$_POST["domiciliopostalcodigopostal"]."','".$_POST["domiciliopostallocalidad"]."','".$_POST["domiciliopostaldepartamento"]."','".$_POST["domiciliopostalpiso"]."','".$_POST["domiciliopostalcalle"]."',".$_POST["domiciliopostalnumero"].") ";
$db->query($insert);
$select ="SELECT max(ID) as ID FROM DOMICILIO ";
foreach ($db->query($select) as $row) {
    $domiciliocomercial_id= $row['ID'];

 }   
 if (!isset($domiciliocomercial_id)) {
    echo json_encode(array("ok"=>0,"message"=>"DOMICILIO POSTAL"));
    exit();
 }
$insert="INSERT INTO DOMICILIO            
             VALUES (0,'".$_POST["domiciliolegalcodigopostal"]."','".$_POST["domiciliolegallocalidad"]."','".$_POST["domiciliolegaldepartamento"]."','".$_POST["domiciliolegalpiso"]."','".$_POST["domiciliolegalcalle"]."',".$_POST["domiciliolegalnumero"].")  ";
$db->query($insert);
$select ="SELECT max(ID) as ID FROM DOMICILIO ";
foreach ($db->query($select) as $row) {
    $domiciliolegal_id= $row['ID'];

 }   
 if (!isset($domiciliolegal_id)) {
    echo json_encode(array("ok"=>0,"message"=>"DOMICILIO LEGAL"));
    exit();
 }
$insert="INSERT INTO AGENTE            
             VALUES (0,".$_POST["informacionfiscalingresosbrutos"].",".str_replace("-", "", $_POST["informacionfiscalcuit"]).",'".$_POST["informacionfiscalrazonsocial"]."',".str_replace("-", "", $_POST["informacionpersonaltelefono"]).",'".$_POST["informacionfiscalsituacion"]."','".md5($_POST["informacionpersonalcontraseña"])."','".$_POST["informacionpersonalemail"]."',".$domiciliocomercial_id.",".$domiciliolegal_id.",'".$_POST["municipiosmunicipio"]."',".$_POST["municipiosnhabilitacion"].",".$_POST["municipiosnpadron"].",'Alta Postulante')  ";
$db->query($insert);


$select ="SELECT ID FROM AGENTE WHERE cuit =".str_replace("-", "", $_POST["informacionfiscalcuit"]);
foreach ($db->query($select) as $row) {
    $insertpostulante="INSERT INTO POSTULANTE  VALUES (".$row['ID'].",0)";
    $db->query($insertpostulante);

 }               
$message="";
 
// si vale 1 todo ha ido bien, 0 ha habido algun problema
$ok=1;
$cantarchivos=0;
 
# devolvemos un json con la información
echo json_encode(array("ok"=>$ok,"Se dio de alta con exito!"=>$message));
}


?>