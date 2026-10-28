<?php
include 'conect.php';

if (!isset($_REQUEST["cuit"]) || !isset($_REQUEST["datita"])) {
    exit("Parámetros requeridos faltantes.");
}

$cuitSaneado = str_replace("-", "", $_REQUEST["cuit"]);
if (!preg_match('/^[0-9]{11}$/', $cuitSaneado)) {
    exit("CUIT inválido."); 
}

$datita = filter_var($_REQUEST["datita"], FILTER_SANITIZE_NUMBER_INT);

try {
    $stmtAgente = $db->prepare("SELECT ID FROM AGENTE WHERE cuit = ?");
    $stmtAgente->execute([$cuitSaneado]);
    $agentes = $stmtAgente->fetchAll();


    foreach ($agentes as $sarasa) {
        
        $stmtActividad = $db->prepare("SELECT DESC_ACTIVIDAD FROM actividades WHERE cod_actividad = ?");
        $stmtActividad->execute([$datita]);
        $actividades = $stmtActividad->fetchAll();

        foreach ($actividades as $row) {
            $stmtInsert = $db->prepare("INSERT INTO RUBRO (agente_id, descripcion, cod_actividad) VALUES (?, ?, ?)");
            $stmtInsert->execute([
                $sarasa['ID'], 
                $row['DESC_ACTIVIDAD'], 
                $datita
            ]);
            
        }
    }
    
    echo "Proceso completado exitosamente.";

} catch (Exception $e) {
    error_log("Error en rubros.php: " . $e->getMessage()); 
    echo "Error procesando la solicitud.";
}
?>
