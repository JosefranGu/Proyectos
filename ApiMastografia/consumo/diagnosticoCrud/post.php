<?php
// Verifying if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extracting values from the form
    $subs_id = ($_POST['id_deha']);
    $subs_diagnostico = ($_POST['diagnostico']);

    // URL of the remote API endpoint
    $url = 'http://localhost:8080/ApiMastografia/diagnostico/create.php'; // Replace with the actual API endpoint

    // Data to be sent in the POST request
    $data = [
        "id_deha" => $subs_id,
        "diagnostico" => $subs_diagnostico,
    ];

    // Configuration for the POST request
    $options = [
        "http" => [
            "header" => "Content-type: application/json",
            "method" => "POST",
            "content" => json_encode($data),
        ],
    ];

    // Creating a stream context
    $context = stream_context_create($options);

    // Making the POST request
    $response = file_get_contents($url, false, $context);

    // Checking if the request was successful
    if ($response !== false) {
        // Redirecting to get.php upon successful submission
        header("Location: get.php");
        exit;
    } else {
        // Handling errors in the request
        $error = error_get_last();
        echo "<h1>Error in the request: " . $error['message'] . "</h1>";
        exit;
    }
} else {
    // If the form is not submitted using POST method, handle accordingly
    echo "<h1>Invalid request method</h1>";
    exit;
}
?>
