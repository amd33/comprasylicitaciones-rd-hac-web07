<?php
include("connecto2.php");

// 1. Validación: Asegurar que el ID proporcionado sea un entero positivo
$id = $_REQUEST["id"] ?? '';

if (!ctype_digit(strval($id)) || $id <= 0) {
    // Si envían texto, comillas o números negativos, bloqueamos la ejecución
    die("Error: ID de usuario inválido.");
}

try {
    // 2. Consultas Parametrizadas (Prepared Statements) para evitar Inyección SQL
    // Se usa el marcador '?' y se pasa el valor de forma segura
    $stmt = $db->prepare("UPDATE usuario SET habilitado = 1 WHERE id = ?");
    $stmt->execute([$id]);

    // Respuesta genérica de éxito
    echo "Usuario activado correctamente.";

} catch (Exception $e) {
    // Registro interno del error
    error_log("Error en activarUsuario.php: " . $e->getMessage());
    echo "Error interno al procesar la solicitud.";
}
?>
