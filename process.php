<?php

    session_start();

    if(isset($_POST['submit'])){

        function authen(){
            $name = $_POST['name'];
            $password = $_POST['password'];

            $filedata = file_get_contents('Data.json');
            $filearr = json_decode($filedata, true);

            $namearr = array();
            $passwordarr = array();

            $index = null;

            foreach ($filearr as $key => $value) {
                $namearr[] = $value['name'];
                $passwordarr[] = $value['password'];

                if ($name == $value['name']) {
                    $index = $key;
                }
            }

            $password_search = array_search($password, $passwordarr);

            if (in_array($name, $namearr) && in_array($password, $passwordarr) && $password_search == $index) {
                $_SESSION['username'] = $name;
                header("Location: loginsuccessful.php");
            }

            else {
                return 'username or password invalid try again <br/>';
            }

        }

       echo authen();
    }
?>

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