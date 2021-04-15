<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form action="process.php" method="POST">
        <h3>Login Page</h3>
        <input type="text" name="name" value="" placeholder="Username"/>
        <input type="password" name="password" value="" placeholder="password"/>
        <input type="submit" name="submit" value="Submit">
    </form>
    <a href="resetpassword.php">Reset password</a>
</body>
</html>