<?php
session_start();

include('../modules/authentication.php');
include('../modules/connection.php');

if(isset($_POST['user_login'])) {
    if(!validate_credentials(LOGIN)) {
        echo '<script>location.replace("error404.php")</script>';
        return;
    }

    $SQL_Statement = $SQL_Handle->prepare("SELECT `user_id`, `user_password` FROM `users` WHERE `user_name`=?");
    $SQL_Statement->bind_param('s', $_POST['login_name']);
    $SQL_Statement->execute();

    $SQL_Result = $SQL_Statement->get_result();

    if(mysqli_num_rows($SQL_Result)) {
        $SQL_Row = $SQL_Result->fetch_array();
        
        if(password_verify($_POST['login_pass'], $SQL_Row['user_password'])) {
            $_SESSION['user_id'] = $SQL_Row['user_id'];
            echo '<script>location.replace("../index.php")</script>';
            // echo 'The user ID is: ' . $_SESSION['user_id'] . '<br />';
            // echo 'Logged in! <br />';

            // echo 
        } else {
            // echo 'Inputted the wrong password sorry!' . '<br />';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php $page_name = "Authentication"; include('../modules/head.php') ?>
<body>
    <?php

    include('../modules/navbar.php');

    ?>

    <div class="authentication">
        <div class="auth-box">
            <div class="auth-title">
                <?php echo strtoupper($auth_type[LOGIN-1][0]) ?>
            </div>
            <div class="auth-description">
            </div>
            <form action="login.php" method="post">
                <input type="text" onfocus="this.value=''" name="login_name" value="Username" autocomplete="off"><br />
                <input type="password" onfocus="this.value=''" name="login_pass" value="Password" autocomplete="off"><br />
                <button type="submit" name="user_login"><?php echo $auth_type[LOGIN-1][1] ?></button><br />
                <a href="register.php">New user? Register now.</a>
            </form>
        </div>
    </div>

    
    <?php include('../modules/footer.php'); ?>

    <script>
        
    if(window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    </script>
</body>
</html>