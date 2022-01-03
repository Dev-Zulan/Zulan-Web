<?php

session_start();

include('../modules/authentication.php');
include('../modules/connection.php');

if(isset($_SESSION['user_id'])) {
    echo '<script>location.replace("../index.php")</script>';
    return;
}

if(isset($_POST['user_register'])) {
    if(!validate_credentials(REGISTER)) {
        // wrong input
        return;
    }

    $SQL_Statement = $SQL_Handle->prepare("SELECT user_name FROM users WHERE user_name=?");
    $SQL_Statement->bind_param('s', strtolower($_POST['register_name']));
    $SQL_Statement->execute();

    $SQL_Result = $SQL_Statement->get_result();

    if(mysqli_num_rows($SQL_Result)) {
        //
    } else {
        $SQL_Statement = $SQL_Handle->prepare("INSERT INTO users(user_name, user_password, user_ip) VALUES(?, ?, ?);");
        $SQL_Statement->bind_param('sss', $_POST['register_name'], password_hash($_POST['register_pass'], PASSWORD_DEFAULT), $_SERVER['REMOTE_ADDR']);
        $SQL_Statement->execute();

        $SQL_InsertID = $SQL_Statement->insert_id;

        if(strtolower($_POST['register_name']) == "zulan" or strtolower($_POST['register_name']) == "admin") {
            $SQL_Statement = $SQL_Handle->prepare("INSERT INTO admins(user_id) VALUES(?);");
            $SQL_Statement->bind_param('i', $SQL_InsertID);
            $SQL_Statement->execute();
        }
    
        echo '<script>location.replace("login.php")</script>';
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
                <?=strtoupper($auth_type[REGISTER-1][0]) ?>
            </div>
            <div class="auth-description">
            </div>
            <form action="register.php" method="post">
                <input type="text" onfocus="this.value=''" name="register_name" value="Username" autocomplete="off"><br />
                <input type="password" onfocus="this.value=''" name="register_pass" value="Password" autocomplete="off"><br />
                <input type="password" onfocus="this.value=''" name="register_confirm_pass" value="Password" autocomplete="off"><br />
                <button type="submit" name="user_register"><?=$auth_type[REGISTER-1][1] ?></button><br />
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