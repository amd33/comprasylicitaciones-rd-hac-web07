<?php
include 'conect.php';
 
if(!isset($_POST['cuit']))
  echo "Error cuit no valido";die;

$select ="SELECT ID FROM AGENTE WHERE cuit =".str_replace("-", "", $_POST["cuit"]);
foreach ($db->query($select) as $row) {

    echo "1";
   
 }   

?>
