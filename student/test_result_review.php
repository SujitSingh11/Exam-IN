<?php
    include_once '../db/database.php';
    session_start();
    if ($_SESSION['logged_in'] == false) {
        $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
        die(header('Location: ../error.php'));
    }
    $test_id = $_SESSION['test_id'];
    $result_id = $_SESSION['result_id'];
    $test_name = $_SESSION['test_name'];
    $sql = "SELECT test_questions.question_id AS question_id, test_questions.question AS question, test_questions.option_1 AS option_1, test_questions.option_2 AS option_2, test_questions.option_3 AS option_3, test_questions.option_4 AS option_4, test_questions.correct_option AS correct_option, test_questions.marks AS marks, test_attempted.answer AS answer
            FROM test_questions
            INNER JOIN test_attempted ON test_attempted.question_id = test_questions.question_id
            WHERE test_questions.test_id = $test_id AND test_attempted.result_id = $result_id";

    $result = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../include/meta_include.php' ?>
    	<title>Test Result Review</title>
    	<?php include '../include/css_include.php' ?>
    	<link rel="stylesheet" href="../css/master.css">
    	<?php  include '../include/staff_navbar_css.php' ?>
    </head>
    <body>
        <!--Navbar-->
        <?php include '../include/student_navbar_include.php' ?>

        <!--Test Result-->
        <div class="content-wrapper my-5">
            <div class="container my-5">
                <div class="card mb-5 mx-5">
                    <h5 class="card-header display-4" style="font-size:30px;">Test Review</h5>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $test_name; ?></h5>
                        <?php
                            $not_attempt = null;
                            if (isset($_SESSION['message']) AND !empty($_SESSION['message'])){
                                echo "<div class='alert alert-warning' role='alert'>".$_SESSION['message']."</div><br>";
                            }
                            unset($_SESSION["message"]);

                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['correct_option'] == 1) {
                                    $correct_option = "A";
                                }
                                elseif ($row['correct_option'] == 2) {
                                    $correct_option = "B";
                                }
                                elseif ($row['correct_option'] == 3) {
                                    $correct_option = "C";
                                }
                                elseif ($row['correct_option'] == 4) {
                                    $correct_option = "D";
                                }
                                if ($row['answer'] == 1) {
                                    $answer_code = "A";
                                }
                                elseif ($row['answer'] == 2) {
                                    $answer_code = "B";
                                }
                                elseif ($row['answer'] == 3) {
                                    $answer_code = "C";
                                }
                                elseif ($row['answer'] == 4) {
                                    $answer_code = "D";
                                }
                                elseif ($row['answer'] == 0) {
                                    $answer_code = "<i>Not Attempted</i>";
                                    $not_attempt = 1;
                                }
                                if ($not_attempt == 1) {
                                    echo"<div class='card my-3 mx-4 text-white bg-info'>";
                                    $not_attempt = 0;
                                }else {
                                    echo "<div class='card my-3 mx-4 text-white ".($correct_option == $answer_code?"bg-success":"bg-danger")."'>";
                                }
                                echo"   <h5 class='card-header display-4' style='font-size:30px;'>".($i+1).". ".$row['question']."</h5>
                                        <div class='card-body'>
                                            <div class='row'>
                                                <div class='mx-4 col-md-5'>
                                                    <div class='row'>
                                                        <p>A. ".$row['option_1']."</p>
                                                    </div>
                                                    <div class='row'>
                                                        <p>B. ".$row['option_2']."</p>
                                                    </div>
                                                    <div class='row'>
                                                        <p>C. ".$row['option_3']."</p>
                                                    </div>
                                                    <div class='row'>
                                                        <p>D. ".$row['option_4']."</p>
                                                    </div>
                                                </div>
                                                <div class='offset-2 col-md-4'>
                                                    <div class='row'>
                                                        <p><i>Marks </i>: ".$row['marks']."</p>
                                                    </div>
                                                    <div class='row'>
                                                        <p><i>Correct Option </i>: ".$correct_option."</p>
                                                    </div>
                                                    <div class='row'>
                                                        <p><i>Your Answer </i>: ".$answer_code."</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                $i++;
                            }
                        ?>
                    </div>
                    <div class="card-footer">
                        <div class="offset-11">
                            <button class="btn btn-dark" type="button" id="back">Back</button>
                        </div>
                    </div>
                </div>
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
        <script>
            document.getElementById("back").onclick = function () {
                location.href = "../student/test_result.php";
            };
        </script>
    </body>
</html>
