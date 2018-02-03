<?php
include '../db/database.php';
session_start();

if (isset($_POST['submitTest'])) {
    $test_id = $_POST['test_id'];
    $sql_test = "DELETE FROM test_bank WHERE test_id='$test_id'";
    $sql_questions = "DELETE * FROM test_questions WHERE test_id='$test_id'";
    $result_test = mysqli_query($conn,$sql_test);
    $result_questions = mysqli_query($conn,$sql_questions);
    header("location: test_manage.php");
}
?>
