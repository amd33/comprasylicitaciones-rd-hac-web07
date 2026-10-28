<?php
/**
 * Versión Protegida - Validación LDAP
 */

function validarPasswd($dn, $passwd, $conn) {
    // Usamos @ para silenciar warnings que podrían revelar rutas en el navegador
    $ok = @ldap_bind($conn, $dn, $passwd);
    return $ok;
}

// PARCHE: El servidor debería estar en una variable de entorno o config protegida
$ldapserver = 'mvlcuvldc01.vicentelopez.gov.ar';

// PARCHE: Sanitización estricta de entradas para evitar XSS Reflejado
// Aunque sea para LDAP, si estos datos se imprimen en algún error, deben estar limpios.
$ldapuser = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
$ldappass = $_REQUEST['password']; // No se sanitiza porque es una contraseña, pero se trata con cuidado

// PARCHE: Evitar mensajes de error informativos (CWE-209)
// Quitamos el 'or die("Could not connect...")' que revela la tecnología.
$ldapconn = @ldap_connect($ldapserver);

if (!$ldapconn) {
    // Log interno para el administrador, no para el usuario
    error_log("Error de conexión LDAP: No se pudo conectar a $ldapserver");
    echo '0'; // Respondemos con falla genérica
    exit;
}

// Configuración de seguridad adicional para LDAP
@ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
@ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

$ok = validarPasswd($ldapuser, $ldappass, $ldapconn);

if ($ok) {
    echo '1';
} else {
    // No revelamos si el usuario existe o si la clave es la mal, solo damos un '0'
    echo '0';
}

// Cerramos conexión
@ldap_close($ldapconn);
?>
