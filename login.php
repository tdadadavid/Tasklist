<?php
    require "Displays/partials/header.php";

?>

<section>

    <?php
    if(isset($_SESSION['UserId'])){
        echo
        '<form action="includes/logout.inc.php" method="post" >                      
              <button type="submit" name="logout-submit" >Log out</button>
        </form>';
    }
    else{
            echo
            '<form action="includes/login.inc.php" method="post" >
                 <input type="text" name="username" placeholder="username"><br>
                 <input type="password" name="password" placeholder="password"><br>
                <button type="submit" name="login-submit">Login</button>
            </form>';
    }
    ?>

<!--    <form action="includes/login.inc.php" method="post">-->
<!--        <label>-->
<!--            <input type="text" name="username" placeholder="username"><br>-->
<!--            <input type="password" name="password" placeholder="password"><br>-->
<!--            <button type="submit" name="login-submit">login</button><br>-->
<!--        </label>-->
<!--    </form>-->
</section>