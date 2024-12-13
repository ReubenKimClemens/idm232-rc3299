<?php
$db_user = 'root';
$db_pass = 'root';
$db_name = 'recipe_database';
$db_server = 'localhost';
$link = mysqli_init();
$connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$connection->close()
?>