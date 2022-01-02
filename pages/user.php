<?php

session_start();

if(!isset($_SESSION['user_id'])) {
    echo '<script>location.replace("../index.php")</script>';
    return;
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
                    <a href=""><li>Dashboard</li></a>
                    <a href=""><li>Messages</li></a>
                    <a href=""><li>Sidebar</li></a>
                    <a href=""><li>Sidebar</li></a>
                    <a href=""><li>Sidebar</li></a>
                    <a href=""><li>Sidebar</li></a>
                    <a href=""><li>Logout</li></a>

                </ul>
            </div>
            <div class="user-canvas">
                
            </div>
        </div>
    </div>

    <?php include('../modules/footer.php'); ?>
</body>
</html>