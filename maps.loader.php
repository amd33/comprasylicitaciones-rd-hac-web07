<?php
// maps_loader.php
header('Content-Type: application/javascript');
include 'config.php';
session_start();

// Solo entregamos la clave si el usuario está logueado
if (isset($_SESSION['xpa']) && $_SESSION['xpa'] == 4573) {
    echo "var script = document.createElement('script');";
    echo "script.src = 'https://maps.googleapis.com/maps/api/js?key=" . GOOGLE_MAPS_KEY . "&callback=initMap';";
    echo "script.async = true;";
    echo "script.defer = true;";
    echo "document.head.appendChild(script);";
} else {
    echo "console.error('No autorizado para cargar mapas');";
}
?>
