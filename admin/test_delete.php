<?php
include '../db/database.php';
session_start();

if ($_SESSION['logged_in'] == false) {
    $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
    die(header('Location: ../error.php'));
}
if (isset($_POST['submitTest'])) {
    $test_id = $_POST['test_id'];
    $sql_test = "DELETE FROM test_bank WHERE test_id='$test_id'";
    $sql_questions = "DELETE FROM test_questions WHERE test_id='$test_id'";
    $sql_result_id = "SELECT * FROM test_result WHERE test_id='$test_id'";
    $result_test_result_id = mysqli_query($conn,$sql_result_id);
    while ($row_result = mysqli_fetch_assoc($result_test_result_id)) {
        $sql_attempted = "DELETE FROM test_attempted WHERE result_id = {$row_result['result_id']}";
        $result_attempted = mysqli_query($conn,$sql_attempted);
    }
    $sql_result = "DELETE FROM test_result WHERE test_id='$test_id'";
    $result_test = mysqli_query($conn,$sql_test);
    $result_questions = mysqli_query($conn,$sql_questions);
    $result_test_result = mysqli_query($conn,$sql_result);
    if ($_SESSION['user-type']==0) {
        header("location: test_manage.php");
    }elseif ($_SESSION['user-type']==1) {
        header("location: ../staff/my_test.php");
    }

}
?>
