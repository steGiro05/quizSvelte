<?php
header("Access-Control-Allow-Origin:http://localhost:5173");
header('Content-Type: application/json');
require_once(__DIR__ . '/protected/config.php');
try {
    $query = $db->prepare('SELECT * from quiz');
    $query->execute();
    $rows = $query->fetchAll();
    echo '{"status":1, "data":' . json_encode($rows) . '}';
} catch (PDOException $ex) {
    sendError('error executing query', __LINE__);
}


function sendError($message = 'error', $debug = 0)
{
    echo '{"status":0, "message":"' . $message . '", "debug": ' . $debug . '}';
    exit();
}
