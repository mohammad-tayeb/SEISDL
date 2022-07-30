<?php
$username = "root";
$password = "";
$hostname = "localhost";
$db = "website";


$conn = mysqli_connect($hostname, $username, $password, $db);


if (!$conn) {
    die("connection faile:" . mysqli_connect_error());
}
