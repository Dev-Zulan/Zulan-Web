<?php

session_start();

include("connection.php");

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
$AdminBar[] = new AdminBar("Audit Log", "adminbar-auditlog");

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
                        echo '<a href="?admin-sidebar=' . strtolower($AdminBar[$x]->get_id()) . '"><li id="' . $AdminBar[$x]->get_id() . '">' . $AdminBar[$x]->get_item() . '</li></a>';
                    }
                    
                    ?>
                </ul>
            </div>
            <div class="admin-canvas">
                <div class="admin-canvas-inner">
                    <div class="admin-canvas-item" style="display: block;">
                        <h1>Admin Dashboard - Under Construction</h1>
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
                        <h1>Messages - Under Construction</h1>
                        <div class="user-message">
                            <p id="user-message-name">Name: Test</p>
                            <p id="user-message-overview">Message overview...</p>
                        </div>
                    </div>
                    <div class="admin-canvas-item" style="display: none;">
                        <h1>SETTINGS - Under Construction</h1>
                    </div>
                    <div class="admin-canvas-item" style="display: none;">
                        <h1>EDITUSER - Under Construction</h1>
                    </div>
                    <div class="admin-canvas-item" style="display: none;">
                        <h1>RESOURCES - Under Construction</h1>
                    </div>
                    <div class="admin-canvas-item" style="display: none;">
                        <h1>Audit Log</h1>
                        <?php

                        $SQL_Result = $SQL_Handle->query("SELECT * FROM auditlog");
                        while($SQL_Row = $SQL_Result->fetch_array()) {
                            echo '<div class="audit-log">';
                            echo '<p id="audit-log-name">' . $SQL_Row[1] . '</p>';
                            echo '<p id="audit-log-overview">' . $SQL_Row[2] . '</p>';
                            echo '<p id="audit-log-date">' . $SQL_Row[3] . '</p>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../modules/footer.php'); ?>
</body>
</html>

<?php

if(isset($_GET['admin-sidebar'])) {
    $activebar = 0;
    echo '<script>var admin_canvas = document.getElementsByClassName("admin-canvas-item")</script>';
    echo 'test';
    
    foreach($AdminBar as $x => $i) {
        if($_GET['admin-sidebar'] == strtolower($AdminBar[$x]->get_id())) {
            echo '<script>admin_canvas[' . $activebar .'].style.display="none"</script>';
            $activebar = $x;
            echo '<script>admin_canvas[' . $activebar .'].style.display="block"</script>';
        }
    }
}
