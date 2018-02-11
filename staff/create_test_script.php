<?php
    // Get Test Information From Test form
    require '../db/database.php';
    session_start();
    if ($_SESSION['logged_in'] == false) {
        $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
        die(header('Location: ../error.php'));
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        // Escape all $_POST variables to protect against SQL injections
        $test_name = mysqli_real_escape_string($conn,$_POST['test_name']);
        $test_stream = mysqli_real_escape_string($conn,$_POST['test_stream']);
        $test_subject = mysqli_real_escape_string($conn,$_POST['test_subject']);
        $number_of_questions = mysqli_real_escape_string($conn,$_POST['number_of_questions']);
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
            header("location: staff_index.php");
        }else {
            // Insert test information in test bank
            $sql = "INSERT INTO test_bank (staff_id, test_name, test_stream, test_subject, number_of_questions, neg_marks, test_time, test_visibility)
            VALUES ('{$_SESSION['staff_id']}','$test_name','$test_stream','$test_subject','$number_of_questions','$neg_marks','$test_time','$test_visibility')";
            $query = mysqli_query($conn,$sql);

            $sql = "SELECT * FROM test_bank WHERE test_name='$test_name'";
            $result = mysqli_query($conn,$sql);
            $test = mysqli_fetch_assoc($result);

            //Initializing SESSIONS
            $_SESSION['test_id'] = $test['test_id'];
            $_SESSION['test_name'] = $test['test_name'];
            $_SESSION['number_of_questions'] = $test['number_of_questions'];

            //Re-direct to Create test
            header("location: test_questions.php");
        }
    }

?>
