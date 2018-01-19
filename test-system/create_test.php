<?php
    include_once '../db/database.php';
    session_start();

    // Escape all $_POST variables to protect against SQL injections
    $test_question = mysqli_real_escape_string($conn,$_POST['']);
    $test_option_1 = mysqli_real_escape_string($conn,$_POST['']);
    $test_option_2 = mysqli_real_escape_string($conn,$_POST['']);
    $test_option_3 = mysqli_real_escape_string($conn,$_POST['']);
    $test_option_4 = mysqli_real_escape_string($conn,$_POST['']);
?>
