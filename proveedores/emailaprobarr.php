<?php
/**
 * Created by PhpStorm.
 * User: elporfirio
 * Date: 2019-02-26
 * Time: 23:04
 */
//$mail = $_REQUEST['email'];
//$razon = $_REQUEST['razonsocial']

$mail = "nicolas.piersanti@vicentelopez.gov.ar";
$razon = "verga";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'prd-mod-smtp02.vicentelopez.gov.ar';
    $mail->SMTPAuth = false;
	$mail->SMTPAutoTLS = false; 
    $mail->Port = 25;
    ## MENSAJE A ENVIAR
    $mail->setFrom('no-reply@vicentelopez.gov.ar');
    $mail->addAddress($mail);
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Alta Proveedor finalizada!';
    $mail->Body = 'asdfasdf';
    $mail->send();
} catch (Exception $exception) {
    echo 'Algo salio mal', $exception->getMessage();
}