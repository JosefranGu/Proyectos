<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../conexion/Database.php';
include_once '../class/Derechohabiente.php';

$database = new Database();
$db = $database->getConnection();

$derechohabiente = new  Derechohabiente($db);

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->id_deha) &&
    !empty($data->curp_deha) &&
    !empty($data->nombre_deha) && 
    !empty($data->tel_deha) &&
    !empty($data->correo_deha)
) {

    $derechohabiente->id_deha = $data->id_deha;
    $derechohabiente->curp_deha = $data->curp_deha;
    $derechohabiente->nombre_deha = $data->nombre_deha;
    $derechohabiente->tel_deha = $data->tel_deha;
    $derechohabiente->correo_deha = $data->correo_deha;
   


    if ($derechohabiente->update()) {
        http_response_code(200);
        echo json_encode(array("message" => "Derechohabiente actualizado"));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "No se puede actualizar el derechohabiente"));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "No se puede actualizar el derechohabiente. Informacion incompleta"));
}
