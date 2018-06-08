<?php
	include '../db/database.php';
	session_start();

	if ($_SESSION['logged_in'] == false) {
        $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
        die(header('Location: ../error.php'));
    }

	$sql_stud = "SELECT users.user_id AS user_id, student.stud_id AS stud_id, users.first_name AS first_name, users.last_name AS last_name, users.username AS username, users.email AS email, users.active AS active
            FROM users
            INNER JOIN student ON student.user_id = users.user_id";

    $sql_staff = "SELECT users.user_id AS user_id, staff.staff_id AS staff_id, users.first_name AS first_name, users.last_name AS last_name, users.username AS username, users.email AS email, users.active AS active
                FROM users
                INNER JOIN staff ON staff.user_id = users.user_id";

    $result_stud = mysqli_query($conn,$sql_stud);
    $result_staff = mysqli_query($conn,$sql_staff);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include '../include/meta_include.php' ?>
	<title>Exam-In Admin</title>
	<?php include '../include/css_include.php' ?>
	<link rel="stylesheet" href="../css/master.css">
	<?php  include '../include/staff_navbar_css.php' ?>
</head>
<body>
	<!--Navbar-->
	<?php include '../include/admin_navbar_include.php' ?>

	<div class="content-wrapper my-5">
		<div class="container my-5">
			<div class="card my-4">
				<div class="card-header">
					<h4 class="display-4" style="font-size:30px;">Manage Users</h4>
				</div>
				<div class="card-body my-4">
					<?php
					if (isset($_SESSION['message']) AND !empty($_SESSION['message'])){
						echo "<div class='alert alert-warning' role='alert'>".$_SESSION['message']."</div><br>";
					}
					unset($_SESSION["message"]);
					?>
					<div class="card">
						<h5 class="card-header">Student Users</h5>
						<div class="card-body my-2">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">User ID</th>
										<th scope="col">Student ID</th>
										<th scope="col">First Name</th>
										<th scope="col">Last Name</th>
										<th scope="col">Username</th>
										<th scope="col">Email</th>
										<th scope="col">Account</th>
										<th scope="col" >Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;
									while ($row = mysqli_fetch_assoc($result_stud)) {
										if ($row['active']==0) {
											$active = "Unactive";
										}
										if ($row['active']==1) {
											$active = "Active";
										}
										$user_id = $row['user_id'];
										$stud_id = $row['stud_id'];
										echo "<tr>
												<th scope='row'>".($i+1)."</th>
												<td>".$row['user_id']."</td>
												<td>".$row['stud_id']."</td>
												<td>".$row['first_name']."</td>
												<td>".$row['last_name']."</td>
												<td>".$row['username']."</td>
												<td>".$row['email']."</td>
												<td>".$active."</td>
												<form action='user_delete.php' method='post'>
													<input type='hidden' name='user_id' value='".$row['user_id']."'>
													<input type='hidden' name='stud_id' value='".$row['stud_id']."'>
													<td><button class='btn btn-outline-danger' name='submitStud' type='submit' data-toggle='tooltip'
				        data-placement='top' title='Delete'><i class='far fa-trash-alt'><i class='far fa-trash-alt'></i></button></td>
												</form>
											</tr>";
											$i++;
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<hr>
					<div class="card">
						<h5 class="card-header">Staff Users</h5>
						<div class="card-body my-2">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">User ID</th>
										<th scope="col">Staff ID</th>
										<th scope="col">First Name</th>
										<th scope="col">Last Name</th>
										<th scope="col">Username</th>
										<th scope="col">Email</th>
										<th scope="col">Account</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$i = 0;
										while ($row = mysqli_fetch_assoc($result_staff)) {
											if ($row['active']==0) {
												$active = "Unactive";
											}
											if ($row['active']==1) {
												$active = "Active";
											}
											echo "<tr>
													<th scope='row'>".($i+1)."</th>
													<td>".$row['user_id']."</td>
													<td>".$row['staff_id']."</td>
													<td>".$row['first_name']."</td>
													<td>".$row['last_name']."</td>
													<td>".$row['username']."</td>
													<td>".$row['email']."</td>
													<td>".$active."</td>
													<form action='user_delete.php' method='post'>
														<input type='hidden' name='user_id' value='".$row['user_id']."'>
														<input type='hidden' name='staff_id' value='".$row['staff_id']."'>
														<td><button class='btn btn-outline-danger' name='submitStaff' type='submit' data-toggle='tooltip'
					        data-placement='top' title='Delete'><i class='far fa-trash-alt'><i class='far fa-trash-alt'></i></button></td>
													</form>
												</tr>";
												$i++;
										}
									?>
								</tbody>
							</table>
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
	<?php include '../include/staff_master_js_include.php' ?>
</body>
</html>
