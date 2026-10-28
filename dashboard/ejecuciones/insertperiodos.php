
<?php 
include("../conect.php");

if (isset($_REQUEST['cupo'])) {
	$query = 'INSERT INTO cupos_cursos_manipulacion VALUES('.$_REQUEST['cupo'].','.$_REQUEST['anio'].','.$_REQUEST['mes'].');';

	$db -> query($query);
}

?>