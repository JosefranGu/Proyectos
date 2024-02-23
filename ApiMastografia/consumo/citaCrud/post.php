<?php
$subs_id_deha = $_POST['id_deha'];
$subs_id_med = $_POST['id_med'];
$subs_fecha = $_POST['fecha_cita'];
$subs_consultorio = $_POST['consultorio_cita'];
$subs_hi = $_POST['hi_cita'];
$subs_hf = $_POST['hf_cita'];

$url = 'http://localhost:8080/ApiMastografia/cita/create.php';

$datos = [
    "id_deha" => $subs_id_deha,
    "id_med" => $subs_id_med,
    "fecha_cita" => $subs_fecha,
    "consultorio_cita" => $subs_consultorio,
    "hi_cita" => $subs_hi,
    "hf_cita" => $subs_hf
];

$opcion = [
    "http" => [
        "header" => "Content-type: application/x-www-form-urlencoded\r\n",
        "method" => "POST",
        "content" => http_build_query($datos)
    ]
];

$contexto = stream_context_create($opcion);
$respuesta = @file_get_contents($url, false, $contexto);

if ($respuesta === false) {
    // Manejar errores de solicitud
    $error = error_get_last();
    echo "<h1>Error en la petición: " . $error['message'] . "</h1>";
    exit;
} else {
    header("Location: get.php");
    echo $respuesta;
    exit;
}

var_dump($respuesta);
?>
