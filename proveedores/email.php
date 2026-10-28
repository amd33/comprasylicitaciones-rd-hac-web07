<?php
/**
 * Created by PhpStorm.
 * User: elporfirio
 * Date: 2019-02-26
 * Time: 23:04
 */
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
    $mail->addAddress($_REQUEST['email']);
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Alta Proveedor';
    $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Demystifying Email Design</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 10px solid #583584; border-collapse: collapse;">
                    <tr>
                        <td bgcolor="#583584" style=" text-transform: uppercase;padding: 15px 5px 15px 5px;text-align:left; color: #ffffff; font-size: 14px; font-family: Arial, sans-serif;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td width="260" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td style="text-align:left; letter-spacing: 0.1em;">
                                                                Secretaria de hacienda
                                                            </td>
                                                        </tr>
                                                        
                                                    </table>
                                                </td>
                                                <td style="font-size: 0; line-height: 0;" width="20">
                                                    &nbsp;
                                                </td>
                                                <td width="260" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td style="text-align:right; letter-spacing: 0.1em;">
                                                                Compras y licitaciones
                                                            </td>
                                                        </tr>
                                                        
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>

                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                        <b>Hola '.$_REQUEST['razonsocial'].'</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                         
                                         '.$_REQUEST['texto'].'
                                         
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td width="120" valign="top"></td>
                                             
                                                <td width="260" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" style="width: 180px;">
                                                        <tr>
                                                            <td>
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            
                                                        </tr>
                                                    </table>
                                                  
                                                </td>
                                              
                                                
                                            </tr>
                                          
                                        </table>
                                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td width="60" valign="top"></td>
                                             
                                                <td width="200" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" style="width: 500px;">
                                                        <tr>
                                                            <td width="260" valign="top"  style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 18px; ">
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            
                                                        </tr>
                                                    </table>
                                                  
                                                </td>
                                              
                                                
                                            </tr>
                                          
                                        </table>
                                      
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#583584" style="padding: 10px 5px 5px 5px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 12px;" width="75%">
                                         <b>Vivamos</b>
                                        <a href="http://www.vicentelopez.gov.ar" style="color: #ffffff;"><font color="#ffffff">Vicente Lopez</font></a> 
                                    </td>
                                    <td align="right" width="25%">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                
                                                <td  colspan="2" style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                                <td >
                                                    <a href="http://www.vicentelopez.gov.ar" style="color: #ffffff;">
                                                        <img src="https://citymis.co/custom/vicentelopez/public/_img/logo.png" alt="Facebook" width="25" height="30" style="display: block;" border="0" />
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';
    $mail->send();
} catch (Exception $exception) {
    echo 'Algo salio mal', $exception->getMessage();
}