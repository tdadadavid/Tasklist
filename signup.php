<?php require "Displays/partials/header.php"?>


<section>

    <?php
         if (isset($_SESSION['Username'])){
             echo '';
         }

    ?>


    <form action="includes/signIn.inc.php" method="post">
        <label>
            <input type="text" name="username" placeholder="Username"><br>
            <input type="Email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="password" name="rpassword" placeholder="Confirm password"><br>
            <button type="submit" name="signup-submit">Sign up</button><br>
        </label>
    </form>

</section>



