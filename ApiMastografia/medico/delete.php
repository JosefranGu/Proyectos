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

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id_med)) {
	$medico->id_med = $data->id_med;
	if($medico->delete()){    
		http_response_code(200); 
		echo json_encode(array("message" => "Medico eliminado."));
	} else {    
		http_response_code(503);   
		echo json_encode(array("message" => "No se puede eliminar el medico."));
	}
} else {
	http_response_code(400);    
    echo json_encode(array("message" => "No se puede eliminar el medico. Informacion incompleta."));
}
?>