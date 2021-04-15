<?php
    session_start();
    
    $userName = $_SESSION['username'];

    echo "Login Successful, welcome!!!<strong>$userName</strong>.";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Register With Us</h2>
    <a href="logout.php">Click here to Logout</a>
</body>
</html>