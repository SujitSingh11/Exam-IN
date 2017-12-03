<?php
include_once '../db/database.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load composer's autoloader
require '../vendor/autoload.php';
session_start();

// Escape all $_POST variables to protect against SQL injections
$first_name = mysqli_real_escape_string($conn,$_POST['first']);
$last_name = mysqli_real_escape_string($conn,$_POST['last']);
$username = mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$pass = mysqli_real_escape_string($conn,$_POST['password']);
$passcheck = mysqli_real_escape_string($conn,$_POST['re-password']);
$user_type = mysqli_real_escape_string($conn,$_POST['user-type']);

if($pass=$passcheck)
{   // Password Encription 
    $password = $conn->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = $conn->escape_string( md5( rand(0,1000) ) );
          
    // Check if user with that email already exists
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    // We know user email exists if the rows returned are more than 0
    if ( $result->num_rows > 0 ) {
        
        $_SESSION['message'] = 'User with this email already exists!';
        header("location: ../error.php");
        
    }
    else { // Email doesn't already exist in a database, proceed...

        // Classifying Type of User
        if ($user_type=="Student") {
            $user_rank = 2;
        }
        elseif ($user_type=="Staff") {
            $user_rank = 1;
        }
        elseif ($user_type=="Admin") {
            $user_rank = 0;
        }
        
        // active is 0 by DEFAULT (no need to include it here)
        $sql = "INSERT INTO users (first_name, last_name, username, email, password, hash, user_type) 
                 VALUES ('$first_name','$last_name','$username','$email','$password', '$hash', '$user_rank')";
        $query = mysqli_query($conn,$sql);
        // Add user to the database

        if ($query){

            $_SESSION['message'] =
                     "Confirmation link has been sent to $email, please verify
                     your account by clicking on the link in the message!";
            //Mail format
            $subject = 'Account Verification ( exam-in.com )';
            $message_body = '
            <h3>Hello '.$first_name.',</h3>
            <p>Thank you for signing up!<br> 
            Please click this link to activate your account:<br></p>
            http://localhost/Exam-IN/login-system/verify.php?email='.$email.'&hash='.$hash;
            $mail = new PHPMailer();                              // Passing `true` enables exceptions
            try{
                //Server settings
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.mail.yahoo.com';                  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'examin.assist@yahoo.com';          // SMTP username
                $mail->Password = 'ggmldduxvkjyyxjm';                 // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;    
                
                //Recipients
                $mail->setFrom('examin.assist@yahoo.com','Exam-In');
                $mail->addAddress($email);     // Add a recipient
                
                //Content
                $mail->isHTML(true);           // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message_body;
               if (!$mail->send()) {
                    echo "Mail not sent";
                }else{
                    header("location: ../success.php");
                }             
            }
            catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
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