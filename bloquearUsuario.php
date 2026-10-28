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
    // Se usa el marcador '?' en lugar de concatenar la variable directamente
    $stmt = $db->prepare("UPDATE usuario SET habilitado = 0 WHERE id = ?");
    $stmt->execute([$id]);

    // Respuesta genérica de éxito
    echo "Usuario bloqueado correctamente.";

} catch (Exception $e) {
    // Registro interno del error, pero sin mostrar detalles técnicos al usuario
    error_log("Error en bloquearUsuario.php: " . $e->getMessage());
    echo "Error interno al procesar la solicitud.";
}
?>
