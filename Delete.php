<?php
require "includes/connection.inc.php";

    $pdo = connection::connectToDatabase();

    $id = $_GET['id'];
    $sql = "DELETE FROM tasklist.tasks WHERE  id=$id";
    $statement = $pdo->prepare($sql);

    if (!$statement) {
        header("Location: ../Dashboard.php?sqlerror=sqlerror");
        echo 'There is no task with such id in your tasks';
        exit();
    }else{
        $statement->execute();

        header("Location: Dashboard.php");
}