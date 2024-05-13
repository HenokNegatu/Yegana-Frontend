<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $token = $_POST["token"];
  try {

    require_once "dbh.inc.php";
    $query = "SELECT * FROM Passangers WHERE token = :token;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":token", $token);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo = null;
    $stmt = null;

  } catch (PDOException $e) {
    die("error: " . $e->getMessage());
  }
} else {
  header("Location: ../index.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/check.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Checkin Result</title>
</head>
<body>
  <h3>Checkin Result</h3>
  <main class="container">
  <div class="header">
            <span>Yegna Bus<i class="fa-solid fa-bus"></i></span>
            <span><p>Boarding Pass</p></span>
        </div>
  <?php 

 

  if ($results) { // Check if data is present
    echo "<table>";
    echo "<tr class='table-row'>";
    echo "<th>Passanger Name</th>";
    echo "<th>Departure</th>";
    echo "<th>Destination</th>";
    echo "<th>Date</th>";
    echo "<th>Time</th>";
    echo "<th>Token</th>";
    echo "</tr>";
    
    echo "<tr class='table-row data'>";
    // Access data from the array using keys
    echo "<td>" . $results[0]["fullname"] . "</td>";
    echo "<td>" . $results[0]['departure'] . "</td>";
    echo "<td>" . $results[0]['destination'] . "</td>";
    echo "<td>" . $results[0]['departure_date'] . "</td>";
    echo "<td>" . $results[0]['departure_time'] . "</td>";
    echo "<td>" . $results[0]['token'] . "</td>";
    echo "</tr>";
    echo "</table>";
  } else {
    echo "<div class='no-data'>";
    echo "<p>";
    echo "No data found for the token.";
    echo "</p>";
    echo "</div>";
  }

  ?>
  </main>
</body>
</html>
