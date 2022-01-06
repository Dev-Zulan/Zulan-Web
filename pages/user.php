<?php

session_start();

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
                        <h1>User Dashboard</h1>
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
