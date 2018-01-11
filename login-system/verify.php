<?php 
/* Verifies registered user email, the link to this page
   is included in the register.php email message
*/
require '../db/database.php';
session_start();

// Make sure email and hash variables aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = mysqli_real_escape_string($conn,$_GET['email']);
    $hash = mysqli_real_escape_string($conn,$_GET['hash']);

    // Select user with matching email and hash, who hasn't verified their account yet (active = 0)
    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND hash='$hash' AND active='0'");

    if ( $result->num_rows == 0 )
    {
        $_SESSION['message'] = "Account has already been activated or the URL is invalid!";

        header("location: ../error.php");
    }
    else {
        $_SESSION['message'] = "Your account has been activated, Please login..";

        // Set the user status to active (active = 1)
        $conn->query("UPDATE users SET active='1' WHERE email='$email'");

        header("location: ../success.php");
    }
}
else {
    $_SESSION['message'] = "Invalid parameters provided for account verification!";
    header("location: ../error.php");
}
?>
