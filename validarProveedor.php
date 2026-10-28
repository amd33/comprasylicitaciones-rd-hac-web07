<?php
include("connecto2.php");

/**
 * PARCHE DE SEGURIDAD:
 * 1. Ocultar errores para evitar Full Path Disclosure (FPD).
 * 2. Sanitización de entradas con preg_replace.
 * 3. Consultas preparadas (PDO) para evitar Blind SQL Injection.
 */
ini_set('display_errors', 0);
error_reporting(0);

/* --- Lógica original de cURL (comentada en tu versión) ---
$url = "http://sgh2.vicentelopez.gov.ar/getProvRafan.php?cod_prov=".$_REQUEST['nroproveedor'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);

if (!($data)){
    echo "1";
}
else
*/

// Sanitización preventiva de todas las entradas
$nroproveedor = preg_replace("/[^0-9]/", "", $_REQUEST['nroproveedor'] ?? '');
$id_pliego    = preg_replace("/[^0-9]/", "", $_REQUEST['pliego'] ?? '');
$tipocontra   = preg_replace("/[^0-9]/", "", $_REQUEST['tipocontra'] ?? '');
$ano          = preg_replace("/[^0-9]/", "", $_REQUEST['ano'] ?? '');

if(!is_numeric($nroproveedor)){
    echo "0";
}
else {
    // Verificamos que el proveedor no haya subido ese pliego usando Prepared Statements
    $sql = "SELECT count(*) 
            FROM proveedor_pliego 
            WHERE id_pliego = ? 
            AND tipo = ? 
            AND ano = ? 
            AND nro_proveedor = ?";

    try {
        $stmt = $db->prepare($sql);
        $stmt->execute([$id_pliego, $tipocontra, $ano, $nroproveedor]);
        $dato = $stmt->fetch();

        // Validamos que el fetch haya sido exitoso (evita Fatal Error fetch on bool)
        if ($dato && $dato[0] > 0){
            echo "2";
        }
        else {
            $puede_comprar = false;

            // Verifica que sea un día hábil (Lunes=1 a Viernes=5)
            if (date('w') >= 1 && date('w') <= 5){ 

                // Verificamos configuración de horario con consultas preparadas
                $stmt_inicio = $db->prepare("SELECT valor FROM config WHERE id = ?");
                $stmt_inicio->execute(['VENTA-DIRECTA-HORA-INICIO']);
                $res_inicio = $stmt_inicio->fetch();
                $desde = $res_inicio ? intval($res_inicio['VALOR']) : 8;

                $stmt_fin = $db->prepare("SELECT valor FROM config WHERE id = ?");
                $stmt_fin->execute(['VENTA-DIRECTA-HORA-FIN']);
                $res_fin = $stmt_fin->fetch();
                $hasta = $res_fin ? intval($res_fin['VALOR']) : 15;

                $hora_actual = intval(date("H"));
                if ($hora_actual >= $desde && $hora_actual < $hasta) {
                    $puede_comprar = true;
                }
            }

            if (!$puede_comprar){
                echo "3";
            }
            else {
                // Trae el nombre del proveedor (Lógica original comentada)
                /* $c = strpos($data,'RAZON_SOCIAL');
                $d = strpos($data,'TIPO_PROV');
                $email_prov = substr($data,$c+16,$d-$c-17);
                echo $email_prov;
                */
            }
        }
    } catch (Exception $e) {
        // En caso de error de base de datos, falla silenciosamente devolviendo 0
        error_log($e->getMessage()); // Registra el error internamente
        echo "0";
    }
}
?>
