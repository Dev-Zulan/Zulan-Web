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
                        echo '<li id="' . $UserBar[$x]->get_id() . '">' . $UserBar[$x]->get_item() . '</li>';
                    }
                    
                    ?>
                </ul>
            </div>
            <div class="user-canvas">
                <div class="user-canvas-inenr">

                </div>
            </div>
        </div>
    </div>

    <?php include('../modules/footer.php'); ?>
</body>
</html>

<script>
    var user_sidebar = [
        document.getElementById("user-dashboard"),
        document.getElementById("user-messages"),
        document.getElementById("user-orders"),
        document.getElementById("user-settings"),
        document.getElementById("user-logout"),
    ]

    user_sidebar[4].onclick = function() {
        location.replace("logout.php")
    }

</script>