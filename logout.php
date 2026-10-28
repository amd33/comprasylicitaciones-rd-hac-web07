<?php
    session_start();

	include("connecto2.php");

	$query="SELECT * FROM usuario where usuario = '".$_SESSION['usuario']."'";

	

	foreach ($db->query($query) as $row){

		$query_log="insert into log(id,fecha,accion,comentario,usuario_id)
		values((select coalesce(max(id),0) + 1 from log),CURRENT,'logout','usuario se desloguea del sistema',".$row[0].")";

		$db->query($query_log);
	
	}	


	session_unset();   
	session_destroy();  

	

	header('Location:index.php');

