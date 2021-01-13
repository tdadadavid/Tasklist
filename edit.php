<?php
//    $id = $_GET['id'];
//    var_dump($id);
//
//?>
   <form method="post" action="includes/edit.inc.php?<?php $id = $_GET["id"]; echo "id =  $id"; ?>">
        <input type="text" name="taskname" placeholder="Taskname"><br/>
        <input type="text" name="description" placeholder="Description"><br/>
       <button type="submit" name="okay"> Okay </button>
    </form>
