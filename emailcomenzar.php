<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);


include("connecto2.php");


$email_comenzar="SELECT valor FROM config where id =  'EMAIL-COMENZAR' ";


foreach ($db->query($email_comenzar) as $row){
    $email_comenzar = $row['VALOR'];
}

$url_vta_directa="SELECT valor FROM config where id =  'URL-VENTA-DIRECTA' ";


foreach ($db->query($url_vta_directa) as $row){
    $url_vta_directa = $row['VALOR'];
}



$TIPOC="SELECT descripcion FROM informix.tipo_pliego where codigo =  ".$_REQUEST['tipocontra'];



foreach ($db->query($TIPOC) as $row){
    $tipo_contratacion = $row['DESCRIPCION'];
}


/*
$url = "http://sgh2.vicentelopez.gov.ar/getProvRafan.php?cod_prov=".$_REQUEST['nroproveedor'];


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);


$x = strpos($data,'RAZON_SOCIAL');
$y = strpos($data,'TIPO_PROV');

*/


$proveedor = $_REQUEST['razon'];
$cuit = $_REQUEST['cuit'];


//actualiza el pliego para ese proveedor
$sql = " insert into proveedor_pliego
         values(".$_REQUEST['nroproveedor'].",'".$_REQUEST['emailproveedor']."',CURRENT,".$_REQUEST['pliego'].",".$_REQUEST['tipocontra'].",'".$proveedor."',".$_REQUEST['ano'].", '".$cuit."')";

$row = $db->query($sql);




                try {
                    $mail->SMTPDebug = 2;
                    $mail->isSMTP();
                    $mail->Host = 'prd-mod-smtp02.vicentelopez.gov.ar';
                    $mail->SMTPAuth = false;
                    $mail->SMTPAutoTLS = false;
                    $mail->Port = 25;
                    ## MENSAJE A ENVIAR
                    $mail->setFrom('no-reply@vicentelopez.gov.ar');
                    $mail->addAddress( $email_comenzar);
                   //$mail->addAddress('enrique.swystun@vicentelopez.gov.ar');
                    //usar este mail concursosylicitaciones@vicentelopez.gov.ar
                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8';
                    $mail->Subject = 'COMPRA PLIEGO NUMERO  ' . $_REQUEST['pliego'];
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
                                                    <b>Hola </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                    Hola ' . $proveedor . ' - CUIT: '.$cuit.' - correo electrónico: '.$_REQUEST['emailproveedor'].' - Nº ' . $_REQUEST['nroproveedor'] . '<br>

                                                    <br>
                                                    Te enviamos el link para efectuar el pago de la ' . $tipo_contratacion . '  numero  ' . $_REQUEST['pliego'] . '
                                                    .<br>Una vez efectuado el pago envianos el  comprobante a fin de enviarte el pedido de cotizacion
                                                    y su correspondiente pliego.

                                                    <br><br><br>
                                                    <b><a href="'.$url_vta_directa.'ventadirecta.php?pliegonro=' . $_REQUEST['pliego'] . '&tipo=' . $_REQUEST['tipocontra'] . '&nroproveedor=' . $_REQUEST['nroproveedor'] . '&ano=' . $_REQUEST['ano']. '">Link de pago - pliego ' . $_REQUEST['pliego'] . ' - '. $_REQUEST['ano'].'</a></b>



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


