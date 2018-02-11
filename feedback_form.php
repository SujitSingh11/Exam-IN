<?php
	include_once 'db/database.php';
	session_start();

	// Escape all $_POST variables to protect against SQL injections
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$feedback = mysqli_real_escape_string($conn,$_POST['feedback']);

	$sql = "INSERT INTO feedback (name, email, feedback)
	VALUES ('$name','$email','$feedback')";

	if (mysqli_query($conn,$sql)) {
		$_SESSION['message'] = 'Your feedback has been submited.! <br> You will hear from us soon.';
        header("location: success.php");
	}else{
		$_SESSION['message'] = 'We are experiencing some tecchnical difficulties <br> Please try again.!.';
        header("location: error.php");
	}
?>
