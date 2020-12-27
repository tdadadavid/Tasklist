<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Todo</title>
    <link type="text/css" rel="stylesheet" href="Displays/styles.css">
</head>



<body>
        <header>
            <div class="logo">TaskList</div>
            <?php
                if(isset($_SESSION['Username'])){
                    $username= $_SESSION['Username'];
//                    echo $username;
//                    echo $_SESSION['UserId'];

                    echo '<form action="includes/logout.inc.php" method="post">
                             <button type="submit" name="logout-submit">logout' . $username .'</button>
                          </form>';
                }
                else{
                    echo '<a href="login.php">Log in</a>
                    <a href="signup.php">Sign up</a>';

                }
            ?>
        </header>
</body>







