<?php
include("conect.php");

ini_set('display_errors', 0);
error_reporting(0);

$cuit_limpio = preg_replace("/[^0-9]/", "", $_REQUEST['cuit'] ?? '');

if (empty($cuit_limpio)) {
    echo "<div class='alert alert-warning'>No se proporcionó un CUIT válido para la consulta.</div>";
    exit;
}

try {
    // Definimos la consulta principal con marcador de posición '?'
    $sqlAgente = "SELECT * FROM LOGCONTRATADOS 
                  WHERE agente IN (SELECT id FROM AGENTE WHERE cuit = ?)";
    
    $stmtAgente = $db->prepare($sqlAgente);
    $stmtAgente->execute([$cuit_limpio]);

    // Recorremos los registros de logs encontrados
    foreach ($stmtAgente as $row) {
        
        $usuarioid = trim($row['USUARIO_ID']);
        
        // Valores por defecto
        $nombre = "No ";
        $apelido = "definido";
        $secretaria_id = "No definido";
        $nombresecretaria = "No definido";

        // Si hay un ID de usuario, buscamos sus datos de forma segura
        if ($usuarioid !== "") {
            $stmtUser = $db->prepare("SELECT NOMBRE, APELLIDO, SECRETARIA_ID FROM USUARIO WHERE id = ?");
            $stmtUser->execute([$usuarioid]);
            $rowusuario = $stmtUser->fetch();

            if ($rowusuario) {
                $nombre  = $rowusuario["NOMBRE"];
                $apelido = $rowusuario["APELLIDO"];
                $secretaria_id = $rowusuario["SECRETARIA_ID"];
            }
        }

        // Si tenemos un ID de secretaría, buscamos su nombre
        if ($secretaria_id !== "No definido" && !empty($secretaria_id)) {
            $stmtSec = $db->prepare("SELECT NOMBRE FROM SECRETARIA WHERE id = ?");
            $stmtSec->execute([$secretaria_id]);
            $rowdesc = $stmtSec->fetch();
            
            if ($rowdesc) {
                $nombresecretaria = $rowdesc["NOMBRE"];
            }
        }

        // Renderizado del HTML con la lógica original de iconos
        ?>
        <div class="activity">
            <div class="activity-icon bg-primary text-white shadow-primary">
                <?php
                $accion = trim($row['ACCIONCONTRATADOS']);
                switch ($accion) {
                    case 'Alta postulante':
                        echo '<i class="fas fa-plus-square icon-estado"></i>';
                        break;
                    case 'Observar':
                        echo '<i class="fas fa-warning icon-estado"></i>';
                        break;
                    case 'Edicion postulante':
                        echo '<i class="fas fa-edit icon-estado"></i>';
                        break;
                    case 'Rechazar':
                        echo '<i class="fas fa-times icon-estado"></i>';
                        break;
                    case 'Aprobar':
                        echo '<i class="fas fa-check-double icon-estado"></i>';
                        break;
                    case 'Documentacion':
                        echo '<i class="fas fa-file-alt icon-estado"></i>';
                        break;
                    default:
                        echo '<i class="fas fa-history icon-estado"></i>';
                        break;
                }
                ?>
            </div>
            <div class="activity-detail">
                <div class="mb-2">
                    <span class="text-job"><?php echo htmlspecialchars($row['FECHA']); ?></span>
                    <span class="bullet"></span>
                </div>
                <p class="text-uppercase">
                    "Desde <a href="#"><u><?php echo htmlspecialchars($nombresecretaria); ?></u></a> 
                    <b><?php echo htmlspecialchars($nombre . " " . $apelido); ?></b> 
                    generó un estado <a href="#"><u><?php echo htmlspecialchars($row['ACCIONCONTRATADOS']); ?></u></a>".
                </p>
            </div>
        </div>
        <?php 
    } // Fin del bucle principal

} catch (Exception $e) {
    // Si algo falla, el atacante no verá la consulta, solo un mensaje genérico
    error_log("Error en getLogs.php: " . $e->getMessage());
    echo "Error interno al procesar la solicitud.";
}
?>
