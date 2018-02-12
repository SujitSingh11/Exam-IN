<?php
    include_once '../db/database.php';
    session_start();

    if ($_SESSION['logged_in'] == false) {
        $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
        die(header('Location: ../error.php'));
    }
    $sql = "SELECT * FROM test_bank";
    $result = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
<head>
    <?php  include '../include/meta_include.php' ?>
    <meta charset="utf-8">
    <title>Test Bank</title>
    <?php  include '../include/css_include.php' ?>
    <link rel="stylesheet" href="../css/master.css">
    <?php  include '../include/staff_navbar_css.php' ?>
</head>
<body>
    <!--Navbar-->
    <?php
        if ($_SESSION['user_type']==1) {
            include '../include/staff_navbar_include.php';
        }
        elseif ($_SESSION['user_type']==2) {
            include '../include/student_navbar_include.php';
        }
    ?>
    <!--Test Bank-->
    <div class="content-wrapper my-5">
        <div class="container my-3">
            <h2 class="ml-5 display-4" style="font-size:30px;">Test Bank</h2>
            <hr>
            <?php
                echo "<div class='row mx-5'>";
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['neg_marks'] > 0) {
                            $neg_marks = 'YES';
                        }else {
                            $neg_marks = 'NO';
                        }
                        if ($row['test_time'] > 0) {
                            $test_time = 'YES';
                        }else {
                            $test_time = 'NO';
                        }
                        echo"<div class='col-md-4 my-4'>
                                <div class='card' style='width: 18rem;'>";
                                    if ($_SESSION['user_type']==1) {
                                        echo "<form class='card-body' action='../staff/test_review.php' method='POST'>";
                                    }
                                    elseif ($_SESSION['user_type']==2) {
                                        echo "<form class='card-body' action='../student/test_attempt.php' method='POST'>";
                                    }
                                echo"   <h5 class='card-title display-4' style='font-size:25px;'><i>".$row['test_name']."</i></h5>
                                        <h6 class='card-subtitle mb-1 text-muted'><i>".$row['test_stream']."</i></h6>
                                        <h7 class='card-subtitle mb-3 text-muted'><i>".$row['test_subject']."</i></h7>
                                        <p class='card-text'>Number of questions: <i>".$row['number_of_questions']."</i></p>
                                        <p class='card-text'>Negative Marks: <i>".$neg_marks."</i></p>";
                                        if ($row['neg_marks'] > 0) {
                                            echo "<p class='card-text'>Wrong Option: <i>-".$row['neg_marks']."</i></p>";
                                        }
                            echo"       <p class='card-text'>Test Time: <i>".$test_time."</i></p>";
                                        if ($row['test_time'] > 0) {
                                            echo "<p class='card-text'>Total Time: <i>".$row['test_time']."</i></p>";
                                        }
                            echo"       <input type='hidden' name='test_id' value='".$row['test_id']."'>
                                        <input type='hidden' name='test_name' value='".$row['test_name']."'>";
                                        if ($_SESSION['user_type']==1) {
                                            echo "<button type='submit' class='btn btn-outline-warning'>Review</button>";
                                        }
                                        elseif ($_SESSION['user_type']==2) {
                                            echo "<button type='submit' class='btn btn-outline-success'>Attempt</button>";
                                        }
                            echo"   </form>
                                </div>
                            </div>";
                    }
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    <!--Footer-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Exam-in 2018</small>
            </div>
        </div>
    </footer>
    <?php  include '../include/create_test_modal_include.php' ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <?php include '../include/js_include.php' ?>
    <?php include '../include/staff_master_js_include.php' ?>
</body>
</html>
