<?php
/**
 * Prueba de conexión a Informix vía PDO_ODBC (sin odbc.ini).
 * Conecta, ejecuta un SELECT sobre la tabla licitacion y muestra los resultados.
 * BORRAR del servidor después de probar (contiene usuario y clave).
 */
header('Content-Type: text/html; charset=UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ---------------- CONFIGURACIÓN ----------------
$USUARIO  = 'pliegos';
$PASSWORD = 'Py5743T_8';
$TABLA    = 'licitacion';
$LIMITE   = 20;

putenv('INFORMIXDIR=/opt/IBM/informix');
putenv('DBDATE=dmy4/');
putenv('CLIENT_LOCALE=en_US.8859-1');
putenv('DB_LOCALE=en_US.8859-1');

$DSN = "odbc:DRIVER={Informix};" .
    "SERVER=munivl_tcp;" .
    "DATABASE=compras2;" .
    "HOST=192.9.200.5;" .
    "SERVICE=munivl_tcp;" .
    "PROTOCOL=onsoctcp;" .
    "CLIENT_LOCALE=en_US.8859-1;" .
    "DB_LOCALE=en_US.8859-1;" .
    "EnableScrollableCursors=1;";
// -----------------------------------------------

function h($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

echo '<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Test ODBC Informix</title>
<style>
body{font-family:Arial,sans-serif;margin:20px;background:#f5f5f7;color:#222}
.ok{color:#0a7d2c;font-weight:bold}.err{color:#b00020;font-weight:bold}
table{border-collapse:collapse;background:#fff;margin-top:10px}
th,td{border:1px solid #ccc;padding:5px 9px;font-size:13px}
th{background:#583584;color:#fff}
.box{background:#fff;border:1px solid #ddd;padding:10px;margin:8px 0}
</style></head><body><h2>Prueba de conexión ODBC → Informix</h2>';

echo '<div class="box">PHP ' . h(PHP_VERSION) . ' | pdo_odbc: '
   . (extension_loaded('pdo_odbc') ? '<span class="ok">cargada</span>' : '<span class="err">NO cargada</span>')
   . ' | Usuario del proceso: ' . h(function_exists('posix_getpwuid') ? posix_getpwuid(posix_geteuid())['name'] : get_current_user())
   . '</div>';
flush();

try {
    $db = new PDO($DSN, $USUARIO, $PASSWORD, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE               => PDO::CASE_UPPER,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    echo '<p class="ok">Conexión OK</p>';
    flush();

    $sql  = "SELECT FIRST $LIMITE * FROM $TABLA";
    $rows = $db->query($sql)->fetchAll();

    echo '<p>Consulta: <code>' . h($sql) . '</code> → <b>' . count($rows) . '</b> filas</p>';

    if ($rows) {
        echo '<table><tr>';
        foreach (array_keys($rows[0]) as $col) echo '<th>' . h($col) . '</th>';
        echo '</tr>';
        foreach ($rows as $r) {
            echo '<tr>';
            foreach ($r as $v) echo '<td>' . h(trim((string)$v)) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>La tabla no devolvió filas.</p>';
    }
} catch (PDOException $e) {
    echo '<p class="err">Error: ' . h($e->getMessage()) . '</p>';
}

echo '<p><small>Eliminar este archivo después de la prueba.</small></p></body></html>';
