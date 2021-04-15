<?php

    if(!empty($_POST['submit'])) {
        $name = filter_input(INPUT_POST, 'name');
        $password = filter_input(INPUT_POST, 'password');

        echo "Your name is $name";
        

        if(!realpath('userData.json')) {
            $myArr = array(
                'name' => $name,
                'password' => $password
                
            );

            $resp[] = $myArr;

            //print out user's response;
            file_put_contents("userData.json", json_encode($resp));

            echo "Registered ";
            echo "<a href=" . "logout.php" . ">Click here to Logout</a>";
        }

        else {

            $userData = file_get_contents('userData.json');
            $resp = json_decode($userData, true);

            $namearr = array();

            foreach ($resp as $key => $value) {
                $namearr[] = $value['name'];
            }

            $arr = array(
                'name' => $name,
                'password' => $password
            );

            $resp[] = $arr;

            if (!in_array($name, $namearr)){
                //dumps info about resp
                file_put_contents("userData.json", json_encode($resp));
                echo "Registered ";
                echo "<a href=" . "logout.php" . ">Click here to Logout</a>";
            }
            else {
                echo "<h3>cant register, same username, please register with another username</h3> <br/>";
                echo "<a href=" . "registration.php" . ">register here</a>";
            }
        }

        $current = file_get_contents('userData.json');
        $userData = json_decode($current, true);

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>
