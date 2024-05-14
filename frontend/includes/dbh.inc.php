<?php

$db_server_name = "mysql:host=localhost:3307;dbname=YegnaBus";
$db_username = "root";
$db_password = "";

$tableName = "Passangers";

// SQL statement to create table with data types
$sql = "CREATE TABLE IF NOT EXISTS `$tableName` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `fullname` VARCHAR(50) NOT NULL,
  `departure` VARCHAR(50) NOT NULL,
  `destination` VARCHAR(50) NOT NULL,
  `departure_date` DATE NOT NULL,
  `departure_time` TIME NOT NULL,
  `token` VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";


try {
    $pdo = new PDO($db_server_name, $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Execute the query
  $pdo->exec($sql);

  echo "Table '$tableName' created successfully (if it didn't exist already).";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}