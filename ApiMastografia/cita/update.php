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

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->id_cita) &&
    !empty($data->id_deha) &&
    !empty($data->id_med)  &&
    !empty($data->fecha_cita) &&
    !empty($data->consultorio_cita) &&
    !empty($data->hi_cita) &&
    !empty($data->hf_cita)
) {

    $cita->id_cita = $data->id_cita;
    $cita->id_deha = $data->id_deha;
    $cita->id_med = $data->id_med;
    $cita->fecha_cita = $data->fecha_cita;
    $cita->consultorio_cita =$data->consultorio_cita;
    $cita->hi_cita=$data->hi_cita;
    $cita->hf_cita=$data->hf_cita;
   


    if ($cita->update()) {
        http_response_code(200);
        echo json_encode(array("message" => "Cita actualizado"));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "No se puede actualizar el cita"));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "No se puede actualizar el cita. Informacion incompleta"));
}
