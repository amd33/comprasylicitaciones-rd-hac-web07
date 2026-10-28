<?php 
	include('../conect.php');
	$c_calle = $_REQUEST["c_calle"];
	$query = 'SELECT * FROM recaudaciones:calles_alturas
				WHERE c_calle = '.$c_calle.';';
	// echo $query;
	// die;
	foreach ($db1 -> query($query) as $resultadoquery) {
		echo trim($resultadoquery['D_CALLE']);
		//echo '<option data-codigocalle="'.$c_calle.'" value="'.trim($resultadoquery['D_CALLE']).'">';
	}

?>