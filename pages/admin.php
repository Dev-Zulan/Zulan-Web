<?php

session_start();

class AdminSidebar {

}

if(!isset($_SESSION['user_id'])) {
    echo '<script>location.replace("../index.php")</script>';
    return;
}

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
                    <li>Dashboard</li>
                    <li>Messages</li>
                    <li>Website Settings</li>
                    <li>Edit User</li>
                    <li>Statistics</li>
                    <li>Resources</li>
                    <li>Sidebar</li>
                    <li>Sidebar</li>

                </ul>
            </div>
            <div class="admin-canvas">
                
            </div>
        </div>
    </div>

    <?php include('../modules/footer.php'); ?>
</body>
</html>