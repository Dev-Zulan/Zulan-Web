<?php

session_start();

include ('../modules/connection.php');

if(!isset($_SESSION['user_id'])) {
    echo '<script>location.replace("../index.php")</script>';
    return;
}

class UserBar {
    public
        $item,
        $id;
    
    function __construct($item, $id) {
        $this->item = $item;
        $this->id = $id;
    }

    function get_item() {
        return $this->item;
    }

    function get_id() {
        return $this->id;
    }
}

$UserBar[] = new UserBar("Dashboard", "user-dashboard");
$UserBar[] = new UserBar("Messages", "user-messages");
$UserBar[] = new UserBar("Orders", "user-orders");
$UserBar[] = new UserBar("Settings", "user-settings");
$UserBar[] = new UserBar("Logout", "user-logout");

if(isset($_POST['user_save_details'])) {
    if($_POST['user_fname']) {
        $SQL_Statement = $SQL_Handle->prepare("UPDATE users SET user_fname=? WHERE user_id=?;");
        $SQL_Statement->bind_param('si', $_POST['user_fname'], $_SESSION['user_id']);
        $SQL_Statement->execute();
    }
    if($_POST['user_lname']) {
        $SQL_Statement = $SQL_Handle->prepare("UPDATE users SET user_lname=? WHERE user_id=?;");
        $SQL_Statement->bind_param('si', $_POST['user_lname'], $_SESSION['user_id']);
        $SQL_Statement->execute();
    }
    if($_POST['user_email']) {
        if(!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            echo '<script>location.replace("user.php")</script>';
            return;
        }

        $SQL_Statement = $SQL_Handle->prepare("UPDATE users SET user_email=? WHERE user_id=?;");
        $SQL_Statement->bind_param('si', $_POST['user_email'], $_SESSION['user_id']);
        $SQL_Statement->execute();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php $page_name = "User"; include('../modules/head.php') ?>
<body>
    <?php include('../modules/navbar.php'); ?>

    <div class="user">
        <div class="user-inner">
            <div class="user-sidebar">
                <h1>USER</h1>
                <ul>
                    <?php
                    
                    foreach($UserBar as $x => $i) {
                        echo '<a href="?user-sidebar=' . strtolower($UserBar[$x]->get_id()) . '"><li id="' . $UserBar[$x]->get_id() . '">' . $UserBar[$x]->get_item() . '</li></a>';
                    }
                    
                    ?>
                </ul>
            </div>
            <div class="user-canvas">
                <div class="user-canvas-inner">
                    <div class="user-canvas-item" style="display: block;">
                        <div class="user-dashboard">
                            <?php

                            $SQL_Result = $SQL_Handle->query("SELECT * FROM users WHERE user_id=" . $_SESSION['user_id']);
                            $SQL_Row = $SQL_Result->fetch_array();

                            ?>
                            <div class="user-dashboard-header">
                                <img src="../resources/img_avatar.png" alt="">
                                <br />
                                <?php
                                echo '<h1>' . $SQL_Row["user_name"] . '</h1>';

                                $SQL_Result = $SQL_Handle->query("SELECT admin_id FROM admins WHERE user_id=" . $_SESSION['user_id']);

                                if(mysqli_num_rows($SQL_Result)) {
                                    echo '<h3>Admin</h3>';
                                } else {
                                    echo '<h3>User</h3>';
                                }
                                
                                $SQL_Result = $SQL_Handle->query("SELECT * FROM users WHERE user_id=" . $_SESSION['user_id']);
                                $SQL_Row = $SQL_Result->fetch_array();
                                ?>
                                <br />
                                <hr />
                            </div>
                            <div class="user-details-container">
                                <form action="user.php" method="POST">
                                    <h1> - Personal Details - </h1>
                                    <div class="user-details">
                                        <div class="$SQL_Row['user_fname']user-details-left">
                                            <h2>First Name</h2>
                                            <input type="text" name="user_fname" autocomplete="off" value="<?=$SQL_Row['user_fname']?>">
                                            <br />
                                            <br />
                                            <h2>Last Name</h2>
                                            <input type="text" name="user_lname" autocomplete="off" value="<?=$SQL_Row['user_lname']?>">
                                            <br />
                                            <br />
                                        </div>
                                        <div class="user-details-right">
                                            <h2>Email</h2>
                                            <input type="text" name="user_email" autocomplete="off" value="<?=$SQL_Row['user_email']?>">
                                            <br />
                                            <br />
                                        </div>
                                    </div>
                                    <button type="submit" name="user_save_details" id="user-save-button">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="user-canvas-item" style="display: none;">
                        <h1>MESSAGES - Under Construction</h1>
                    </div>
                    <div class="user-canvas-item" style="display: none;">
                        <h1>ORDERS - Under Construction</h1>
                    </div>
                    <div class="user-canvas-item" style="display: none;">
                        <h1>SETTINGS - Under Construction</h1>
                    </div>
                    <div class="user-canvas-item" style="display: none;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../modules/footer.php'); ?>
</body>
</html>

<?php


if(isset($_GET['user-sidebar'])) {
    $activebar = 0;
    echo '<script>var user_canvas = document.getElementsByClassName("user-canvas-item")</script>';
    
    foreach($UserBar as $x => $i) {
        if($_GET['user-sidebar'] == 'user-logout') {
            echo '<script>location.replace("logout.php")</script>';
            return;
        }
        if($_GET['user-sidebar'] == strtolower($UserBar[$x]->get_id())) {
            echo '<script>user_canvas[' . $activebar .'].style.display="none"</script>';
            $activebar = $x;
            echo '<script>user_canvas[' . $activebar .'].style.display="block"</script>';
        }
    }
}
