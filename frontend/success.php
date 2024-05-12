<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>successfully booked</h1>
    <?php
session_start(); // Start the session if not already started

if (isset($_SESSION['token'])) {
    $token = $_SESSION['token'];
    echo "Your token is: $token";
    // Unset the session variable after displaying the token (optional)
    unset($_SESSION['token']);
} else {
    echo "An error occurred. The token could not be retrieved.";
}
?>

</body>
</html>