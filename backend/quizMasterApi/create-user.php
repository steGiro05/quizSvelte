<?php
include 'sendError.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendError('Invalid request method', __LINE__);
}

$maxCharacters = 20;
$minCharacters = 5;

checkData($maxCharacters, $minCharacters);

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');



require_once(__DIR__ . '/protected/config.php');

try {
    // Verifica se l'username esiste già
    $queryCheckUsername = $db->prepare('SELECT COUNT(*) AS count FROM utente WHERE username = :username');
    $queryCheckUsername->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
    $queryCheckUsername->execute();
    $resultUsername = $queryCheckUsername->fetch(PDO::FETCH_ASSOC);

    // Verifica se l'email esiste già
    $queryCheckEmail = $db->prepare('SELECT COUNT(*) AS count FROM utente WHERE email = :email');
    $queryCheckEmail->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $queryCheckEmail->execute();
    $resultEmail = $queryCheckEmail->fetch(PDO::FETCH_ASSOC);

    // Se l'username o l'email sono già presenti, invia un messaggio di errore
    if ($resultUsername['count'] > 0) {
        sendError('Username already exists', __LINE__);
    }

    if ($resultEmail['count'] > 0) {
        sendError('Email already exists', __LINE__);
    }

    //creazione utente

    $id = uniqid();
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = $db->prepare("INSERT INTO utente (id,username,email,hash) VALUES (:id, :username, :email, :hash)");
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
    $query->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $query->bindValue(':hash', $hash, PDO::PARAM_STR);
    $query->execute();

    // Seleziona i dati dell'utente appena inserito
    $query1 = $db->prepare('SELECT id,username, email FROM utente WHERE id = :id');
    $query1->bindValue(':id', $id, PDO::PARAM_STR);
    $query1->execute();

    $result = $query1->fetchAll(PDO::FETCH_ASSOC);

    echo '{"status":1, "message":"user created", "data":' . json_encode($result) . '}';
} catch (PDOException $ex) {
    sendError('error executing query', __LINE__);
}


function checkData($maxCharacters, $minCharacters)
{
    // Verifica la presenza di 'username', 'email' e 'password'
    if (!isset($_POST['username'])) {
        sendError('username missing', __LINE__);
    }
    if (!isset($_POST['email'])) {
        sendError('email missing', __LINE__);
    }
    if (!isset($_POST['password'])) {
        sendError('password missing', __LINE__);
    }

    // Verifica la lunghezza di 'username'
    $usernameLength = strlen($_POST['username']);
    if ($usernameLength < $minCharacters) {
        sendError('username min ' . $minCharacters . ' characters', __LINE__);
    }
    if ($usernameLength > $maxCharacters) {
        sendError('username max ' . $maxCharacters . ' characters', __LINE__);
    }

    // Verifica la validità dell'email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        sendError('email not valid', __LINE__);
    }

    // Verifica la lunghezza di 'password'
    $passwordLength = strlen($_POST['password']);
    if ($passwordLength < $minCharacters) {
        sendError('password min ' . $minCharacters . ' characters', __LINE__);
    }
    if ($passwordLength > $maxCharacters) {
        sendError('password max ' . $maxCharacters . ' characters', __LINE__);
    }
}
