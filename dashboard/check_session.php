<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
    // Si no hay sesión, usamos un meta-refresh de respaldo y JS.
    // Es más amigable con los proxies que el comando header directo.
    echo '<!DOCTYPE html><html><head><meta http-equiv="refresh"
content="0;url=../index.php"><script>window.location.href="../index.php";</script></head><body></body></html>';
    exit();
}

