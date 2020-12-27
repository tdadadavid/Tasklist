<?php

require "connection.inc.php";
session_start();

    $pdo = connection::connectToDatabase();
    $user_id = $_SESSION['UserId'];
//    var_dump($_SESSION);
    $resultCheck = [];
    if (isset($_POST['add'])) {

        $task = $_POST['taskName'];
        $description = $_POST['description'];

        $sql = "INSERT INTO tasklist.tasks (Taskname, Description , user_id) VALUE (? , ? , ?)";
        $statement = $pdo->prepare($sql);

        if (!$statement) {
            header("Location: ../Dashboard.php?sqlerror=sqlerror");
            exit();
        } else {
            $statement->bindParam(1, $task);
            $statement->bindParam(2, $description);
            $statement->bindParam(3, $user_id);
            $statement->execute();
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM tasklist.tasks WHERE  id=?";
        $statement = $pdo->prepare($sql);

        if (!$statement) {
            header("Location: ../Dashboard.php?sqlerror=sqlerror");
            echo 'There is no task with such id in your tasks';
            exit();
        }else{
            $statement->bindParam(1, $id);
            $statement->execute();
        }
    }

    $sql = "SELECT id , Taskname , Description FROM tasklist.tasks WHERE  user_id = ?";
    $statement = $pdo->prepare($sql);

    if (!$statement) {
        exit();
    } else {
        $statement->bindParam(1, $user_id);
        $statement->execute();
        $resultCheck = $statement->fetchAll(PDO::FETCH_ASSOC);
//        var_dump($resultCheck);
//        header("Location: Todo-list/Dashboard.php");
    }

//"SELECT * FROM tasklist.tasks WHERE  user_id = ?"
//"SELECT (id , Taskname , Description , Completed) FROM tasklist.tasks WHERE  user_id = ?";

