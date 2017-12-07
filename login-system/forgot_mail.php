<?php 
/* Reset your password form, sends reset.php password link */
require '../db/database.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load composer's autoloader
require '../vendor/autoload.php';
session_start();

// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: ../error.php");
    }
    else { // User exists (num_rows != 0)

        $user = $result->fetch_assoc(); // $user becomes array with user data
        
        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        // Session message to display on success.php
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!</p>";

        // Send registration confirmation link (reset.php)
        $subject = 'Password Reset Link ( exam-in.com )';
        $message_body = '
        Hello '.$first_name.',<br>
        You have requested password reset!<br>
        Please click this link to reset your password:<br>
        http://localhost/Exam-IN/login-system/reset_form.php?email='.$email.'&hash='.$hash;  

        $mail = new PHPMailer();                                      // Passing `true` enables exceptions
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
}

?>