<?php 



  putenv('INFORMIXDIR=/opt/IBM/informix'); 
  putenv('DBDATE=dmy4/'); 
  #$db = new PDO("informix:host=db;service=munivl_tcp;database=compras2;server=munivl_tcp;protocol=onsoctcp;EnableScrollableCursors=1;","tribunal","tribunal");
$db = new PDO("informix:host=db;service=munivl_tcp;database=compras2;server=munivl_tcp;protocol=onsoctcp;EnableScrollableCursors=1;","licibweb","20liciweb23");

$nrocontratacion = $_REQUEST["nrocontratacion"];
$nombrearchivo = $_REQUEST["nombre_archivo"];
$fecha = date("Y-m-d H:i:s");
  

$nombrearchivo =$_REQUEST[""];
  
$insertarchivo = 'INSERT INTO archivos VALUES('.$nrocontratacion.'"'.$nombrearchivo.'",'.$fecha.')';



$db->query($insertarchivo);




echo "0";
   	
	      

?>
