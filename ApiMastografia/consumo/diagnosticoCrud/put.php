<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar los datos recibidos del formulario
    $subs_id_diagnostico = isset($_POST['id_diagnostico']) ? $_POST['id_diagnostico'] : '';
    $subs_id_deha = isset($_POST['id_deha']) ? $_POST['id_deha'] : '';
    $subs_diagnostico= isset($_POST['diagnostico']) ? $_POST['diagnostico'] : '';

    // Verificar si alguno de los campos requeridos está vacío
    if (empty($subs_id_diagnostico) || 
        empty($subs_id_deha) || 
        empty($subs_diagnostico)) {
        echo "<h1>Por favor, completa todos los campos del formulario.</h1>";
        exit;
    }

    // URL del servicio web para actualizar el producto
    $url = 'http://localhost:8080/ApiMastografia/diagnostico/update.php';

    // Datos a enviar en formato JSON
    $datos = [
            "id_diagnostico" => $subs_id_diagnostico,
            "id_deha"=> $subs_id_deha,
            "diagnostico"=> $subs_diagnostico,    
    ];

$opcion = [
    "http" => [
        "header" => "Content-type: application/json\r\n",
        "method" => "PUT",
        "content" => json_encode($datos)
    ]
];

// Crear contexto de solicitud
$contexto = stream_context_create($opcion);

// Realizar la solicitud al servicio web
$respuesta = @file_get_contents($url, false, $contexto);

if ($respuesta === false) {
    // Manejar errores de solicitud
    $error = error_get_last();
    echo "<h1>Error en la petición: " . $error['message'] . "</h1>";
    exit;
} else {
    // Redirigir después de una actualización exitosa
    header("Location: get.php");
    exit;
}
} else {
echo "Acceso no permitido";
}
?>
