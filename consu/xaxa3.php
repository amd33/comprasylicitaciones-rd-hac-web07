<?php
require_once 'config.php';

$url_token = WS_URL;
$url_licitaciones = WS_URL;
$usuario = WS_USER;
$password = WS_PASS;

//error_reporting(E_ALL);
//ini_set('display_errors', '1');
if (isset($_POST['ejercicio'])) {
    $ejercicio = $_POST['ejercicio'];

}


// 1. Obtener el token
$xml_request_token = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <GetSystemToken xmlns="http://microsoft.com/webservices/">
      <usuario>' . $usuario . '</usuario>
      <password>' . $password . '</password>
    </GetSystemToken>
  </soap:Body>
</soap:Envelope>';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url_token);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_request_token);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: text/xml; charset=utf-8',
    'SOAPAction: "http://microsoft.com/webservices/GetSystemToken"'
));

$response_token = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error cURL (token): ' . curl_error($ch);
    exit;
}

curl_close($ch);

try {
    $xml_token = simplexml_load_string($response_token);
    $xml_token->registerXPathNamespace('s', 'http://schemas.xmlsoap.org/soap/envelope/');
    $xml_token->registerXPathNamespace('m', 'http://microsoft.com/webservices/');
    $result_token = $xml_token->xpath('//m:GetSystemTokenResult')[0];

    if ($result_token) {
        $token = (string) $result_token;
        //echo "Token obtenido: " . $token . "\n";

        // 2. Obtener los concursos y licitaciones
        $xml_request_licitaciones = '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <GetConcursosyLicitaciones xmlns="http://microsoft.com/webservices/">
              <systemToken>' . $token . '</systemToken>
              <systemUser>' . $usuario . '</systemUser>
              <Ejercicio>' . $ejercicio . '</Ejercicio>
            </GetConcursosyLicitaciones>
          </soap:Body>
        </soap:Envelope>';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_licitaciones);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_request_licitaciones);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: text/xml; charset=utf-8',
            'SOAPAction: "http://microsoft.com/webservices/GetConcursosyLicitaciones"'
        ));

        $response_licitaciones = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error cURL (licitaciones): ' . curl_error($ch);
            exit;
        }

        curl_close($ch);
        if(empty($response_licitaciones)){
            echo "No se encontraron datos";die;
        }
        // 3. Procesar la respuesta JSON y mostrar en tabla
       // echo "$response_licitaciones";
        try {
          
            
            function parsearTodosLosBloques($texto) {
                $resultados = [];
                $patronBloque = '/\{([^\{\}]+)\}/'; // Encuentra cada bloque entre llaves
            
                if (preg_match_all($patronBloque, $texto, $matchesBloques)) {
                    foreach ($matchesBloques[1] as $bloque) { // Itera a través de cada bloque
                        $elementos = explode(',', $bloque); // Divide el bloque en elementos clave:valor
                        $bloqueParseado = []; // Arreglo para almacenar los pares clave:valor de este bloque
            
                        foreach ($elementos as $elemento) { // Itera a través de cada par clave:valor
                            $partes = explode(':', $elemento); // Divide en clave y valor
                            if (count($partes) === 2) {
                                $clave = trim($partes[0]);
                                $valor = trim($partes[1]);
                                $bloqueParseado[$clave] = $valor; // Agrega al arreglo del bloque
                            }
                        }
                        $resultados[] = $bloqueParseado; // Agrega el arreglo del bloque al arreglo principal
                    }
                }
            
                return $resultados;
            }
            
            // Ejemplo de uso
           
            
            $elementosParseados = parsearTodosLosBloques($response_licitaciones);
            if(empty($elementosParseados)){
                echo "No se encontraron datos <br>
                <a href='main.php'>Volver</a>";die;
            }
            //print_r($elementosParseados);
            
            function formatearImporte($importe) {
                if (is_numeric($importe)) {
                    // Aseguramos que el valor sea un número de punto flotante
                    $importe = (float) $importe;
            
                    // Formateamos el número con sprintf()
                    $formateado = sprintf('%1.2f', $importe);
            
                    // Reemplazamos el punto decimal por una coma
                    $formateado = str_replace('.', ',', $formateado);
            
                    // Agregamos separadores de miles
                    $formateado = preg_replace('/\.?(\d)(?=(\d{3})+(?!\d))/', '$1.', $formateado);
            
                    setlocale(LC_MONETARY, 'it_IT');
                    return money_format('%.2n', $importe) . "\n";
                    //return $formateado;
                } else {
                    
                    return $importe;
                }
            }
            
           
            function generarTablaPaginada($datos, $paginaActual = 1, $registrosPorPagina = 10) {
                $totalRegistros = count($datos);
                $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
            
                // Asegurar que la página actual esté dentro de los límites
                $paginaActual = max(1, min($paginaActual, $totalPaginas));
            
                $indiceInicio = ($paginaActual - 1) * $registrosPorPagina;
                $datosPagina = array_slice($datos, $indiceInicio, $registrosPorPagina);
            
                $html = '<table border="1">';
                $html .= '<thead><tr>';
            
                // Encabezados de la tabla
                foreach (array_keys($datos[0]) as $clave) {
                    $html .= '<th>' . $clave . '</th>';
                }
                $html .= '</tr></thead><tbody>';
            
                // Filas de datos de la página actual
                foreach ($datosPagina as $fila) {
                    $html .= '<tr>';
                    foreach ($fila as $clave => $valor) {
                        $valor = trim($valor, '"');
                        if ($clave === 'OrdendeCompra_Importe') {
                            $valor = formatearImporte($valor);
                        }
                        $html .= '<td>' . $valor . '</td>';
                    }
                    $html .= '</tr>';
                }
            
                $html .= '</tbody></table>';
            
                // Enlaces de paginación
                $html .= '<div style="margin-top: 10px;">';
                for ($i = 1; $i <= $totalPaginas; $i++) {
                    $html .= '<a href="?pagina=' . $i . '">' . $i . '</a> ';
                }
                $html .= '</div>';
            
                return $html;
            }
            
            // Obtener la página actual de la URL
            $paginaActual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
            
            // Generar la tabla paginada
            $tablaPaginada = generarTablaPaginada($elementosParseados, $paginaActual, 10);
            
            // Imprimir la tabla paginada
           // echo $tablaPaginada;
            

            // Decodificar la respuesta JSON
           
        } catch (Exception $e) {
            echo "Error al procesar la respuesta JSON (licitaciones): " . $e->getMessage() . "\n";
           // echo "Respuesta del servidor:\n" . $response_licitaciones;
        }

    } else {
        echo "No se pudo obtener el token.\n";
        //echo "Respuesta del servidor (token):\n" . $response_token;
    }
} catch (Exception $e) {
    echo "Error general (token): " . $e->getMessage() . "\n";
    //echo "Respuesta del servidor (token):\n" . $response_token;
}

//print_r($elementosParseados);
$datosJson = json_encode($response_licitaciones,JSON_UNESCAPED_UNICODE); // Agregamos JSON_UNESCAPED_UNICODE

//echo $datosJson;
$datosJson =  $response_licitaciones;
$datos= str_replace(["\r", "\n", "\t"], '', trim($response_licitaciones)); // Eliminar saltos de línea y espacios en blanco
$datosJson= str_replace("\u0026", "&", $datos); 



?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabla con DataTables</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <style>
        /* Estilos generales para la tabla */
        #miTabla-container {
            margin: 20px;
            border: 1px solid #ddd;
            padding: 10px;
        }

        #miTabla {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }

        #miTabla th, #miTabla td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: left;
        }

        #miTabla th {
            background-color: #f2f2f2;
        }

        /* Espacio entre search y entries */
        .search-wrapper {
            margin-bottom: 10px;
        }

        /* Espacio entre la grilla y los elementos de búsqueda/mostrar */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 10px; /* Margen inferior para crear espacio */
        }

        /* Estilos para los textos y botones de DataTables */
        .dataTables_wrapper {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .dataTables_wrapper button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        /* Estilos específicos para el paginador */
        .dataTables_paginate {
            margin-top: 10px;
        }

        .dataTables_paginate a {
            margin: 0 5px;
        }

        /* Estilos para el cuadro de búsqueda */
        .dataTables_filter input {
            border: 1px solid #ccc;
            padding: 5px;
        }

        /* Estilos para el menú de longitud de página */
        .dataTables_length select {
            border: 1px solid #ccc;
            padding: 5px;
        }
    </style>
</head>
<body>

<div style="width: 100%; border: 2px solid #e2e8f0; background: #f8fafc; margin-bottom: 2rem;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 1rem 2rem;">
        <div id="header" style="display: flex; align-items: center; height: 90px;">
            <div id="logo" style="padding: 10px; border-right: 2px solid #e2e8f0;">
                <img id="form:logoMVL" 
                     src="logo01.gif" 
                     style="height: 65px; width: auto; display: block;">
            </div>
            <!-- Espacio para posibles elementos adicionales a la derecha -->
            <div style="padding-left: 20px; font-size: 1.2rem; color: #2d3748; font-weight: 500;">
                Sistema de Adjudicaciones
            </div>
        </div>
    </div>
</div>


<div id="miTabla-container">

    <table id="miTabla">
        <thead>
            <tr>
                <th>Contratacion_Tipo</th>
                <th>Contratacion_Numero</th>
                <th>Adjudicatario</th>
                <th>OrdendeCompra_Numero</th>
                <th>OrdendeCompra_Fecha</th>
                <th>OrdendeCompra_Importe</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>  


    <script>
    $(document).ready( function () {
        const datos = '<?php echo $datosJson; ?>'; // Asignamos el JSON a una variable JavaScript
             // Eliminar la cadena XML
            let datosJsonString = datos.replace(/<\?xml version="1\.0" encoding="utf-8"\?><soap:Envelope xmlns:soap="http:\/\/schemas\.xmlsoap\.org\/soap\/envelope\/" xmlns:xsi="http:\/\/www\.w3\.org\/2001\/XMLSchema-instance" xmlns:xsd="http:\/\/www\.w3\.org\/2001\/XMLSchema"><soap:Body><GetConcursosyLicitacionesResponse xmlns="http:\/\/microsoft\.com\/webservices\/" \/><\/soap:Body><\/soap:Envelope>/g, '');

                // Eliminar todo lo que viene después del ]
                datosJsonString = datosJsonString.replace(/\](.*)$/s, ']');
                const datosJsonLimpio = JSON.parse(datosJsonString);
                console.log("Datos JSON limpio:", datosJsonLimpio);

        $('#miTabla').DataTable({
            "data": datosJsonLimpio,
            "columns": [
                { "data": "Contratacion_Tipo" },
                { "data": "Contratacion_Numero" },
                { "data": "Adjudicatario" },
                { "data": "OrdendeCompra_Numero" },
                { 
                    "data": "OrdendeCompra_Fecha",
                "render": function(data) {
                    // 1. Dividir el string por el espacio para separar fecha y hora
                    const fechaParte = data.split(' ')[0]; // "3/1/2025"
                    // 2. Dividir la fecha por "/" para obtener día, mes y año
                    const [dia, mes, anio] = fechaParte.split('/');
                    // 3. Formatear con ceros a la izquierda y estilo argentino
                    return `${dia.padStart(2, '0')}/${mes.padStart(2, '0')}/${anio}`;
                }
            },
                { 
                "data": "OrdendeCompra_Importe",
                "render": function(data, type, row) {
                    if (type === 'display' || type === 'filter') {
                        // Formatear a moneda argentina
                        return new Intl.NumberFormat('es-AR', {
                            style: 'currency',
                            currency: 'ARS',
                            minimumFractionDigits: 2
                        }).format(data);
                    }
                    return data;
                }
            }
            ],
            "language": {
                "url": "/es-ES.json", // Traducción a español
            },
            "error": function (xhr, error, thrown) {
                console.error("Error de DataTables:", error);
            }
        });
        $('#ejercicio-button').click(function () {
                const ejercicio = $('#ejercicio-input').val();

                $.ajax({
                    url: window.location.href,
                    method: 'POST',
                    data: { ejercicio: ejercicio },
                    success: function (data) {
                        try {
                            const start = data.indexOf('[');
                            const end = data.lastIndexOf(']');
                            const jsonString = data.substring(start, end + 1);
                            const newData = JSON.parse(jsonString);

                            $('#miTabla').DataTable().clear().rows.add(newData).draw();
                        } catch (error) {
                            console.error("Error al parsear la respuesta del servidor:", error);
                        }
                    },
                    error: function (error) {
                        console.error("Error al obtener los datos:", error);
                    }
                });
        });
    } );
    </script>


    <div style="display: flex; 
                justify-content: space-between; 
                padding: 20px; 
                background: #f8f9fa; 
                border-bottom: 1px solid #e0e0e0;">
        <!-- Enlace Volver -->
        <a href="main.php" 
           style="color: #1a73e8;
                  text-decoration: none;
                  font-family: Arial, sans-serif;
                  font-size: 14px;
                  padding: 8px 15px;
                  border: 1px solid #1a73e8;
                  border-radius: 4px;
                  transition: all 0.3s ease;">
            ← Volver
        </a>
        
        <!-- Enlace Pliegos -->
        <a href="https://www.vicentelopez.gov.ar/pliegos/pages/ordenes/pliegosAdjudicados.xhtml" 
           target="_blank" 
           style="color: #1a73e8;
                  text-decoration: none;
                  font-family: Arial, sans-serif;
                  font-size: 14px;
                  padding: 8px 15px;
                  border: 1px solid #1a73e8;
                  border-radius: 4px;
                  transition: all 0.3s ease;">
            📋 Pliegos Adjudicados Historico
        </a>
    </div>


    

</body>
</html>
