<?php
$mysqli = new mysqli('prd-hac-mysql01.vicentelopez.gov.ar', 'nico.piersanti', 'AcN*p20a', 'db_prov_lic');

/* comprobar la conexión */
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}

/* Crear una tabla que no devuelve un conjunto de resultados */


/* Consultas de selección que devuelven un conjunto de resultados */
if ($resultado = $mysqli->query("SELECT * FROM LICITACION WHERE  OBJETO like 'servicio de sepelios para indigentes'")) {

    
    while ($fila = $resultado->fetch_row()) {
    	//print_r($fila);
    	echo "<br>";
    	echo "LICITACION";
    	echo "<br>";
        echo $fila[0]. " - ". $fila[1]. " - ".$fila[2]. " - ".$fila[3]. " - ". $fila[4]. " - ".$fila[5]. " - ". $fila[6]. " - ". $fila[7]. " - ". $fila[8];
        echo "<br>";
    }
    /* liberar el conjunto de resultados */
    $resultado->close();
}

/* Consultas de selección que devuelven un conjunto de resultados */
if ($resultado = $mysqli->query("SELECT * FROM LOG WHERE licitacion  = 123787")) {

    echo "LOG";
    echo "<br>";
    while ($fila = $resultado->fetch_row()) {
    	//print_r($fila);
        echo $fila[0]. " - ". $fila[1]. " - ".$fila[2]. " - ".$fila[3]. " - ". $fila[4]. " - ".$fila[5]. " - ". $fila[6]. " - ". $fila[7]. " - ". $fila[8];
        echo "<br>";
    }
    /* liberar el conjunto de resultados */
    $resultado->close();
}
/* Si se ha de recuperar una gran cantidad de datos se emplea MYSQLI_USE_RESULT */

/* Consultas de selección que devuelven un conjunto de resultados */
if ($resultado = $mysqli->query("SELECT * FROM LICITACION_PLIEGO WHERE Licitacion_ID  = 123787")) {

    echo "LICITACIONPLIEGO";
    echo "<br>";
    while ($fila = $resultado->fetch_row()) {
    	//print_r($fila);
        echo $fila[0]. " - ". $fila[1]. " - ".$fila[2]. " - ".$fila[3]. " - ". $fila[4]. " - ".$fila[5]. " - ". $fila[6]. " - ". $fila[7]. " - ". $fila[8];
        echo "<br>";
    }
    /* liberar el conjunto de resultados */
    $resultado->close();
}

$mysqli->close();
?>