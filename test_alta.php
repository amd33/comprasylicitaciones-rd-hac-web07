<?php
$url = "http://10.100.16.151/comprasylicitaciones/archivo.php"; 
$datos = [
    "informacionfiscalrazonsocial" => "EMPRESA TEST S.A.",
    "informacionfiscalcuit" => "30123456789", // 11 dígitos exactos [cite: 5, 17]
    "informacionfiscalsituacion" => "responsableinscripto",
    "informacionfiscalingresosbrutos" => "123456789",
    "informacionpersonaltelefono" => "1144556677",
    "informacionpersonalemail" => "test@vicentelopez.gov.ar",
    "informacionpersonalcontraseña" => "admin123",
    "domiciliopostalcalle" => "Av. Maipu",
    "domiciliopostalnumero" => "2609",
    "domiciliopostallocalidad" => "Olivos",
    "domiciliopostalcodigopostal" => "1636",
    "domiciliolegalcalle" => "Av. Maipu",
    "domiciliolegalnumero" => "2609",
    "domiciliolegallocalidad" => "Olivos",
    "domiciliolegalcodigopostal" => "1636",
    "municipiosmunicipio" => "otros", // Probamos con 'otros' para validar el parche
    "municipiosnhabilitacion" => "", // Debería pasar porque el parche asigna '0'
    "municipiosnpadron" => ""
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
$response = curl_exec($ch);
curl_close($ch);

echo "Respuesta del Servidor: " . $response;
?>
