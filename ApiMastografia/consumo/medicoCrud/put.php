<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar los datos recibidos del formulario
    $subs_id = isset($_POST['id']) ? $_POST['id'] : '';
    $subs_rfc = isset($_POST['rfc']) ? $_POST['rfc'] : '';
    $subs_nombre= isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $subs_telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $subs_correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $subs_consultorio = isset($_POST['consultorio']) ? $_POST['consultorio'] : '';

    // Verificar si alguno de los campos requeridos está vacío
    if (empty($subs_id) || 
        empty($subs_rfc) || 
        empty($subs_nombre) || 
        empty($subs_telefono) || 
        empty($subs_correo)||
        empty($subs_consultorio)) {
        echo "<h1>Por favor, completa todos los campos del formulario.</h1>";
        exit;
    }

    // URL del servicio web para actualizar el producto
    $url = 'http://localhost:8080/ApiMastografia/medico/update.php';

    // Datos a enviar en formato JSON
    $datos = [
            "id_med" => $subs_id,
            "rfc_med"=> $subs_rfc,
            "nombre_med"=> $subs_nombre,
            "tel_med"=> $subs_telefono,
            "correo_med" => $subs_correo,
            "consultorio_med" =>$subs_consultorio
        
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