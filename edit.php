<?php

    session_start();
    require "includes/connection.inc.php";

    $pdo = connection::connectToDatabase();
     $id = $_GET['id'];

        $sql = "SELECT Taskname , Description FROM tasklist.tasks where id = $id";
        $statement = $pdo->prepare($sql);
        $resultCheck = $statement->fetchAll(PDO::FETCH_ASSOC);
        var_dump($resultCheck);

?>

    <form method="post" action="includes/edit.inc.php">
        <input type="text" name="taskname" placeholder="Taskname"><br/>
        <input type="text" name="description" placeholder="Description"><br/>
        <button type="submit" name="okay" >Okay</button>
    </form>
