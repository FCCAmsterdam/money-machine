<?php

// DB Credentials
$host = "localhost";
$user = "root";
$pass = "";
$db   = "moneymachine";

// sql connection
$conn = mysqli_connect($host, $user, $pass, $db) or die('Error connecting to MySQL server.');

if(mysqli_connect_errno($conn)) {
 echo 'Failed to connect to database: ' . mysqli_connect_error();
}
else {
 echo 'Connected Successfully!';
}


// Fetching email from DB (test)
// $query2 = "SELECT * FROM User";
// $result = mysqli_query($conn, $query);
//
// if (!$query) {
//   printf("Error: %s\n", mysqli_error($conn));
//   exit();
// }
//
// while ($row = mysqli_fetch_array($result)) {
//   echo "Email: " . $row['email'] .'<br />';
// }


// mysqli_close($conn);


?>﻿
