<?php

$and_tipo = "";
if (isset($_REQUEST['tipo']) and $_REQUEST['tipo'] !='' and $_REQUEST['tipo'] !=-1){
    $and_tipo = " and tipo = ".$_REQUEST['tipo'];
}



  include("connecto2.php");
  $sql="SELECT count(*) as cant
        FROM licitacion
        where id =".$_REQUEST['nrocontratacion'].$and_tipo;


//echo $sql;

 // echo "<br>";

  foreach ($db->query($sql) as $row){

    echo $row[0];
  }
