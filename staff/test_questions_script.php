<?php
    include '../db/database.php';
    session_start();
    if ($_SESSION['logged_in'] == false) {
        $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
        die(header('Location: ../error.php'));
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $number_of_questions = $_SESSION['number_of_questions'];
        $test_id = mysqli_real_escape_string($conn,$_SESSION['test_id']);

        for($i = 0; $i < $number_of_questions; $i++)
        {
            $question = mysqli_real_escape_string($conn,$_POST['question'][$i]);
            $option_1 = mysqli_real_escape_string($conn,$_POST['option_1'][$i]);
            $option_2 = mysqli_real_escape_string($conn,$_POST['option_2'][$i]);
            $option_3 = mysqli_real_escape_string($conn,$_POST['option_3'][$i]);
            $option_4 = mysqli_real_escape_string($conn,$_POST['option_4'][$i]);
            $correct_option = mysqli_real_escape_string($conn,$_POST['correct_option'][$i]);
            $marks = mysqli_real_escape_string($conn,$_POST['marks'][$i]);
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
            $sql = "INSERT INTO test_questions (test_id, question, option_1, option_2, option_3, option_4, correct_option, marks)
            VALUES('$test_id','$question','$option_1','$option_2','$option_3','$option_4','$correct_option_code','$marks')";
            $result = mysqli_query($conn,$sql);
        }
        $_SESSION['message'] = 'Test been Successfully Created.! To review your Test check out MY Tests tab.';
        header("location: staff_index.php");
    }
?>
