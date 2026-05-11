<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "login_system";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed");
}

?>