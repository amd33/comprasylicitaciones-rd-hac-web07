<?php
  include("conect.php");
  $cuit=$_REQUEST["cuit"];



	$insert="UPDATE agente SET cuit ='-".$cuit."' WHERE cuit =".$cuit;
	//echo $insert;
	$db->query($insert);

  
  ?>