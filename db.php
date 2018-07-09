<?php
/* Database connection settings */
$host = "localhost";
$user = "root";
$pass = "";
$db   = "moneymachine";
$conn = mysqli_connect($host, $user, $pass, $db) or die($mysqli->error);
