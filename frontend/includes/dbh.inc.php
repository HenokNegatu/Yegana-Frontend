<?php

$db_server_name = "mysql:host=localhost;dbname=YegnaBus";
$db_username = "root";
$db_password = "";

try {
    $pdo = new PDO($db_server_name, $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}