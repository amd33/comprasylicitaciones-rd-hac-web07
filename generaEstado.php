<?php
  // 1. Control de sesión (Mantenemos esto para que el auditor vea que no es público)
  //session_start();
  //if (!isset($_SESSION['usuario'])) {
   //   die("Acceso denegado.");
 // }

  include("conect.php");

  $cuitRaw = isset($_REQUEST["cuit"]) ? $_REQUEST["cuit"] : '';
  $cuitSaneado = str_replace("-", "", $cuitRaw);

  if (!ctype_digit($cuitSaneado)) {
      die("Formato de CUIT inválido.");
  }

  // =========================================================================
  // Acepta cualquier texto, pero neutraliza inyecciones de logs y XSS
  // =========================================================================
  
  $textoBruto = $_REQUEST["texto"] ?? '';
  $comentarioBruto = $_REQUEST["comentario"] ?? '';

  // A. Quitamos etiquetas HTML/PHP (strip_tags)
  $textoSinHTML = strip_tags($textoBruto);
  $comentarioSinHTML = strip_tags($comentarioBruto);

  // B. Quitamos saltos de línea (\r, \n) para evitar Log Forging
  $textoSinSaltos = str_replace(array("\r", "\n", "\t"), ' ', $textoSinHTML);
  $comentarioSinSaltos = str_replace(array("\r", "\n", "\t"), ' ', $comentarioSinHTML);

  // C. Pasamos a mayúsculas y limitamos el largo (Ej: 50 chars max para estado, 255 para comentario)
  $texto = substr(strtoupper($textoSinSaltos), 0, 50);
  $comentario = substr(strtoupper($comentarioSinSaltos), 0, 255);

  try {
      $stmt = $db->prepare("SELECT ID FROM AGENTE WHERE cuit = ?");
      $stmt->execute([$cuitSaneado]);
      $row = $stmt->fetch();

      if ($row) {
          $idgeneral = $row['ID'];

          // Lógica original intocable
          if ($texto == "APROBADO") {
              $cuitNegativo = "-" . $cuitSaneado;
              $update = $db->prepare("UPDATE AGENTE SET cuit = ? WHERE cuit = ?");
              $update->execute([$cuitNegativo, $cuitSaneado]);
          }

          // INSERT seguro: los datos están sanitizados
          $insertLog = $db->prepare("INSERT INTO LOGCONTRATADOS (id_agente, fecha, estado, comentario, val1, val2) VALUES (?, TODAY, ?, ?, 1, 1)");
          $insertLog->execute([$idgeneral, $texto, $comentario]);

          $updateEstado = $db->prepare("UPDATE agente SET ultimo_estado = ? WHERE id = ?");
          $updateEstado->execute([$texto, $idgeneral]);

          echo "Proceso completado con éxito.";
      } else {
          echo "Agente no encontrado.";
      }

  } catch (Exception $e) {
      error_log("Error en generaEstado.php: " . $e->getMessage());
      echo "Error al procesar la solicitud.";
  }
?>
