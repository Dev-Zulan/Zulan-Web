<?php
session_start();
include('../modules/connection.php');
include('../modules/auitlog.php');

echo 'Logging out...';

$SQL_Result = $SQL_Handle->query("SELECT user_name FROM users WHERE user_id=" . $_SESSION['user_id'] . ";");
$SQL_Row = $SQL_Result->fetch_array();

audit_log($SQL_Handle, "Authentication", "User [" . $SQL_Row[0] . "] logged out...");
echo '<script>location.replace("../index.php")</script>';

unset($_SESSION['user_id']);
session_destroy();