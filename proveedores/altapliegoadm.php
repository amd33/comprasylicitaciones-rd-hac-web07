<?php 

error_reporting(E_ALL);

  ini_set('display_errors', 1);

  //putenv('INFORMIXDIR=/opt/informix'); 
  putenv('INFORMIXDIR==/opt/IBM/informix'); 
  putenv('DBDATE=dmy4/'); 
  $db = new PDO("informix:host=db;service=munivl_tcp;database=compras2;server=munivl_tcp;protocol=onsoctcp;EnableScrollableCursors=1;","npiersanti","nicolasjorgepier");

  $titulo = $_REQUEST["titulo"];
  $tipo = $_REQUEST["tipo"];
  $nrocontratacion = $_REQUEST["nrocontratacion"];
  $sector = $_REQUEST["sector"];
  $apertura = $_REQUEST["apertura"];
  $objeto = $_REQUEST["objeto"];
  $presupuesto = $_REQUEST["presupuesto"];
  $valor10 = $_REQUEST["valor10"];
  $usuario = $_REQUEST["usuario"];

  
  $fechalimite= $_REQUEST["fechalimite"];
  
 

$sector = str_replace(",", "", $sector);
$año = date("y");

$insertlicitacion ='INSERT INTO licitacion VALUES('.$nrocontratacion.',"'.$presupuesto.'","'.$titulo.'","PUBLICADA",'.$valor10.',"'.$objeto.'","'.$tipo.'",'.$nrocontratacion.',"'.$usuario.'" )';
//echo $selecttransac;

$insertapertura ='INSERT INTO apertura VALUES('.$nrocontratacion.',"'.$apertura.':00","PRIMER LLAMADO" )';


$insertlimite ='INSERT INTO apertura VALUES('.$nrocontratacion.',"'.$fechalimite.':00","FECHA LIMITE DE COMPRA" )';


// echo $_REQUEST["titulo"].$_REQUEST["tipo"].$_REQUEST["nrocontratacion"].$_REQUEST["sector"].$_REQUEST["apertura"].$_REQUEST["objeto"].$_REQUEST["presupuesto"].$_REQUEST["valor10"].$_REQUEST["usuario"];

// echo $insertlicitacion;
// echo $insertapertura; 
// echo $insertlimite;
// exit();
  $db->query($insertlicitacion);
  $db->query($insertapertura);
   $db->query($insertlimite);




echo "0";
   	
	      

?>
