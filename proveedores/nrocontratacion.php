<?php

  include("conect.php");
  $AGENTE="SELECT max(id) as ID FROM licitacion where id =".$_REQUEST['titulo'];
  
  foreach ($db->query($AGENTE) as $row){

    echo $row['ID']; 
  }
?>