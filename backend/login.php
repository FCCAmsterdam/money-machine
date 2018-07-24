<?php

$password = $_POST['password'];

// Escape email to protect against SQL injections
$email  = $conn->escape_string($_POST['email']);
$result = $conn->query("SELECT * FROM User WHERE email='$email'");
// $user = $result->fetch_assoc();


if ( $result->num_rows == 0) { // User doesn't exist
    $_SESSION['message'] = "A user with that email doesn't exist! Try Again";
    header("location: error.php");

} else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_SESSION['password'], $user['password']) ) {

        $_SESSION['email'] = $user['email'];

        // Add firstname and lastname to database
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];

        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        // Redirects to Main page
        header("location: transaction.php");

    } else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}
