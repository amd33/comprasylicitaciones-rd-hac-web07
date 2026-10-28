<?php
require_once 'dashboard/check_session.php';
include 'conect.php';
$message = ""; $ok = 1;
$cantarchivos = 0; // Configuración de seguridad (Lista Blanca) $allowedExtensions = array('pdf', 'zip'); $allowedMimes = 
array('application/pdf', 'application/zip', 'application/x-zip-compressed'); if($_FILES) {
    foreach($_FILES as $file)
    {
        if($file["error"] == UPLOAD_ERR_OK)
        {
            // --- INICIO DE VALIDACIONES DE SEGURIDAD ---
            // A. Validar Extensión
            $fileExtension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedExtensions)) {
                $message .= "Error: Extensión ." . $fileExtension . " no permitida.\n";
                $ok = 0; continue;
            }
            // B. Validar Contenido Real (FINFO) - Esto detiene archivos maliciosos disfrazados
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $realMimetype = finfo_file($finfo, $file["tmp_name"]);
            finfo_close($finfo);
            if (!in_array($realMimetype, $allowedMimes)) {
                $message .= "Error: El contenido de " . $file["name"] . " no es un PDF/ZIP real.\n";
                $ok = 0; continue;
            }
            // C. Limpieza del nombre original (Evita inyecciones de ruta o nombres raros)
            // Mantenemos tu lógica: CUIT + Nombre original, pero "limpio"
            $cuitLimpio = str_replace("-", "", $_POST["informacionfiscalcuit"]);
            $nombreLimpio = preg_replace("/[^a-zA-Z0-9._-]/", "_", $file["name"]);
            
            // Construimos el nombre tal cual lo tenías, pero sanitizado
            $nombreFinal = $cuitLimpio . "-" . $nombreLimpio;
            // --- FIN DE SEGURIDAD ---
            // Movemos el archivo con tu estructura de nombre original
            if (move_uploaded_file($file["tmp_name"], "archivos/" . $nombreFinal)) {
                $message .= "El archivo " . $file["name"] . " se ha recibido correctamente\n";
                $cantarchivos++;
            } else {
                $message .= "Error al guardar el archivo.\n";
                $ok = 0;
            }
        } else {
             $message .= "¡Error al subir archivo!\n";
             $ok = 0;
        }
    }
} else {
    $message .= "No se ha recibido nada\n";
    $ok = 0;
}
echo json_encode(array("ok" => $ok, "message" => $message));
?>
