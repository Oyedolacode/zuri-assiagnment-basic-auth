<?php


    if(!empty($_POST['submit'])){

        function outcome(){
            $userName = filter_input(INPUT_POST, 'name');
            $password = filter_input(INPUT_POST, 'password');

            $userData = file_get_contents('userData.json');
            $filearr = json_decode($userData, true);

            $namearr = array();
            $index = null;
            $oldpassword = null;
            foreach ($filearr as $key => $value) {
                $namearr[] = $value['name'];
                if($userName == $value['name']){
                    $index = $key;
                }
            }

            if(array_key_exists($userName, $namearr)){
                $oldpassword = $filearr[$index]['password'];
            
            

                if ($password != $oldpassword && array_key_exists($userName, $namearr)) {
                    $filearr[$index]['password'] = $password;
                    echo "Password updated, login with your new password";
                    file_put_contents("userData.json", json_encode($filearr));
                }

                else{
                    echo "it's the same password <br/>";
                    echo "<a href=" . "resetpassword.php" . ">Please , try again here</a>";
                }

            }
            else{
                echo "This Username is not found <br/>";
                echo "<a href=" . "resetpassword.php" . ">Please, try again here</a>";
            }

             
        }

       outcome();
    }
?>