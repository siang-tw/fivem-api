<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$server_ip = "103.122.191.86";
$port = "30121";
$type = $_GET['type'] ?? "players";

$url = "http://$server_ip:$port/" . ($type === "players" ? "players.json" : "info.json");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);

echo $response;

