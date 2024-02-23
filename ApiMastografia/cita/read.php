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

$cita->id_cita = (isset($_GET['id']) &&
    $_GET['id']) ?
    $_GET['id'] : '0';



$result = $cita->read();

if ($result->num_rows > 0) {
    $itemRecords = array();
    $itemRecords["Cita"] = array();
    while ($item = $result->fetch_assoc()) {
        extract($item);
        $itemDetails = array(
            "id_cita" => $id_cita,
            "id_deha" => $id_deha,
            "id_med" => $id_med,
            "fecha_cita" => $fecha_cita,
            "consultorio_cita"=>$consultorio_cita,
            "hi_cita" => $fecha_cita,
            "hf_cita" => $fecha_cita,
        );
        array_push($itemRecords["Cita"], $itemDetails);
    }
    http_response_code(200);
    echo json_encode($itemRecords);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No se encontró la cita.")
    );
}
