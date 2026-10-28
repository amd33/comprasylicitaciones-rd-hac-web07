<?php

error_reporting(E_ALL);

  ini_set('display_errors', 1);

  putenv('INFORMIXDIR=/opt/IBM/informix'); 
  putenv('DBDATE=dmy4/'); 
  $db = new PDO("informix:host=db;service=munivl_tcp;database=recaudaciones;server=munivl_tcp;protocol=onsoctcp;EnableScrollableCursors=1;","tribunal","tribunal");
  

?>
