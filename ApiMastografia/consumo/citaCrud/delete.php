<?php
// ID del producto que deseas eliminar
$id_cita = ($_GET['id']);

// URL de la API
$url = 'http://localhost:8080/ApiMastografia/cita/delete.php';

// Crear un contexto de opciones para realizar la solicitud HTTP DELETE
$opciones = [
    "http" => [
        "header" => "Content-type: application/json",
        "method" => "DELETE", // Cambiar el método a DELETE
        "content" => json_encode(["id_cita" => $id_cita]) // Ajustar la clave para que coincida con lo esperado en delete.php
    ]
];

// Crear un contexto de flujo
$contexto = stream_context_create($opciones);

// Realizar la solicitud HTTP DELETE
$respuesta = file_get_contents($url, false, $contexto);

if ($respuesta === false) {
    // Manejar errores de solicitud
    $error = error_get_last();
    echo "<h1>Error en la petición: " . $error['message'] . "</h1>";
    exit;
} else {
    // Redirigir al usuario a la página principal o mostrar un mensaje de éxito
    // (Asegúrate de que esta redirección sea necesaria en tu lógica de aplicación)
    header("Location: get.php");
    exit;
}

// No alcanzarás este punto si tienes una declaración de salida (exit) arriba, pero por si acaso
var_dump($respuesta);
?>
