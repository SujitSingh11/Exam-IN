<?php 
	include_once '../db/database.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	// Load composer's autoloader
	require '../vendor/autoload.php';
	session_start();

	// Escape all $_POST variables to protect against SQL injections
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$subject = mysqli_real_escape_string($conn,$_POST['subject']);
	$description = mysqli_real_escape_string($conn,$_POST['message']);

	// Send Mail to Admin
/*	$subject = 'User Query ( exam-in.com )';
   	$message_body = '
        			<h3>Hello,</h3>
        			<p>You have reseved a query from '.$name.'<br></p>
        			<p>'.$message.'</p>';

    $mail = new PHPMailer();                                  // Passing `true` enables exceptions
    try{
        // Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.mail.yahoo.com';                  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'examin.assist@yahoo.com';          // SMTP username
        $mail->Password = 'ggmldduxvkjyyxjm';                 // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;

        // Recipients
        $mail->setFrom($email,$name);
        $mail->addAddress('examin.assist@yahoo.com');                             // Add a recipient

        // Content
        $mail->isHTML(true);                                   // Set email format to HTML
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
*/
	// Inserting record into database
	$sql = "INSERT INTO contact_us (name, email, subject, message)
			VALUES ('$name','$email', '$subject', '$message')";

	if (mysqli_query($conn,$sql)) {
		$_SESSION['message'] = 'Your Query has been submited.! <br> You will hear from us soon.';
        header("location: ../success.php");
	}else{
		$_SESSION['message'] = 'Your Query has been submited.! <br> You will hear from us soon.';
        header("location: ../error.php");	
	}	
?>