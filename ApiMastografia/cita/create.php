<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../conexion/Database.php';
include_once '../class/Cita.php';

$database = new Database();
$db = $database->getConnection();

$cita = new  Cita($db);

// Use $_POST instead of decoding JSON from the request body
if (
    isset($_POST['id_deha']) &&
    isset($_POST['id_med']) &&
    isset($_POST['fecha_cita']) &&
    isset($_POST['consultorio_cita']) &&
    isset($_POST['hi_cita']) &&
    isset($_POST['hf_cita'])
) {

    $cita->id_deha = $_POST['id_deha'];
    $cita->id_med = $_POST['id_med'];
    $cita->fecha_cita = $_POST['fecha_cita'];
    $cita->consultorio_cita = $_POST['consultorio_cita'];
    $cita->hi_cita = $_POST['hi_cita'];
    $cita->hf_cita = $_POST['hf_cita'];

    if ($cita->create()) {
        http_response_code(201);
        echo json_encode(array("message" => "Cita creado"));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "No se puede crear la cita"));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "No se puede crear la cita. Informacion incompleta."));
}
?>
