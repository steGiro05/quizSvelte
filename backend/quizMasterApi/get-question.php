    <?php
    header("Access-Control-Allow-Origin:http://localhost:5173");
    header('Content-Type: application/json');

    if (!isset($_GET['id'])) {
        sendError('id missing', __LINE__);
    }
    if (!ctype_digit($_GET['id'])) {
        sendError('id not valid', __LINE__);
    }

    require_once(__DIR__ . '/protected/config.php');

    try {
        $query = $db->prepare('SELECT id, testo from domanda where fkQuiz= :id');
        $query->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
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
