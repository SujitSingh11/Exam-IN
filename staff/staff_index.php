<?php
	include '../db/database.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include '../include/meta_include.php' ?>
	<title>Exam-In Admin</title>
	<?php include '../include/css_include.php' ?>
	<link rel="stylesheet" href="../css/master.css">
</head>
<body>
	<?php include '../include/create_test_modal_include.php' ?>
	<div class="grid">
		<!--Sidenav-->
		<nav class="sidenav navbar navbar-light">
			<div class="container">
			<!--User Information-->
			<!--Links-->
				<ul class="navbar-nav justify-content-center flex-column">
					<li class="nav-item">
						<a class="nav-link" href="../staff/staff_index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="modal" data-target="#CreateTest">Create Test</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../test-system/test_bank.php">Test Bank</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Message</a>
					</li>
					<li class="nav-item">
						<a id="logout" href="#" class="nav-link">Logout</a>
					</li>
				</ul>
        </nav>
		<div class="main">
			<div class="">

			</div>
		</div>
		<footer>
			<div class="footer-copyright">
                <p>© 2018 Copyright Exam-in</p>
            </div>
		</footer>
	</div>
	<?php include '../include/js_include.php' ?>
	<?php include '../include/staff_master_js_include.php' ?>
</body>
</html>
