<?php
/* User login process, checks if user exists and password is correct */
require '../db/database.php';
session_start();

// Escape email to protect against SQL injections
$email = mysqli_real_escape_string($conn,$_POST['email']);
$result = $conn->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: ../error.php");
}
else { // User exists
    
    $user = $result->fetch_assoc();
    //Password Decrypt


    if ( password_verify($_POST['password'], $user['password']) ) {
        //Check wether the account has been verified or not
        if ($user['active'] == 1) {
            //Initilize the session variables   
            $_SESSION['email'] = $user['email'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['active'] = $user['active'];
            $_SESSION['user_type'] = $user['user_type'];

            // This is how we'll know the user is logged in
            $_SESSION['logged_in'] = true;

            //Redirect to logged-in page
            if ($_SESSION['user_type'] == 0) {
                header("location: ../admin/admin_index.php");
            }
            elseif ($_SESSION['user_type'] == 1) {
                header("location: ../staff/staff_index.php");
            }
            elseif ($_SESSION['user_type'] == 2) {
                header("location: ../student/student_index.php");
            }
        }
        else{
            $_SESSION['message'] = "Your account has not been verified please check your mail and activate your account";
            header("location: ../error.php");
        }         

    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: ../error.php");
    }
}


