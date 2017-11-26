<?php

// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['first']);
$last_name = $mysqli->escape_string($_POST['last']);
$username = $mysqli->escape_string($_POST['username']);
$email = $mysqli->escape_string($_POST['email']);
$pass = $mysqli->escape_string($_POST['password']);
$passcheck = $mysqli->escape_string($_POST['re-password']);
$user_type = $mysqli->escape_string($_POST['user-type']);

if($pass=$passcheck)
{
    $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = $mysqli->escape_string( md5( rand(0,1000) ) );
          
    // Check if user with that email already exists
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

    // We know user email exists if the rows returned are more than 0
    if ( $result->num_rows > 0 ) {
        
        $_SESSION['message'] = 'User with this email already exists!';
        header("location: error.php");
        
    }
    else { 
        // Email doesn't already exist in a database, proceed...

        // active is 0 by DEFAULT (no need to include it here)
        $sql = "INSERT INTO users (first_name, last_name, username, email, password, hash, usertype) " 
                . "VALUES ('$first_name','$last_name','$username','$email','$password', '$hash', '$user_type')";

        // Add user to the database
        if ( $mysqli->query($sql) ){

            $_SESSION['message'] =
                     "Confirmation link has been sent to $email, please verify
                     your account by clicking on the link in the message!";

            // Send registration confirmation link (verify.php)
            $to      = $email;
            $subject = 'Account Verification ( exam-in.com )';
            $message_body = '
            Hello '.$first_name.',

            Thank you for signing up!

            Please click this link to activate your account:

            http://localhost/Exam-IN/verify.php?email='.$email.'&hash='.$hash;  

            mail( $to, $subject, $message_body );

            header("location: success.php");

        }

        else {
            $_SESSION['message'] = 'Registration failed!';
            header("location: ../error.php");
        }
     }
}
else{
    $_SESSION['message'] = 'Password do not match please try again';
    header("location: ../error.php");
}