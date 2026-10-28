<?php
include 'conect.php';
$cuit = preg_replace("/[^0-9]/", "",$_REQUEST["cuit"])
$stmtAgente = $db->prepare("SELECT * FROM AGENTE WHERE cuit = ?");
$stmtAgente->execute([$cuit]);
foreach foreach ($stmtAgente as $row) {

    $stmtRubro = $db->prepare("SELECT * FROM RUBRO WHERE id = ?");
    $stmtRubro->execute([$row['ID']]);
    foreach ($stmtRubro as $rowselectrubro) {
        echo $rowselectrubro["FK_PARENT_RUBRO"]." - ".$rowselectrubro["NOMBRE"];
        echo "<br>";
    }
}
?>

