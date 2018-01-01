<?php
  // Get Test Information From Test form
  require '../db/database.php';

  // Escape all $_POST variables to protect against SQL injections
  $test_name = mysqli_real_escape_string($conn,$_POST['test_name']);
  $test_stream = mysqli_real_escape_string($conn,$_POST['test_stream']);
  $test_subject = mysqli_real_escape_string($conn,$_POST['test_subject']);
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

  

?>
