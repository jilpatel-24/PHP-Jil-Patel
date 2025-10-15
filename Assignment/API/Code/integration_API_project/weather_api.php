<?php
header("Content-Type: application/json");

$apiKey = "YOUR_API_KEY"; // 🔑 Replace with your OpenWeatherMap API key
$city = isset($_GET['city']) ? urlencode($_GET['city']) : "";

if (!$city) {
    echo json_encode(["error" => "Please enter a city name."]);
    exit;
}

$url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

$response = file_get_contents($url);

if ($response === FALSE) {
    echo json_encode(["error" => "Unable to connect to API."]);
    exit;
}

$data = json_decode($response, true);

if ($data['cod'] != 200) {
    echo json_encode(["error" => $data['message']]);
    exit;
}

echo json_encode($data);
?>
