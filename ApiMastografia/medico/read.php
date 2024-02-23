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

$medico = new  Medico($db);

$medico->id_med = (isset($_GET['id']) &&
    $_GET['id']) ?
    $_GET['id'] : '0';



$result = $medico->read();

if ($result->num_rows > 0) {
    $itemRecords = array();
    $itemRecords["Medico"] = array();
    while ($item = $result->fetch_assoc()) {
        extract($item);
        $itemDetails = array(
            "id_med" => $id_med,
            "rfc_med" => $rfc_med,
            "nombre_med" => $nombre_med,
            "tel_med" => $tel_med,
            "correo_med" => $correo_med,
            "consultorio_med"=> $consultorio_med,
        );
        array_push($itemRecords["Medico"], $itemDetails);
    }
    http_response_code(200);
    echo json_encode($itemRecords);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No se encontró el medico.")
    );
}
