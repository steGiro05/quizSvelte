<?php
header('Content-Type: application/json');
require_once(__DIR__ . '/protected/config.php');

echo '{"status":1, "data":[{"id":1, "name":"A"},{"id":2, "name":"B"}]}';
