<?php
	include '../db/database.php';
	session_start();

	if ($_SESSION['logged_in'] == false) {
		$_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
		die(header('Location: ../error.php'));
	}
    $test_name = $_POST['test_name'];
    $test_id = $_POST['test_id'];
    $sql = "SELECT * FROM test_questions WHERE test_id = $test_id";
    $result = mysqli_query($conn,$sql);

	$sql_total_marks = "SELECT SUM(marks) AS total_marks FROM test_questions WHERE test_id = $test_id";
	$result_total_marks = mysqli_query($conn,$sql_total_marks);
	$row_total_marks = mysqli_fetch_assoc($result_total_marks);


	$sql_test_info = "SELECT * FROM test_bank WHERE test_id = $test_id";
	$result_test_info = mysqli_query($conn,$sql_test_info);
	$row_test_info = mysqli_fetch_assoc($result_test_info);
	$test_time = $row_test_info['test_time'];
?>
<!DOCTYPE html>
<html>
<head>
	<?php include '../include/meta_include.php' ?>
	<title><?php echo $test_name; ?></title>
	<?php include '../include/css_include.php' ?>
	<link rel="stylesheet" href="../css/master.css">
	<?php  include '../include/staff_navbar_css.php' ?>
</head>
<body>
	<!--Navbar-->
	<?php include '../include/student_navbar_include.php' ?>

    <!--Attempt Test-->
	<div class="content-wrapper my-5">
        <div class="container my-5">
            <div class="card mb-5 mx-5">
                <h5 class="card-header display-4" style="font-size:30px;"><?php echo $test_name; ?></h5>
                <form id="test" action="test_attempt_script.php" method="POST" class="card-body">
                    <?php
						// Notification
                        if (isset($_SESSION['message']) AND !empty($_SESSION['message'])){
                            echo "<div class='alert alert-warning' role='alert'>".$_SESSION['message']."</div><br>";
                        }
                        unset($_SESSION["message"]);
						// Attempt Test
						$i = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='card my-3 mx-4'>
                                    <h5 class='card-header display-4' style='font-size:30px;'>".($i+1).". ".$row['question']."</h5>
                                    <div class='card-body'>
                                        <div class='row'>
                                            <div class='mx-4 my-3 col-md-5'>
												<div class='row'>
													<p><b>A.</b> ".$row['option_1']."</p>
												</div>
												<div class='row'>
													<p><b>B.</b> ".$row['option_2']."</p>
												</div>
												<div class='row'>
													<p><b>C.</b> ".$row['option_3']."</p>
												</div>
												<div class='row'>
													<p><b>D.</b> ".$row['option_4']."</p>
												</div>
											</div>
                                            <div class='offset-2 col-md-3'>
												<div class='row'>
													<label class='mr-sm-2' for='inlineFormCustomSelect'>Select Answer :</label>
													<select class='custom-select mr-sm-5' id='inlineFormCustomSelect'  name='answer[]'>
														<option selected>Choose Answer...</option>
														<option>A</option>
														<option>B</option>
														<option>C</option>
														<option>D</option>
													</select>
												</div>
                                            </div>
                                        </div>
										<input type='hidden' name='question_id[]' value='".$row['question_id']."'>
										<input type='hidden' name='correct_option[]' value='".$row['correct_option']."'>
										<input type='hidden' name='marks[]' value='".$row['marks']."'>
                                    </div>
                                </div>";
                            $i++;
                        }
                    ?>
					<input type="hidden" name="test_id" value="<?php echo $test_id; ?>">
					<input type="hidden" name="staff_id" value="<?php echo $row_test_info['staff_id']; ?>">
					<input type="hidden" name="test_name" value="<?php echo $test_name; ?>">
					<input type="hidden" name="test_stream" value="<?php echo $row_test_info['test_stream']; ?>">
					<input type="hidden" name="test_subject" value="<?php echo $row_test_info['test_subject']; ?>">
					<input type="hidden" name="number_of_questions" value="<?php echo $row_test_info['number_of_questions']; ?>">
					<input type="hidden" name="neg_marks" value="<?php echo $row_test_info['neg_marks']; ?>">
					<input type="hidden" name="test_time" value="<?php echo $test_time; ?>">
					<input type="hidden" name="total_marks" value="<?php echo $row_total_marks['total_marks']; ?>">
					<button class="btn btn-dark offset-11" type="button" data-toggle="modal" data-target="#sure">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<!--Modals-->
    <div id="sure" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
                    <h5 class="modal-title display-4" style="font-size:30px;">Are you Sure.?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
                </div>
                <div class="modal-body">
                    <p>Click '<i>Commit</i>' if you want to Submit the test<br></p>
                </div>
                <div class="modal-footer">
                    <button form="test" class="btn btn-dark"  name="submitTest" type="submit">Commit</button>
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
</body>
</html>
