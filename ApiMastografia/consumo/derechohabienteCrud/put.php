<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar los datos recibidos del formulario
    $subs_id = isset($_POST['id']) ? $_POST['id'] : '';
    $subs_curp = isset($_POST['curp']) ? $_POST['curp'] : '';
    $subs_nombre= isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $subs_telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $subs_correo = isset($_POST['correo']) ? $_POST['correo'] : '';

    // Verificar si alguno de los campos requeridos está vacío
    if (empty($subs_id) || 
        empty($subs_curp) || 
        empty($subs_nombre) || 
        empty($subs_telefono) || 
        empty($subs_correo)) {
        echo "<h1>Por favor, completa todos los campos del formulario.</h1>";
        exit;
    }

    // URL del servicio web para actualizar el producto
    $url = 'http://localhost:8080/ApiMastografia/derechohabiente/update.php';

    // Datos a enviar en formato JSON
    $datos = [
            "id_deha" => $subs_id,
            "curp_deha"=> $subs_curp,
            "nombre_deha"=> $subs_nombre,
            "tel_deha"=> $subs_telefono,
            "correo_deha" => $subs_correo
        
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