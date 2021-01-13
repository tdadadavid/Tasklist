<?php

//require "Dashboard.inc.php";
require "connection.inc.php";
session_start();


if (isset($_POST['okay'])) {

    $pdo = connection::connectToDatabase();

    $id = $_GET["id"];
    var_dump($id);
    $taskName = $_POST['taskname'];
    $description = $_POST['description'];
    var_dump($taskName);
    var_dump($description);


    $sql = "UPDATE  tasklist.tasks SET  Taskname = '$taskName' , Description = '$description' where id= '$id' ";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    //var_dump($statement);
//    header("Location: ../Dashboard.php?");
    if($statement->execute()){
        echo  "Update is successful";
    }
    else
        echo  "Update error";
}

?>

<!--<html>-->
<!---->
<!---->
<!--<body>-->
<!---->
<!--    <h1>edit.inc.php</h1>-->
<!--</body>-->
<!--</html>-->