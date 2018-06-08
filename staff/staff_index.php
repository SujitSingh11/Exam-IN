<?php
	include '../db/database.php';
	session_start();
	if ($_SESSION['logged_in'] == false) {
        $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
        die(header('Location: ../error.php'));
    }

	$sql_test = "SELECT test_result.result_id AS result_id, test_result.stud_id AS stud_id, test_result.test_id AS test_id, test_bank.staff_id AS staff_id, test_bank.test_name AS test_name, test_result.attempted AS attempted, test_result.not_attempted AS not_attempted, test_result.wrong_answers AS wrong_answers, test_result.right_answers AS right_answers, test_result.marks_obtained AS marks_obtained, test_result.total_marks AS total_marks
	FROM test_result
	INNER JOIN test_bank ON test_result.test_id = test_bank.test_id
	WHERE test_bank.staff_id = {$_SESSION['staff_id']}";

	$result_test = mysqli_query($conn,$sql_test);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include '../include/meta_include.php' ?>
	<title>Exam-In Staff</title>
	<?php include '../include/css_include.php' ?>
	<link rel="stylesheet" href="../css/master.css">
	<?php  include '../include/staff_navbar_css.php' ?>
</head>
<body>
	<!--Navbar-->
	<?php include '../include/staff_navbar_include.php' ?>

	<div class="content-wrapper my-5">
		<div class="container my-5">
			<!--Staff Dashboard-->
			<?php
				if (isset($_SESSION['message']) AND !empty($_SESSION['message'])){
					echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>".$_SESSION['message']."</div><br>";
				}
				unset($_SESSION["message"]);

				$sql = "SELECT * FROM test_bank WHERE staff_id = {$_SESSION['staff_id']}";
				$result = mysqli_query($conn,$sql);
				if (mysqli_num_rows($result) == 0) {
					echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>You haven't created any test yet, click on Create Test.</div><br>";
				}
			?>
			<div class="card">
				<div class="card-header">
					<h4 class="display-4" style="font-size:30px;">Student Test Attempts</h4>
				</div>
				<div class="card-body">
				<?php
					if (mysqli_num_rows($result_test) > 0) {
						echo "	<table class='table table-striped'>
									<thead>
										<tr>
											<th scope='col'>#</th>
											<th scope='col'>Student Name</th>
											<th scope='col'>Test Name</th>
											<th scope='col'>Right Answers</th>
											<th scope='col'>Wrong Answers</th>
											<th scope='col'>Marks Obtained</th>
											<th scope='col'>Total Marks</th>
										</tr>
									</thead>
								<tbody>";
						$i = 0;
						while ($row_test = mysqli_fetch_assoc($result_test)) {
							$sql_stud = "SELECT users.user_id AS user_id, student.stud_id AS stud_id, users.first_name AS first_name, users.last_name AS last_name, users.username AS username
							FROM users
							INNER JOIN student ON student.user_id = users.user_id
							WHERE student.stud_id = {$row_test['stud_id']}";
							$result_stud = mysqli_query($conn,$sql_stud);
							$row_stud = mysqli_fetch_assoc($result_stud);
							echo "<tr>
									<th scope='row'>".($i+1)."</th>
									<td>".$row_stud['first_name']." ".$row_stud['last_name']."</td>
									<td>".$row_test['test_name']."</td>
									<td>".$row_test['right_answers']."</td>
									<td>".$row_test['wrong_answers']."</td>
									<td>".$row_test['marks_obtained']."</td>
									<td>".$row_test['total_marks']."</td>
								 </tr>";
							$i++;
						}
						echo"	</tbody>
						</table>";
					}else{
						echo "<div class='alert alert-info' role='alert'>No Student have attempted you test yet.!</div>";
					}
				?>
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
	<?php include '../include/js_include.php' ?>
	<?php include '../include/staff_master_js_include.php' ?>
</body>
</html>
