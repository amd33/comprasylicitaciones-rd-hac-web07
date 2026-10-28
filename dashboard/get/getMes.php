<?php 
include("../conect.php");
$tienedato = 0;
if (isset($_REQUEST['anio'])) {
	
	$query = 'SELECT * from cupos_cursos_manipulacion WHERE n_ano='.$_REQUEST['anio'];

	foreach ($db -> query($query) as $resultadoquery) {
		$my_array[] =  $resultadoquery['N_MES'];
	}

	if (sizeof($my_array)==0) {
		$my_array = array('1','2','3','4','5','6','7','8','9','10','11','12');
	}else{
		$my_array = array_diff(array('1','2','3','4','5','6','7','8','9','10','11','12'), $my_array);
	}

	foreach ($my_array as $valor) {
		if ($tienedato == 0) {
			echo '<option value="">SELECCIONE UN PERÍODO</option>';
			$tienedato = 1;
		}
		
		echo '<option value="'.$valor.'">'.$valor.' </option>';
	}
		if ($tienedato == 0) {
			echo '<option value="">No existen períodos adeudados</option>';
		}
}

?>