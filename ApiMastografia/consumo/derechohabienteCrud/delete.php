<?php
// ID del producto que deseas eliminar
$id_deha = ($_GET['id']);

// URL de la API
$url = 'http://localhost:8080/ApiMastografia/derechohabiente/delete.php';

// Crear un contexto de opciones para realizar la solicitud HTTP DELETE
$opciones = [
    "http" => [
        "header" => "Content-type: application/json",
        "method" => "DELETE", // Change the method to POST since your server is expecting POST requests
        "content" => json_encode(["id_deha" => $id_deha]) // Adjust the key to match the expected variable name in delete.php
    ]
];

// Crear un contexto de streaming
$contexto = stream_context_create($opciones);

// Realizar la solicitud HTTP POST
$respuesta = @file_get_contents($url, false, $contexto);

if ($respuesta === false) {
    // Manejar errores de solicitud
    $error = error_get_last();
    echo "<h1>Error en la petición: " . $error['message'] . "</h1>";
    exit;
} else {
    // Redirigir al usuario a la página principal o mostrar un mensaje de éxito
    header("Location: get.php");
    echo $respuesta;
    exit;
}

// You won't reach this point if you have an exit statement above, but just in case
var_dump($respuesta);
?>
