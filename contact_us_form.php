<?php
	include_once 'db/database.php';
	session_start();

	// Escape all $_POST variables to protect against SQL injections
	$first_name = mysqli_real_escape_string($conn,$_POST['fname']);
	$last_name = mysqli_real_escape_string($conn,$_POST['lname']);
	$email = mysqli_real_escape_string($conn,$_POST['cemail']);
	$message = mysqli_real_escape_string($conn,$_POST['message']);

	if (isset($_POST['phone'])) {
		$phone = mysqli_real_escape_string($conn,$_POST['phone']);
		// Inserting record into database
		$sql = "INSERT INTO contact_us (first_name, last_name, email, phone, message)
		VALUES ('$first_name','$last_name','$email','$phone','$message')";
	}else {
		$sql = "INSERT INTO contact_us (first_name, last_name, email, message)
		VALUES ('$first_name','$last_name','$email','$message')";
	}

	if ($query=mysqli_query($conn,$sql)) {
		$_SESSION['message'] = 'Your Query has been submited.! <br> You will hear from us soon.';
        header("location: success.php");
	}else{
		$_SESSION['message'] = 'We are facing some technical problems right now <br> Please try again later.';
        header("location: error.php");
	}
?>
