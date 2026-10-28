<?php 

error_reporting(E_ALL);

  ini_set('display_errors', 1);

  putenv('INFORMIXDIR=/opt/IBM/informix'); 
  putenv('DBDATE=dmy4/'); 
  #$db = new PDO("informix:host=db;service=munivl_tcp;database=compras2;server=munivl_tcp;protocol=onsoctcp;EnableScrollableCursors=1;","tribunal","tribunal");

 $db = new PDO("informix:host=db;service=munivl_tcp;database=compras2;server=munivl_tcp;protocol=onsoctcp;EnableScrollableCursors=1;","licibweb","20liciweb23");

 
  $nrocontratacion = $_REQUEST["nrocontratacion"];

  $objeto = $_REQUEST["objeto"];

  
  $fechalimite= $_REQUEST["fechalimite"];
  
$insertapertura ='INSERT INTO apertura VALUES('.$nrocontratacion.',"'.$fechalimite.':00","'.$objeto.'" )';


  
  $db->query($insertapertura);
 




echo "0";
   	
	      

?>
