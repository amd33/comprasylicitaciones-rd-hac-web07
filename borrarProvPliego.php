<?php
include("connecto2.php");

// 1. Captura y validación de tipos (Aseguramos que sean números)
$id_pliego    = filter_var($_REQUEST["idpliego"], FILTER_SANITIZE_NUMBER_INT);
$tipo         = filter_var($_REQUEST["tipo"], FILTER_SANITIZE_NUMBER_INT);
$nroproveedor = filter_var($_REQUEST["nroproveedor"], FILTER_SANITIZE_NUMBER_INT);
$ano_pliego   = filter_var($_REQUEST["anopliego"], FILTER_SANITIZE_NUMBER_INT);

// Verificamos que no estén vacíos
if (!$id_pliego || !$tipo || !$nroproveedor || !$ano_pliego) {
    die("Parámetros insuficientes o inválidos.");
}

try {
    // 2. PARCHE SQL INJECTION: Usamos Sentencias Preparadas (PDO)
    $sql = "DELETE FROM proveedor_pliego 
            WHERE id_pliego = ? AND tipo = ? AND nro_proveedor = ? AND ano = ?";
    
    $stmt = $db->prepare($sql);
    $stmt->execute([$id_pliego, $tipo, $nroproveedor, $ano_pliego]);

    // 3. PARCHE XSS Y FUGA DE INFO: 
    // JAMÁS hacemos echo de la consulta ($borrarpliego)
    echo "Registro eliminado correctamente.";

} catch (Exception $e) {
    // Log interno del error, respuesta genérica al cliente
    error_log("Error al borrar pliego: " . $e->getMessage());
    echo "Error procesando la solicitud.";
}
?>
