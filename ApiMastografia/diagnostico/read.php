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

$diagnostico = new  Diagnostico($db);

$diagnostico->id_diagnostico = (isset($_GET['id']) &&
    $_GET['id']) ?
    $_GET['id'] : '0';



$result = $diagnostico->read();

if ($result->num_rows > 0) {
    $itemRecords = array();
    $itemRecords["Diagnostico"] = array();
    while ($item = $result->fetch_assoc()) {
        extract($item);
        $itemDetails = array(
            "id_diagnostico" => $id_diagnostico,
            "id_deha" => $id_deha,
            "diagnostico" => $diagnostico
        );
        array_push($itemRecords["Diagnostico"], $itemDetails);
    }
    http_response_code(200);
    echo json_encode($itemRecords);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No se encontró el diagnostico.")
    );
}
