<?php

$sever ="localhost";
$username= "root";
$password="root";
$db="gps";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    die("connection failed: ". mysqli_connect_error());
}

?>
