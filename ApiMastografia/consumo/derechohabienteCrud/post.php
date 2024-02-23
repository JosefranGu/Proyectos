<?php
$subs_curp = ($_POST['curp']);
$subs_nombre =($_POST['nombre']);
$subs_telefono=($_POST['telefono']);
$subs_correo =($_POST['correo']);

$url='http://localhost:8080/ApiMastografia/derechohabiente/create.php';
//Iniciamos la sesión para obtener los valores de las variables que se envían desde el formulario
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