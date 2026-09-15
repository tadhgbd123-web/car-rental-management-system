<?php

$hostname = "localhost";
$username = "DATABASE_USERNAME";
$password = "DATABASE_PASSWORD";
$dbname = "CarRental3";

$con = mysqli_connect(
    $hostname,
    $username,
    $password,
    $dbname
);

if (!$con) {
    die("Failed to connect to MySQL");
}
?>