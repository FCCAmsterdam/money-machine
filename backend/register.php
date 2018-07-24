<?php

// Set session variables to be used on account.php page
$_SESSION['email']     = $_POST['email'];
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['lastname']  = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
$firstname  = $conn->escape_string($_POST['firstname']);
$lastname   = $conn->escape_string($_POST['lastname']);
$email      = $conn->escape_string($_POST['email']);
$password   = $conn->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash       = $conn->escape_string( md5( rand(0,1000) ) );

// Process to check if user with that email already exists

$result = mysqli_query($conn, "SELECT * FROM User WHERE email='$email'");

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {

    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");

} else { // Email doesn't already exist in DB

    // Attempt insert query execution
    $sql = "INSERT INTO User (firstname, lastname, email, password) VALUES ('$firstname','$lastname','$email','$password')";

    // Add user to the database
    if ( $conn->query($sql) ){

        $_SESSION['active']    = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        header("location: index.php");

    } else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}
