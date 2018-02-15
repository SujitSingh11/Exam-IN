<?php
    include '../db/database.php';
    session_start();
    if ($_SESSION['logged_in'] == false) {
        $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
        die(header('Location: ../error.php'));
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $test_id = $_SESSION['test_id'];
        $sql_test_questions = "SELECT * FROM test_questions WHERE test_id = $test_id";
        $result_test_questions = mysqli_query($conn,$sql_test_questions);
        $i = 0;
        while($row_test_questions = mysqli_fetch_assoc($result_test_questions))
        {
            $question = mysqli_real_escape_string($conn,$_POST['question'][$i]);
            $option_1 = mysqli_real_escape_string($conn,$_POST['option_1'][$i]);
            $option_2 = mysqli_real_escape_string($conn,$_POST['option_2'][$i]);
            $option_3 = mysqli_real_escape_string($conn,$_POST['option_3'][$i]);
            $option_4 = mysqli_real_escape_string($conn,$_POST['option_4'][$i]);
            $correct_option = mysqli_real_escape_string($conn,$_POST['correct_option'][$i]);
            $marks = mysqli_real_escape_string($conn,$_POST['marks'][$i]);
            $question_id = $row_test_questions['question_id'];
            if ($correct_option == 'Option 1') {
                $correct_option_code = 1;
            }
            elseif ($correct_option == 'Option 2') {
                $correct_option_code = 2;
            }
            elseif ($correct_option == 'Option 3') {
                $correct_option_code = 3;
            }
            elseif ($correct_option == 'Option 4') {
                $correct_option_code = 4;
            }
            $sql = "UPDATE test_questions SET question = '$question', option_1 = '$option_1', option_2 = '$option_2', option_3 = '$option_3', option_4 = '$option_4', correct_option = '$correct_option_code', marks = '$marks' WHERE question_id = $question_id";

            $result = mysqli_query($conn,$sql);
            $i++;
        }
        $_SESSION['message'] = 'Test been Successfully Updated.! To review your Test check out MY Tests tab.';
        header("location: staff_index.php");
    }
?>
