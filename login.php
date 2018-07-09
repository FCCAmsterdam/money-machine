<?php

// USER LOGIN PROCESSES

// Escape email to protect against SQL injections
$email  = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0) { // User doesn't exist
    $_SESSION['message'] = "A user with that email doesn't exist! Try Again";
    header("location: error.php");

} else if( empty($_POST['email']) || empty($_POST['password']) ) {
    $_SESSION['message'] = "Email or Password is empty! Please fill it in.";
    // $this->HandleError("Email or Password is empty! Please fill it in.");
    return false;

} else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {

        $_SESSION['email'] = $user['email'];

        // In case we add firstname and lastname to database
        // $_SESSION['first_name'] = $user['first_name'];
        // $_SESSION['last_name'] = $user['last_name'];

        // This is how we'll know the user is logged in
        // $_SESSION['logged_in'] = true;

        // Redirects to Profile page
        header("location: profile.php");
    } else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}
