<?php
    require "connection.inc.php";

    if(isset($_POST['signup-submit'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['rpassword'];

        if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
            header("Location: ../signup.php?error=emptyFields&username=" . $username . "&email=" . $email);
            exit();
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z0-9]*$/" , $username)){
            header("Location: ../signup.php?error=InvalidEmail&username=" . $username . "&email=" .$email);
            exit();
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?error=InvalidEmail&username=" . $username);
            exit();
        } else if (!preg_match("/^[a-zA-Z0-9]*$/" , $username)) {
            header("Location: ../signup.php?error=InvalidUsername&email=" . $email);
            exit();
        }else if ($password != $passwordRepeat){
            header("Location: ../signup.php?error=Passwords don't match&email=" . $email ."&username=" . $username);
            exit();
        }else{
            $sql = "SELECT id,Username FROM tasklist.user WHERE Username=?";
            $pdo = connection::connectToDatabase();
            $statement= $pdo->prepare($sql);

            if (!$statement){
                header("Location: ../signup.php?sqlerror=sqlerror");
                exit();
            }
            else{
                $statement->bindParam(1 , $username);
                $statement->execute();
                $resultCheck = $statement->fetchAll(PDO::FETCH_ASSOC);

                if(count($resultCheck) > 0){
                    header("Location: ../signup.php?error=Username taken&email=" . $email);
                    exit();
                }
                else{
                    $sql = "INSERT INTO tasklist.user (Username, Email, PASSWORD) VALUES (? , ? , ?)";
                    $pdo = connection::connectToDatabase();
                    $statement = $pdo->prepare($sql);

                    if(!$statement){
                        header("Location: ../signup.php?sqlerror=sqlerror");
                        exit();
                    }
                    else{
                        $hashedpassword = password_hash($password , PASSWORD_DEFAULT);

                        $statement->bindParam(1 , $username);
                        $statement->bindParam(2 , $email);
                        $statement->bindParam(3 , $hashedpassword);
                        $statement->execute();

                        session_start();

                        $_SESSION['Username'] = $resultCheck['Username'];
                        $_SESSION['UserId'] = $resultCheck['id'];

                        header("Location: ../Dashboard.php?signup=successful&user_id=");
                        exit();

                    }
                }
            }
        }
    }
    else{
        header("Location: ../signup.php");
        exit();
    }