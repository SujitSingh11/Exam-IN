<?php
	include '../db/database.php';
	session_start();
	if ($_SESSION['logged_in'] == false) {
		$_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
		die(header('Location: ../error.php'));
	}

	$sql_test_info = "SELECT test_result.result_id AS result_id, test_result.stud_id AS stud_id, test_result.test_id AS test_id, test_bank.staff_id AS staff_id, test_bank.test_name AS test_name, test_result.attempted AS attempted, test_result.not_attempted AS not_attempted, test_result.wrong_answers AS wrong_answers, test_result.right_answers AS right_answers, test_result.marks_obtained AS marks_obtained, test_result.total_marks AS total_marks
	FROM test_result
	INNER JOIN test_bank ON test_result.test_id = test_bank.test_id
	WHERE test_result.stud_id = {$_SESSION['stud_id']}";
	$result_test_info = mysqli_query($conn,$sql_test_info);

?>
<!DOCTYPE html>
<html>
<head>
	<?php include '../include/meta_include.php' ?>
	<title>Exam-In Student</title>
	<?php include '../include/css_include.php' ?>
	<link rel="stylesheet" href="../css/master.css">
	<?php  include '../include/staff_navbar_css.php' ?>
</head>
<body>
	<!--Navbar-->
	<?php include '../include/student_navbar_include.php' ?>

	<div class="content-wrapper my-5">
		<div class="container my-5">
			<?php
				if (isset($_SESSION['message']) AND !empty($_SESSION['message'])){
					echo "<div class='alert alert-warning' role='alert'>".$_SESSION['message']."</div><br>";
				}
				unset($_SESSION["message"]);
			?>
			<div class="card">
				<div class="card-header">
					<h4 class="display-4" style="font-size:30px;">Analysis</h4>
				</div>
				<div class="card-body">
					<div class="card m-3">
						<div class="card-header">
							<h5>Attempted Test</h5>
						</div>
						<div class="card-body">
							<?php
								if (mysqli_num_rows($result_test_info) > 0) {
									echo" <table class='table table-striped'>
											<thead>
												<tr>
													<th scope='col'>#</th>
													<th scope='col'>Test Name</th>
													<th scope='col'>Created By</th>
													<th scope='col'>Attempted</th>
													<th scope='col'>Not Attempted</th>
													<th scope='col'>Right</th>
													<th scope='col'>Wrong</th>
													<th scope='col'>Obtained</th>
													<th scope='col'>Total</th>
												</tr>
											</thead>
											<tbody>";
												$i = 0;
												while ($row_test_info = mysqli_fetch_assoc($result_test_info)) {
													$sql_staff = "SELECT users.user_id AS user_id, staff.staff_id AS staff_id, users.first_name AS first_name, users.last_name AS last_name, users.username AS username
													FROM users
													INNER JOIN staff ON staff.user_id = users.user_id
													WHERE staff.staff_id = {$row_test_info['staff_id']}";
													$result_staff = mysqli_query($conn,$sql_staff);
													$row_staff = mysqli_fetch_assoc($result_staff);
													echo"	<tr>
																<th scope='row'>".($i+1)."</th>
																<td>".$row_test_info['test_name']."</td>
																<td>".$row_staff['first_name']." ".$row_staff['last_name']."</td>
																<td>".$row_test_info['attempted']."</td>
																<td>".$row_test_info['not_attempted']."</td>
																<td>".$row_test_info['right_answers']."</td>
																<td>".$row_test_info['wrong_answers']."</td>
																<td>".$row_test_info['marks_obtained']."</td>
																<td>".$row_test_info['total_marks']."</td>
															</tr>";
													$i++;
												}
								echo"	</tbody>
									</table>";
								}else {
										echo "<div class='alert alert-info' role='alert'>You haven't Attempted any test yet.!</div>";
								}
							?>
						</div>
					</div>
					<div class="card m-3">
						<div class="card-header">
							<h5 class="display-4" style="font-size:30px;">Test Analysis</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-3">
									<table class="table table-striped">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Test Name</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td>Class Test-1</td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>Class Test-2</td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td>Mock Test-1</td>
											</tr>
											<tr>
												<th scope="row">4</th>
												<td>Mock Test-2</td>
											</tr>
											<tr>
												<th scope="row">5</th>
												<td>Mock Test-4</td>
											</tr>
										</tbody>
									</table>
								</div>
								<hr id="hr">
								<div class="offset-1 col-md-8 graph" style="max-width:350px;">
									<canvas id="myChart" width="100" height="100"></canvas>
								</div>
							</div>
						</div>
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
	<?php include '../include/js_include.php' ?>
	<?php include '../include/student_js_include.php' ?>
	<?php include '../include/staff_master_js_include.php' ?>
	<script>
	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Question 1", "Question 2", "Question 3", "Question 4","Question 5"],
			datasets: [{
				label: 'Students',
				data: [12, 19, 3, 5, 2, 3],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)'
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)'
				],
				borderWidth: 1
			}]
		},

		options: {
			title: {
			   display: true,
			   text: 'Class Test-1'
		   },
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
	</script>
</body>
</html>
