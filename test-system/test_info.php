<?php
  // Get Test Information From Test form
  require '../db/database.php';

  // Escape all $_POST variables to protect against SQL injections
  $test_name = mysqli_real_escape_string($conn,$_POST['test_name']);
  $test_stream = mysqli_real_escape_string($conn,$_POST['test_stream']);
  $test_subject = mysqli_real_escape_string($conn,$_POST['test_subject']);
  $_SESSION['staff_id'] = $staff_id;
  // Negative Marking
  if (isset($_POST['negative_mark'])) {
    $neg_marks = mysqli_real_escape_string($conn,$_POST['on_wrong']);
  }else {
    $neg_marks = "";
  }
  // Test Time
  if (isset($_POST['test_time'])) {
    $test_time = mysqli_real_escape_string($conn,$_POST['test_time_minutes']);
  }else {
    $test_time = "";
  }
  // Test Visibility
  $test_visibility = $_POST['radio-stacked'];

  // Check if user with that email already exists
  $result = $conn->query("SELECT * FROM test_bank WHERE test_name='$test_name'");

  if ( $result->num_rows > 0 ) {
      $_SESSION['message'] = 'A test with that test name already exists..! <br> Please change the name of the test';
      header('location : test_form.php');
  }

  $sql = "INSERT INTO users (staff_id, test_name, test_stream, test_subject, neg_marks, test_time, test_visibility)
           VALUES ('$staff_id','$test_name','$test_stream','$test_subject','$neg_marks','$test_time','$test_visibility')";

?>
