<?php
	include '../db/database.php';
	session_start();

	if ($_SESSION['logged_in'] == false) {
        $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
        die(header('Location: ../error.php'));
    }
?>
