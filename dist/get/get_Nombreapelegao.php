<?php
include('../conect.php');


$query = 	"SELECT * FROM desasocial.usuarios_desasocial;";



$result = pg_query($db, $query);

while($filas =pg_fetch_array($result)){
	$n_legajo = $filas['n_legajo'];
	$d_nombre = $filas['d_nombre'];
	$d_apellido =$filas['d_apellido'];


	echo '<option value='.$filas["n_legajo"].'>'.$filas["d_nombre"].' '.$filas["d_apellido"].' - '.$filas["n_legajo"].'</option>';
}







?>