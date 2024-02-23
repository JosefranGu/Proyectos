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

if(!empty($data->id_deha)) {
	$derechohabiente->id_deha = $data->id_deha;
	if($derechohabiente->delete()){    
		http_response_code(200); 
		echo json_encode(array("message" => "Derechohabiente eliminado."));
	} else {    
		http_response_code(503);   
		echo json_encode(array("message" => "No se puede eliminar el derechohabiente."));
	}
} else {
	http_response_code(400);    
    echo json_encode(array("message" => "No se puede eliminar el derechoahabiente. Informacion incompleta."));
}
?>