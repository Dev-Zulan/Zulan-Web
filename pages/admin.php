<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <?php $page_name = "Contacts"; include('../modules/head.php') ?>
<body>
    <?php include('../modules/navbar.php'); ?>

    <div class="admin">
        <div class="admin-inner">
            <div class="admin-sidebar">
                <h1>ADMIN</h1>
                <ul>
                    <a href=""><li>Dashboard</li></a>
                    <a href=""><li>Messages</li></a>
                    <a href=""><li>Website Settings</li></a>
                    <a href=""><li>Edit User</li></a>
                    <a href=""><li>Statistics</li></a>
                    <a href=""><li>Resources</li></a>
                    <a href=""><li>Sidebar</li></a>
                    <a href=""><li>Sidebar</li></a>

                </ul>
            </div>
            <div class="admin-canvas">
                
            </div>
        </div>
    </div>

    <?php include('../modules/footer.php'); ?>
</body>
</html>