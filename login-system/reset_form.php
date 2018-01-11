<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
require '../db/database.php';
session_start();

// Make sure email and hash variables aren't empty
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = mysqli_real_escape_string($conn,$_GET['email']);
    $hash = mysqli_real_escape_string($conn,$_GET['hash']);
    // Make sure user email with matching hash exist
    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    {
        $_SESSION['message'] = "You have entered invalid URL for password reset!";
        header("location: ../error.php");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <?php include '../include/meta_include.php' ?>
    <title>Password Reset</title>
    <?php include '../include/css_include.php' ?>
</head>
<body class="bg-light">

    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <form method="POST" action="reset_password_update.php" class="card" style="margin-top: 30vh">
                    <div class="card-body m-4">
                    <h2>Choose Your New Password</h2>
                    <div class="form-group">
                        <label class="col-form-lable">New Password</label>
                        <input class="form-control" type="password" name="newpassword" required="required">
                    </div>
                    <div class="form-group">
                        <label class="col-form-lable">Confirm New Password</label>
                        <input class="form-control" type="password" name="confirmpassword" required="required">
                    </div>
                    <!-- This input field is needed, to get the email of the user -->
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="hash" value="<?php echo $hash; ?>">
                    <button type="submit" class="btn btn-dark" name="reset-apply">Apply</button>
                    <button type="button" class="btn btn-warning" name="reset-cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include '../include/js_include.php' ?>
</body>
</html>
