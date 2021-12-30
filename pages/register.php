<?php

session_start();

include('../modules/authentication.php');
include('../modules/connection.php');

if(isset($_POST['user_register'])) {
    if(!validate_credentials(REGISTER)) {
        echo '<script>location.replace("error404.php")</script>';
        return;
    }

    $SQL_Statement = $SQL_Handle->prepare("SELECT * FROM `users` WHERE `user_name`=?");
    $SQL_Statement->bind_param('s', $_POST['register_name']);
    $SQL_Statement->execute();

    $SQL_Result = $SQL_Statement->get_result();

    $temp = $_POST['register_pass'];
    $temp_hash = password_hash($temp, PASSWORD_DEFAULT);

    $SQL_Statement = $SQL_Handle->prepare("INSERT INTO `users`(`user_name`, `user_password`, `user_ip`) VALUES(?, ?, ?);");
    $SQL_Statement->bind_param('sss', $_POST['register_name'], $temp_hash, $_SERVER['REMOTE_ADDR']);
    $SQL_Statement->execute();
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
                <?php echo strtoupper($auth_type[REGISTER-1][0]) ?>
            </div>
            <div class="auth-description">
            </div>
            <form action="register.php" method="post">
                <input type="text" onfocus="this.value=''" name="register_name" value="Username" autocomplete="off"><br />
                <input type="password" onfocus="this.value=''" name="register_pass" value="Password" autocomplete="off"><br />
                <input type="password" onfocus="this.value=''" name="register_confirm_pass" value="Password" autocomplete="off"><br />
                <button type="submit" name="user_register"><?php echo $auth_type[REGISTER-1][1] ?></button><br />
                <a href="login.php">Already Registered? Login your account.</a>
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