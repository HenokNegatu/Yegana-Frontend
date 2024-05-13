<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fullname = $_POST["fullname"];
    $departure = $_POST["departure"];
    $destination = $_POST["destination"];
    $departure_date = $_POST["departure_date"];
    $departure_time = $_POST["departure_time"];
    

    try {

        require_once "token.php";
        $token = generateToken();

        require_once "dbh.inc.php";
        $query = "INSERT INTO Passangers (fullname, departure, destination, departure_date, departure_time, token) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$fullname, $departure, $destination, $departure_date, $departure_time, $token]);

        $pdo = null;
        $stmt = null;

         // Store the token in a session variable for access on the success page
         session_start(); // Start the session if not already started
         $_SESSION['token'] = $token;
 

        header("Location: ../success.php");
        die();
    } catch (PDOException $e) {
        die("error: ". $e->getMessage());
    }
}

else{
    header("Location: ../book.php");
}