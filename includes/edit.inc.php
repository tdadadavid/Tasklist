<?php

require "connection.inc.php";

$pdo = connection::connectToDatabase();

$id = $_GET['id'];
$taskName = $_POST['taskname'];
$description = $_POST['description'];

if (isset($_POST['okay'])) {
    $sql = "UPDATE  tasklist.tasks SET  Taskname = ? && Description =? where id = $id";
    var_dump($sql);
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1 , $taskName);
    $statement->bindParam(2 , $description);
    $statement->execute();
    $resultCheck = $statement->fetchAll(PDO::FETCH_ASSOC);
    header("Location: ../Dashboard.php?");
}