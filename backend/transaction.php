<?php

require 'db.php';
// Set session variables to be used on account.php page
$_SESSION['transaction_amnt'] = $_POST['transaction_amnt'];
$_SESSION['description']     = $_POST['description'];
$_SESSION['dateT']  = $_POST['dateT'];

// Escape all $_POST variables to protect against SQL injections
// $userId       = $conn->escape_string($_POST['userId']);
$transaction_amnt    = $conn->escape_string($_POST['transaction_amnt']);
$description  = $conn->escape_string($_POST['description']);
$dateT        = $conn->escape_string($_POST['dateT']);


$sql = "INSERT INTO transaction (transaction_amnt, description, dateT) VALUES ('$transaction_amnt', '$description','$dateT')";

// Add details to the database
if ( $conn->query($sql) ){

  echo "New record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}

?>
