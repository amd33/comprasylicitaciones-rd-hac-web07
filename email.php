<?php
/**
 * Versión Protegida - email.php
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// 1. Evitar acceso directo por GET si se espera una acción de formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Acceso no permitido');
}

$mail = new PHPMailer(true);

try {
    // PARCHE: SMTPDebug en 0 para producción. El nivel 2 revela rutas y nombres de servidores.
    $mail->SMTPDebug = 0; 
    $mail->isSMTP();
    
    // PARCHE: Lo ideal es usar una constante definida en un archivo de configuración 
    // fuera del directorio web o una variable de entorno.
    $mail->Host = getenv('SMTP_HOST') ?: 'localhost'; 
    
    $mail->SMTPAuth = false;
    $mail->SMTPAutoTLS = false;
    $mail->Port = 25;

    // 2. Saneamiento de entradas (Prevención de XSS e Inyección)
    $emailDestino = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    $razonSocial = htmlspecialchars($_REQUEST['razonsocial'], ENT_QUOTES, 'UTF-8');
    $textoCuerpo = htmlspecialchars($_REQUEST['texto'], ENT_QUOTES, 'UTF-8');

    if (!filter_var($emailDestino, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Dirección de correo inválida.");
    }

    $mail->setFrom('no-reply@vicentelopez.gov.ar', 'Compras y Licitaciones');
    $mail->addAddress($emailDestino);
    
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Alta Proveedor - Municipalidad de Vicente López';

    // 3. Uso de plantilla con datos escapados
    $mail->Body = '
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 10px solid #583584; border-collapse: collapse;">
                    <tr>
                        <td bgcolor="#583584" style="padding: 15px; color: #ffffff;">
                            <strong>Secretaría de Hacienda / Compras y Licitaciones</strong>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px;">
                            <h2 style="color: #153643;">Hola ' . $razonSocial . '</h2>
                            <p style="color: #153643; font-size: 16px; line-height: 24px;">
                                ' . nl2br($textoCuerpo) . '
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#583584" style="padding: 20px; text-align: center;">
                            <a href="https://www.vicentelopez.gov.ar" style="color: #ffffff; text-decoration: none;">Vicente López</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';

    $mail->send();
    echo "Correo enviado con éxito.";

} catch (Exception $e) {
    // PARCHE: No mostrar el mensaje de error real ($e->getMessage()) al usuario
    // para no revelar detalles técnicos del servidor SMTP.
    error_log("Error de envío: " . $e->getMessage()); 
    echo 'Hubo un error al procesar la solicitud.';
}
