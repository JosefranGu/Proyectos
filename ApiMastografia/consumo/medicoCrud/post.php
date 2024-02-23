<?php
$subs_rfc = ($_POST['rfc']);
$subs_nombre =($_POST['nombre']);
$subs_telefono=($_POST['telefono']);
$subs_correo =($_POST['correo']);
$subs_consultutorio =($_POST['consultorio']);

$url='http://localhost:8080/ApiMastografia/medico/create.php';
//Iniciamos la sesión para obtener los valores de las variables que se envían desde el formulario
$datos = [
  "id_med" => $subs_id,
  "rfc_med"=> $subs_rfc,
  "nombre_med"=> $subs_nombre,
  "tel_med"=> $subs_telefono,
  "correo_med" => $subs_correo,
  "consultorio_med" => $subs_consultutorio
];
$opcion = [
  "http" => [
    "header" => "Content-type: application/json\r\n",
    "method" => "POST",
    "content" => json_encode($datos)
]];
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