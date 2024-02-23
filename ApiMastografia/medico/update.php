<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../conexion/Database.php';
include_once '../class/Medico.php';

$database = new Database();
$db = $database->getConnection();

$medico = new Medico($db);

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->id_med) &&
    !empty($data->rfc_med) &&
    !empty($data->nombre_med) && 
    !empty($data->tel_med) &&
    !empty($data->correo_med)&&
    !empty($data->consultorio_med)
) {

    $medico->id_med = $data->id_med;
    $medico->rfc_med = $data->rfc_med;
    $medico->nombre_med = $data->nombre_med;
    $medico->tel_med = $data->tel_med;
    $medico->correo_med = $data->correo_med;
    $medico->consultorio_med = $data->consultorio_med;
   


    if ($medico->update()) {
        http_response_code(200);
        echo json_encode(array("message" => "Medico actualizado"));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "No se puede actualizar el medico"));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "No se puede actualizar el medico. Informacion incompleta"));
}
