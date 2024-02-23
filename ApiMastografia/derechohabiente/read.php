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

$derechohabiente->id_deha = (isset($_GET['id']) &&
    $_GET['id']) ?
    $_GET['id'] : '0';



$result = $derechohabiente->read();

if ($result->num_rows > 0) {
    $itemRecords = array();
    $itemRecords["Derechohabiente"] = array();
    while ($item = $result->fetch_assoc()) {
        extract($item);
        $itemDetails = array(
            "id_deha" => $id_deha,
            "curp_deha" => $curp_deha,
            "nombre_deha" => $nombre_deha,
            "tel_deha" => $tel_deha,
            "correo_deha" => $correo_deha,
        );
        array_push($itemRecords["Derechohabiente"], $itemDetails);
    }
    http_response_code(200);
    echo json_encode($itemRecords);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No se encontró el derechohabiente.")
    );
}
