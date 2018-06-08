<?php
    include_once '../db/database.php';
    session_start();
    if ($_SESSION['logged_in'] == false) {
        $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
        die(header('Location: ../error.php'));
    }
    $staff_id = $_SESSION['staff_id'];
    $sql_staff_info = "SELECT users.user_id AS user_id, staff.staff_id AS staff_id, users.first_name AS first_name, users.last_name AS last_name, users.username AS staff_username
                FROM Users
                INNER JOIN staff ON staff.user_id = users.user_id
                WHERE staff.staff_id = $staff_id";
    $result_staff_info = mysqli_query($conn,$sql_staff_info);
    $row_staff_info = mysqli_fetch_assoc($result_staff_info);
    $_SESSION['staff_username'] = $row_staff_info['staff_username'];

    $result_id = $_SESSION['result_id'];
    $sql_test_result = "SELECT * FROM test_result WHERE result_id = $result_id";
    $result_test_result = mysqli_query($conn,$sql_test_result);
    $row_test_result = mysqli_fetch_assoc($result_test_result);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../include/meta_include.php' ?>
    	<title>Test Result</title>
    	<?php include '../include/css_include.php' ?>
    	<link rel="stylesheet" href="../css/master.css">
    	<?php  include '../include/staff_navbar_css.php' ?>
        <style media="screen">
            h6 i{
                font-weight: 400;
            }
        </style>
    </head>
    <body>
        <!--Navbar-->
        <?php include '../include/student_navbar_include.php' ?>

        <!--Test Result-->
        <div class="content-wrapper my-5">
            <div class="container my-5">
                <div class="offset-1 col-md-10">
                    <div class="card mb-5 mx-5">
                        <h5 class="card-header display-4" style="font-size:30px;">Test Result</h5>
                        <div class="card-body">
                            <div class="col-md-10">
                                <hr>
                                <h5 class = "card-title">Test Information</h5>
                                <hr>
                                <h6>Test Name : <i><?php echo $_SESSION['test_name']; ?></i></h6>
                                <h6>Test Stream : <i><?php echo $_SESSION['test_stream']; ?></i></h6>
                                <h6>Test Subject : <i><?php echo $_SESSION['test_subject']; ?></i></h6>
                                <h6>Test Created by : <i><?php echo $_SESSION['staff_username']; ?></i></h6>
                                <hr>
                                <h5 class = "card-title">Result</h5>
                                <hr>
                                <h6>Total Questions : <i><?php echo $_SESSION['number_of_questions']; ?></i></h6>
                                <h6>Questions Attempted : <i><?php echo $row_test_result['attempted']; ?></i></h6>
                                <h6>Questions Not Attempted: <i>
                                    <?php
                                        if ($row_test_result['not_attempted'] == 0) {
                                            echo "None (All Attempted)</i></h6>";
                                        }else {
                                            echo $row_test_result['not_attempted']."</i></h6>";
                                        }
                                    ?>
                                <h6>Total Right Answers : <i><?php echo $row_test_result['right_answers']; ?></i></h6>
                                <h6>Total Wrong Answers : <i><?php echo $row_test_result['wrong_answers']; ?></i></h6>
                                <h6>Marks Obtained : <i><?php echo $row_test_result['marks_obtained']; ?></i></h6>
                                <h6>Total Marks : <i><?php echo $_SESSION['total_marks']; ?></i></h6>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="offset-6">
                                <div class="row ml-5">
                                    <button class="btn btn-dark mr-2" type="button" id="review_test">Review Test</button>
                                    <button class="btn btn-dark mr-2" type="button"  data-toggle="modal" data-target="#query">Submit Query</button>
                                    <button class="btn btn-info mr-2" type="button" id="home">Home</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Modals-->
        <div id="query" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
    			<div class="modal-content">
    				<div class="modal-header">
                        <h5 class="modal-title display-4" style="font-size:30px;">Submit Query to <?php echo $_SESSION['staff_username']; ?> </h5>
    					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    					</button>
                    </div>
                    <form action="student_query_script.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Subject :</label>
                                <input class="form-control" type="text" name="subject" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <label>Query :</label>
                                <textarea class="form-control" name="name" rows="10" cols="50" placeholder="Write your query here..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-dark" type="submit">Submit</button>
                        </div>
                    </form>
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
            document.getElementById("home").onclick = function () {
                location.href = "../student/student_index.php";
            };
            document.getElementById("review_test").onclick = function () {
                location.href = "../student/test_result_review.php";
            };
        </script>
    </body>
</html>
