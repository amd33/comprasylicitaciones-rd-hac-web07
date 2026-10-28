<?php
echo "hola";
$tns = " 
(DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = 192.9.103.53)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SERVICE_NAME = MVLopez)
    )
  )
       ";

$username = "reportesnm";
$password= "r3p0rt3snm";

function testdb_connect ($tns,$username,$password){
    $dbh = new PDO("oci:dbname=".$tns, $username, $password);
    
    
    return $dbh;
}

try {
    $dbh = testdb_connect ($tns,$username, $password);
    //echo 'Connected to database';
} catch(PDOException $e) {
    echo $e->getMessage();
}
echo "<table border='1'>\n";
foreach ($dbh->query(" select ejercicio, fech_mov, DENO_JURIS,
DENO_PROGRAMA,
DENO_PROYECTO,
DENO_OBRA,
DENO_FUENTE,
DENO_INCISO,
DENO_PAR_PRIN,
DENO_PAR_PARC,
DENO_PAR_SUBP,
CREDITO_INIC,
IMPOR_MODIF,
IMPOR_PREVEN,
IMPOR_COMPRO,
IMPOR_DEVEN,
IMPOR_PAGA,
PREV_NRO_SOLIC,
PREV_NRO_PED,
COMP_NRO_REG_COMP,
COMP_NRO_OC,
DEV_NRO_REG_DEVEN,
PAG_NRO_OP,
REIN_NRO_REINT,
REGUL_NRO_REGUL,
OPEA_NRO_OPEA,
NVL(COMP_RAZON_SOCIAL, NVL(PAG_RAZON_SOCIAL, NVL(REIN_RAZON_SOCIAL, NVL(REGUL_RAZON_SOCIAL, OPEA_RAZON_SOCIAL)))) as RAZON_SOCIAL,
NVL(MODI_TIPO_DOC, NVL(PREV_TIPO_DOC, NVL(COMP_TIPO_DOC, NVL(DEV_TIPO_DOC, NVL(PAG_TIPO_DOC, NVL(REIN_TIPO_DOC, NVL(REGUL_TIPO_DOC, OPEA_TIPO_DOC))))))) as TIPO_DOC,
NVL(PREV_nro_DOC, NVL(COMP_nro_DOC, NVL(DEV_nro_DOC, NVL(PAG_nro_DOC, NVL(REIN_nro_DOC, NVL(REGUL_nro_DOC, OPEA_nro_DOC)))))) as NRO_DOC,
NVL(MODI_anio_DOC, NVL(PREV_anio_DOC, NVL(COMP_anio_DOC, NVL(DEV_anio_DOC, NVL(PAG_anio_DOC, NVL(REIN_anio_DOC, NVL(REGUL_anio_DOC, OPEA_anio_DOC))))))) as ANIO_DOC,
CONCEPTO_1, OBSERVACIONES_2
from tmp_det_gasto_parte2
WHERE ROWNUM <= 1
AND") as $row) {
  echo "<tr>\n";
  foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "</td>\n";
    }
  echo "</tr>\n";
  echo "<br>";
}
echo "</table>\n";
?>
