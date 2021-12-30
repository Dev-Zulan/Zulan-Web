<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <?php $page_name = "Home"; include('modules/head.php') ?>
<body>
    <?php
    
    include('modules/connection.php');
    
    include('modules/navbar.php');
    include('modules/portfolio.php');
    include('modules/aboutme.php');

    include('modules/footer.php');

    ?>
</body>
</html>