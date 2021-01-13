<?php
    require "Displays/partials/header.php";
    session_abort();
    require "includes/Dashboard.inc.php";
?>

<!DOCTYPE HTML>
<html lang="en">

        <link rel="stylesheet" type="text/css" href="Dashboard.css">


    <body>

            <div class="create-project">
                <form action="Dashboard.php" method="post">
                    <input type="text" name="taskName" placeholder="Add a new task"><br/>
                    <input type="text" name="description" placeholder="Description"><br/>
                    <button type="submit" name="add" >ADD &nbsp; <span>&#43;</span></button>
                </form>


            </div>
    </body>

       <table class="table">
<!--           --><?php
//             $username = $_SESSION['Username'];
//             echo "$username Table";
//           ?>

           <tr>
               <th>Taskname</th>
               <th>Description</th>
               <th>Completed</th>
               <th>Link</th>
               <th>Delete</th>

           </tr>

           <?php foreach ($resultCheck as $result) :?>
           <tr>

               <td>
                   <?=
                   $result['Taskname']
                   ?>
               </td>

                <td>
                        <?=
                            $result['Description']
                        ?>
                </td>

               <td>
                   true
                   <?=
                   $result['id']
                   ?>
               </td>

               <td>
                   <?php
                        $id= $result['id'];
                        echo "<a href='edit.php?id=$id'>Edit</a>";

                   ?>
<!--                   echo "<a href='".$link_address."'>Link</a>";-->
               </td>

               <td>
                   <?php
                        $id= $result['id'];
                        echo  "<a href='Delete.php?id=$id'>DELETE</a>";
                   ?>
               </td>

           </tr>
           <?php endforeach; ?>



       </table>

</html>
