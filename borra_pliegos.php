<?php

include 'connecto2.php';

//$del_licitacion = " delete from licitacion";
$del_apertura = " DELETE FROM apertura";


//$db->query($del_licitacion);
$db->query($del_apertura);

echo "borrado aperturas";
