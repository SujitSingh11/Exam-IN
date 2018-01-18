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
