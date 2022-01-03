<?php

session_start();

if(!isset($_SESSION['user_id'])) {
    echo '<script>location.replace("../index.php")</script>';
    return;
}

class AdminBar {
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

$AdminBar[] = new AdminBar("Dashboard", "adminbar-dashboard");
$AdminBar[] = new AdminBar("Messages", "adminbar-messages");
$AdminBar[] = new AdminBar("Website Settings", "adminbar-settings");
$AdminBar[] = new AdminBar("Edit User", "adminbar-edituser");
$AdminBar[] = new AdminBar("Resources", "adminbar-resources");

$dashboard_stats[] = array(1000, "ACTIVE USERS", "rgb(212, 118, 118)");
$dashboard_stats[] = array(500, "CURRENT CUSTOMERS", "rgb(82, 189, 60)");
$dashboard_stats[] = array(1000, "ONGOING PROJECTS", "rgb(60, 189, 183)");
$dashboard_stats[] = array(1000, "ACTIVE INQUIRIES", "rgb(131, 60, 189)");

?>

<!DOCTYPE html>
<html lang="en">
    <?php $page_name = "Admin"; include('../modules/head.php') ?>
<body>
    <?php include('../modules/navbar.php'); ?>

    <div class="admin">
        <div class="admin-inner">
            <div class="admin-sidebar">
                <h1>ADMIN</h1>
                <ul>
                    <?php
                    
                    foreach($AdminBar as $x => $i) {
                        echo '<li id="' . $AdminBar[$x]->get_id() . '">' . $AdminBar[$x]->get_item() . '</li>';
                    }
                    
                    ?>
                </ul>
            </div>
            <div class="admin-canvas">
                <div class="admin-canvas-inner">
                    <div class="admin-canvas-item" style="display: block;">
                        <h1>Admin Dashboard</h1>
                        <div class="dashboard-stats">
                            <?php

                            foreach($dashboard_stats as $x => $i) {
                                echo
                                '<div id="dashboard-stats-' . $x+1 . '" style="flex: 1; margin: 5px; border-radius: 15px; background-color: ' . $dashboard_stats[$x][2] . '; padding: 15px;">' .
                                '<div class="stats-amount"><h1>' . $dashboard_stats[$x][0] . '</h1><img src="../resources/stats-icon-' . $x+1 . '.png" width="50px" height="50px"></div>' .
                                '<div class="stats-title">' . $dashboard_stats[$x][1] . '</div>' .
                                '</div>';
                            }
                            
                            ?>

                        </div>
                        <div class="stats-earnings">
                        </div>
                        <div class="stats-totals">
                            <div class="stats-total"></div>
                            <div class="stats-total"></div>
                        </div>
                    </div>
                    <div class="admin-canvas-item" style="display: none;">
                        <h1>MESSAGES</h1>
                    </div>
                    <div class="admin-canvas-item" style="display: none;">
                        <h1>SETTINGS</h1>
                    </div>
                    <div class="admin-canvas-item" style="display: none;">
                        <h1>EDITUSER</h1>
                    </div>
                    <div class="admin-canvas-item" style="display: none;">
                        <h1>RESOURCES</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../modules/footer.php'); ?>
</body>
</html>

<script>
    var admin_sidebar = [
        document.getElementById("adminbar-dashboard"),
        document.getElementById("adminbar-messages"),
        document.getElementById("adminbar-settings"),
        document.getElementById("adminbar-edituser"),
        document.getElementById("adminbar-resources"),
    ]

    var admin_canvas = document.getElementsByClassName("admin-canvas-item")
    var active_bar = 0
    
    admin_sidebar[0].onclick = function() {
        admin_canvas[active_bar].style.display = "none"
        active_bar = 0
        admin_canvas[0].style.display = "block"
    }
    admin_sidebar[1].onclick = function() {
        admin_canvas[active_bar].style.display = "none"
        active_bar = 1
        admin_canvas[1].style.display = "block"
    }
    admin_sidebar[2].onclick = function() {
        admin_canvas[active_bar].style.display = "none"
        active_bar = 2
        admin_canvas[2].style.display = "block"
    }
    admin_sidebar[3].onclick = function() {
        admin_canvas[active_bar].style.display = "none"
        active_bar = 3
        admin_canvas[3].style.display = "block"
    }
    admin_sidebar[4].onclick = function() {
        admin_canvas[active_bar].style.display = "none"
        active_bar = 4
        admin_canvas[4].style.display = "block"
    }

    
</script>