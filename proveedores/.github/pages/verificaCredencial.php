<?php
  include("../conect.php");
  $AGENTE="SELECT cuit,razonsocial,responsabilidad,correo FROM AGENTE WHERE id IN (SELECT id  FROM postulante)";
  echo "string";
  
  foreach ($db->query($AGENTE) as $row) {
    
    }
  ?>