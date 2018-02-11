<?php
    include '../db/database.php';
    session_start();
    
    if ($_SESSION['logged_in'] == false) {
        $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
        die(header('Location: ../error.php'));
    }
    if (isset($_POST['submitStud']) OR isset($_POST['submitStaff'])) {
        $user_id = $_POST['user_id'];
        $sql_users = "DELETE FROM users WHERE user_id='$user_id'";
        if (isset($_POST['stud_id'])) {
            $stud_id = $_POST['stud_id'];
            $sql_stud = "DELETE FROM student WHERE stud_id='$stud_id'";
            $result = mysqli_query($conn,$sql_users);
            $result_stud = mysqli_query($conn,$sql_stud);
            header("location: admin_index.php");
        }
        if (isset($_POST['staff_id'])) {
            $staff_id = $_POST['staff_id'];
            $sql_staff = "DELETE FROM staff WHERE staff_id='$staff_id'";
            $result = mysqli_query($conn,$sql_users);
            $result_staff = mysqli_query($conn,$sql_staff);
            header("location: admin_index.php");
        }
    }
?>
