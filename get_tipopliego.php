<?php

include("connecto2.php");

// $stmt = $this->$db-> prepare("SELECT * FROM tipopliego");
// $stmt->execute();
 $query_pliego="SELECT * FROM tipo_pliego";

  foreach ($db->query($query_pliego) as $row){

    //echo ("hola");
    //echo ($row[0]);
    //echo ($row[1]);
     echo '<option value='.$row[0].'>'.$row[1].'</option>';

  }



  
//   while($resultado = $stmt->fetch(PDO:: FETCH_ASSOC)){
//       echo ("hola");
//       echo $resultado["codigo"];
//      print_r($resultado["codigo"]);
//       //echo '<option value='.$resultado["codigo"].'>'.$resultado["descripcion"].'</option>';
    
//   }


?>


