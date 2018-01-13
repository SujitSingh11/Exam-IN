<?php
    $subject = 'User Query ( exam-in.com )';
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