<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

ini_set('display_errors', 0);
error_reporting(0);

header('Content-Type: application/json');
include 'conect.php';

$p = $_POST;

// Campos que DEBEN venir sí o sí [cite: 70, 88, 105]
$campos_obligatorios = [
    "domiciliopostalcodigopostal", "domiciliopostallocalidad", "domiciliopostalcalle", "domiciliopostalnumero",
    "domiciliolegalcodigopostal", "domiciliolegallocalidad", "domiciliolegalcalle", "domiciliolegalnumero",
    "informacionfiscalcuit", "informacionfiscalrazonsocial", "informacionpersonaltelefono",
    "informacionfiscalsituacion", "informacionpersonalcontraseña", "informacionpersonalemail",
    "municipiosmunicipio"
];

foreach ($campos_obligatorios as $campo) {
    if (!isset($p[$campo]) || empty(trim($p[$campo]))) {
        echo json_encode(array("ok" => 0, "message" => "Falta el campo: $campo"));
        exit;
    }
}

// Lógica condicional del parche [cite: 100, 113]
if ($p["municipiosmunicipio"] === "vl") {
    if (empty(trim($p["municipiosnhabilitacion"])) || empty(trim($p["municipiosnpadron"]))) {
        echo json_encode(array("ok" => 0, "message" => "Faltan datos de Vicente Lopez"));
        exit;
    }
} else {
    $p["municipiosnhabilitacion"] = '0';
    $p["municipiosnpadron"] = '0';
}

// Variables opcionales para evitar "Undefined index" [cite: 61, 78, 79]
$p["domiciliopostalpiso"] = $p["domiciliopostalpiso"] ?? '';
$p["domiciliopostaldepartamento"] = $p["domiciliopostaldepartamento"] ?? '';
$p["domiciliolegalpiso"] = $p["domiciliolegalpiso"] ?? '';
$p["domiciliolegaldepartamento"] = $p["domiciliolegaldepartamento"] ?? '';
$iibb = $p["informacionfiscalingresosbrutos"] ?? '0';

try {
    $db->beginTransaction();

    // Domicilio Postal
    $stmt1 = $db->prepare("INSERT INTO DOMICILIO VALUES (0, ?, ?, ?, ?, ?, ?)");
    $stmt1->execute([
        $p["domiciliopostalcodigopostal"], $p["domiciliopostallocalidad"], $p["domiciliopostaldepartamento"],
        $p["domiciliopostalpiso"], $p["domiciliopostalcalle"], $p["domiciliopostalnumero"]
    ]);
    $id_postal = $db->lastInsertId();

    // Domicilio Legal
    $stmt2 = $db->prepare("INSERT INTO DOMICILIO VALUES (0, ?, ?, ?, ?, ?, ?)");
    $stmt2->execute([
        $p["domiciliolegalcodigopostal"], $p["domiciliolegallocalidad"], $p["domiciliolegaldepartamento"],
        $p["domiciliolegalpiso"], $p["domiciliolegalcalle"], $p["domiciliolegalnumero"]
    ]);
    $id_legal = $db->lastInsertId();

    // Agente [cite: 54, 96, 114]
    $cuit = str_replace("-", "", $p["informacionfiscalcuit"]);
    $tel = str_replace("-", "", $p["informacionpersonaltelefono"]);
    $pass = md5($p["informacionpersonalcontraseña"]);

    $stmt3 = $db->prepare("INSERT INTO AGENTE VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Alta Postulante')");
    $stmt3->execute([
        $iibb, $cuit, $p["informacionfiscalrazonsocial"], $tel, $p["informacionfiscalsituacion"],
        $pass, $p["informacionpersonalemail"], $id_postal, $id_legal, 
        $p["municipiosmunicipio"], $p["municipiosnhabilitacion"], $p["municipiosnpadron"]
    ]);
    $agente_id = $db->lastInsertId();

    // Postulante
    if ($agente_id) {
        $stmt4 = $db->prepare("INSERT INTO POSTULANTE VALUES (?, 0)");
        $stmt4->execute([$agente_id]);
    }

    $db->commit();
    echo json_encode(array("ok" => 1, "message" => "Alta exitosa"));

} catch (Exception $e) {
    if ($db->inTransaction()) $db->rollBack();
    error_log("Error: " . $e->getMessage()); // [cite: 40, 98, 115]
    echo json_encode(array("ok" => 0, "message" => "Error en DB"));
}
?>
