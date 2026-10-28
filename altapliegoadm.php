<?php
include 'connecto2.php';

// PARCHE: Sanitización y captura de parámetros
$codigo = $_REQUEST['codigo'] ?? 0;
$titulo = $_REQUEST["titulo"] ?? '';
$tipo = $_REQUEST["tipo"] ?? 0;
$nrocontratacion = (isset($_REQUEST["nrocontratacion"]) && $_REQUEST["nrocontratacion"] != '') ? $_REQUEST["nrocontratacion"] : null;
$sector = $_REQUEST["sector"] ?? '';
$apertura = $_REQUEST["apertura"] ?? '';
$objeto = $_REQUEST["objeto"] ?? '';
$presupuesto = $_REQUEST["presupuesto"] ?? '';
$valor10 = (isset($_REQUEST["valor10"]) && $_REQUEST["valor10"] != '') ? $_REQUEST["valor10"] : null;
$usuario = (isset($_REQUEST["usuario"]) && $_REQUEST["usuario"] != '') ? $_REQUEST["usuario"] : null;
$fecha_ano = $_REQUEST['ano'] ?? date("Y");
$fechalimite = $_REQUEST["fechalimite"] ?? '';

/*
 * 1. VERIFICACIÓN: Usamos sentencia preparada para evitar Inyección SQL
 */
$sql = "SELECT count(*) as cant FROM licitacion WHERE id = ? AND tipo = ? AND ano = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$nrocontratacion, $tipo, $fecha_ano]);
$dato = $stmt->fetch();

if ($dato[0] > 0) {
    echo 1; // Error 1: ya existe la licitación
} 
else {
    try {
        // PARCHE: Iniciar transacción para asegurar que se graben los 3 inserts o ninguno
        $db->beginTransaction();

        $sector = str_replace(",", "", $sector); // Mantenemos tu lógica de limpieza

        // 2. INSERT LICITACION (Parametrizado)
        $insertLicitacion = "INSERT INTO licitacion (id, presupuesto, titulo, estado, valor, objeto, tipo, numero, ano, usuariocreador_id, nota, activa, codigo)
                             VALUES (?, ?, ?, 'PUBLICADA', ?, ?, ?, ?, ?, ?, '', 1, ?)";
        
        $stmtLicitacion = $db->prepare($insertLicitacion);
        $stmtLicitacion->execute([
            $nrocontratacion,
            $presupuesto,
            $titulo,
            $valor10,
            $objeto,
            $tipo,
            $nrocontratacion,
            $fecha_ano,
            $usuario,
            $codigo
        ]);

        // 3. INSERT APERTURA (Parametrizado)
        $insertApertura = "INSERT INTO apertura VALUES (?, ?, 'PRIMER LLAMADO', ?, ?)";
        $stmtApertura = $db->prepare($insertApertura);
        $stmtApertura->execute([$nrocontratacion, $apertura . ":00", $tipo, $fecha_ano]);

        // 4. INSERT FECHA LIMITE (Parametrizado)
        $insertLimite = "INSERT INTO apertura VALUES (?, ?, 'FECHA LIMITE DE COMPRA', ?, ?)";
        $stmtLimite = $db->prepare($insertLimite);
        $stmtLimite->execute([$nrocontratacion, $fechalimite . ":00", $tipo, $fecha_ano]);

        $db->commit();
        echo "0"; // Éxito

    } catch (Exception $e) {
        $db->rollBack();
        error_log("Error en creación de licitación: " . $e->getMessage());
        echo "Error al procesar el alta";
    }
}
?>
