<?php

require 'db.php';

// Take data from DB and encode into JSON
$result = mysqli_query($conn, "SELECT * FROM transaction");
$rows = array();
   while($r = mysqli_fetch_assoc($result)) {
     $rows['object_name'][] = $r;
   }

 print json_encode($rows);



// Take data and decode in php
// $url = 'data.json'; // path to your JSON file
// $data = file_get_contents($url); // put the contents of the file into a variable
// $characters = json_decode($data); // decode the JSON feed
// $characters = json_decode($data, true);
//
// echo $characters[0]->name;
// echo $characters[0]['race'];
// foreach ($characters as $character) {
// 	echo $character->name . '<br>';
// }


?>
