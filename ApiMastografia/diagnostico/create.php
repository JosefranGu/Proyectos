<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../conexion/Database.php';
include_once '../class/Diagnostico.php';

$database = new Database();
$db = $database->getConnection();

$diagnostico = new Diagnostico($db);

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->id_deha) &&
    !empty($data->diagnostico)
) {

    $diagnostico->id_deha = $data->id_deha;
    $diagnostico->diagnostico = $data->diagnostico;

    if ($diagnostico->create()) {
        http_response_code(201);
        echo json_encode(array("message" => "Diagnostico creado"));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "No se puede crear el diagnostico"));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "No se puede crear el diagnostico. Informacion incompleta."));
}
?>
