<?php
session_start();

echo 'Logging out...';

unset($_SESSION['user_id']);
session_destroy();

echo '<script>location.replace("../index.php")</script>';