<?php
include 'conect.php';
 

$select ="SELECT ID FROM AGENTE WHERE cuit =".str_replace("-", "", $_POST["cuit"]);
foreach ($db->query($select) as $row) {

    echo "1";
   
 }   

?>