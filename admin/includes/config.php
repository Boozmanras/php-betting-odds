<?php
/*
$servername = "localhost";
$username = "easyqash_victor";
$password = "Wakhungu^2002";
$dbname = "easyqash_kudosbet";
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "betting";

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$db) {
    die("Server error!!");
}
?>