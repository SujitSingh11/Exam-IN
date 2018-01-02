<?php
// Get Test Information From Test form
require '../db/database.php';
//  if ($_SESSION['logged_in'] == true) {
# code...
//  }
// Escape all $_POST variables to protect against SQL injections
$test_name = mysqli_real_escape_string($conn,$_POST['test_name']);
$test_stream = mysqli_real_escape_string($conn,$_POST['test_stream']);
$test_subject = mysqli_real_escape_string($conn,$_POST['test_subject']);
// Negative Marking
if (isset($_POST['negative_mark'])) {
    $neg_marks = (float)mysqli_real_escape_string($conn,$_POST['on_wrong']);
}else {
    $neg_marks = "";
}
// Test Time
if (isset($_POST['test_time'])) {
    $test_time = (int)mysqli_real_escape_string($conn,$_POST['test_time_minutes']);
}else {
    $test_time = "";
}
// Test Visibility
if ($_POST['radio-stacked'] == 'public') {
    $test_visibility = 0;
}
elseif ($_POST['radio-stacked'] == 'private') {
    $test_visibility = 1;
}

// Check if test with that test name already exists
$result = $conn->query("SELECT * FROM test_bank WHERE test_name='$test_name'");

if ( $result->num_rows > 0 ) {
    $_SESSION['message'] = 'A test with that test name already exists..! <br> Please change the name of the test';
    header('location : test_form.php');
}else {
    // Insert test information in test bank
    $sql = "INSERT INTO users (staff_id, test_name, test_stream, test_subject, neg_marks, test_time, test_visibility)
    VALUES ('{$_SESSION['staff_id']}','$test_name','$test_stream','$test_subject','$neg_marks','$test_time','$test_visibility')";
    $query = mysqli_query($conn,$sql);
}

?>
