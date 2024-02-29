<?php
include 'sendError.php';


header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    sendError('id missing', __LINE__);
}
if (!ctype_digit($_GET['id'])) {
    sendError('id not valid', __LINE__);
}

require_once(__DIR__ . '/protected/config.php');

try {
    $query = $db->prepare("SELECT url_icon AS img
        FROM quiz  
        WHERE id=:id");
    $query->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) == 0) {
        sendError('Quiz not found', __LINE__);
        exit();
    }

    echo '{"status":1, "data":' . json_encode($result, JSON_UNESCAPED_UNICODE) . '}';
} catch (PDOException $ex) {
    sendError('error executing query', __LINE__);
}
