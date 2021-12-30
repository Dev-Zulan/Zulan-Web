<?php

$SQL_Host = getenv('SQL_HOST');
$SQL_User = getenv('SQL_USER');
$SQL_Password = getenv('SQL_PASSWORD');
$SQL_Database = getenv('SQL_DATABASE');

$SQL_Handle = new mysqli($SQL_Host, $SQL_User, $SQL_Password, $SQL_Database);

if($SQL_Handle->connect_error) {
    echo '<script>console.log("Error connecting to the database: ")</script>';
    die("Error connecting to the database: " . $SQL_Handle->connect_error);
    return;
} else {
    echo '<script>console.log("Connected to MySQL Database!")</script>';
}

