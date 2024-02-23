<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar los datos recibidos del formulario
    $subs_id_cita = ($_POST['id_cita']) ? $_POST['id_cita'] : '';
    $subs_id_deha = ($_POST['id_deha']) ? $_POST['id_deha'] : '';
    $subs_id_med =  ($_POST['id_med']) ? $_POST['id_med'] : '';
    $subs_fecha_cita = ($_POST['fecha_cita']) ? $_POST['fecha_cita'] : '';
    $subs_consultorio_cita = ($_POST['consultorio_cita']) ? $_POST['consultorio_cita'] : '';
    $subs_hi_cita = ($_POST['hi_cita']) ? $_POST['hi_cita'] : '';
    $subs_hf_cita = ($_POST['hf_cita']) ? $_POST['hf_cita'] : '';

    // Verificar si alguno de los campos requeridos está vacío
    if (empty($subs_id_cita) ||
        empty($subs_id_deha) ||
        empty($subs_id_med) ||
        empty($subs_fecha_cita) ||
        empty($subs_consultorio_cita) ||
        empty($subs_hi_cita) ||
        empty($subs_hf_cita)) {
        echo "<h1>Por favor, completa todos los campos del formulario.</h1>";
        exit;
    }

    // URL del servicio web para actualizar el producto
    $url = 'http://localhost:8080/ApiMastografia/cita/update.php';

    // Datos a enviar en formato JSON
    $datos = [
        "id_cita" => $subs_id_cita,
        "id_deha" => $subs_id_deha,
        "id_med" => $subs_id_med,
        "fecha_cita" => $subs_fecha_cita,
        "consultorio_cita" => $subs_consultorio_cita,
        "hi_cita" => $subs_hi_cita,
        "hf_cita" => $subs_hf_cita
    ];

    $opcion = [
        "http" => [
            "header" => "Content-type: application/json\r\n",
            "method" => "PUT",
            "content" => json_encode($datos)
        ]
    ];

    // Crear contexto de solicitud
    $contexto = stream_context_create($opcion);

    // Realizar la solicitud al servicio web
    $respuesta = @file_get_contents($url, false, $contexto);

    if ($respuesta === false) {
        // Manejar errores de solicitud
        $error = error_get_last();
        echo "<h1>Error en la petición: " . $error['message'] . "</h1>";
        exit;
    } else {
        // Redirigir después de una actualización exitosa
        header("Location: get.php");
        exit;
    }
} else {
    echo "Acceso no permitido";
}
?>
