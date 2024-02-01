<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require_once(__DIR__ . '/protected/config.php');

echo '{"status":1, "message": "user created"}';
