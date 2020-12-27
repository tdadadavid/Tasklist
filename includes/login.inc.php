<?php

    require "connection.inc.php";

    if (isset($_POST["login-submit"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        if (empty($username) || empty($password)){
            header("Location: ../login.php?error=emptyFields&username=".$username);
            exit();
        }
        else{
            $sql = "SELECT id, Username , PASSWORD FROM tasklist.user WHERE  Username=?";
            $pdo = connection::connectToDatabase();
            $statement = $pdo->prepare($sql);
//            var_dump($statement);

            if (!$statement){
                header("Location: ../login.php?sqlerror=sqlerror");
                exit();
            }
            else{
                $statement->bindParam(1 , $username);
                $statement->execute();
                $resultCheck = $statement->fetch(PDO::FETCH_ASSOC);
//                var_dump($resultCheck);

                if($resultCheck){
                    $passwordVerification = password_verify($password , $resultCheck['PASSWORD']);
                    var_dump($passwordVerification);

                    // if the password is wrong
                    if($passwordVerification == false){
                        header("Location: ../login.php?error=please enter valid password");
                        exit();
                    }
                    // if the password is true
                    else if ($passwordVerification == true) {
                        session_start();

                        $_SESSION['Username'] = $resultCheck['Username'];
                        $_SESSION['UserId'] = $resultCheck['id'];


                        header("Location: ../Dashboard.php?login=successful");
                        exit();

                    }
                     // if password is wrong (weird cases)
                    else{
                        header("Location: ../login.php?error=please enter valid password");
                        exit();
                    }
//
                }
                else{
                    header("Location: ../login.php?error=noUserWithSuchUsername");
                    exit();
                }
            }

        }
    }
    else{
        header("Location: ../index.php");
        exit();
    }
