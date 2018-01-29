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
	<?php  include '../include/staff_navbar_css.php' ?>
</head>
<body>
	<!--Navbar-->
	<?php include '../include/staff_navbar_include.php' ?>

	<div class="content-wrapper my-5">
		<div class="container my-3">
			<?php
				if (isset($_SESSION['message']) AND !empty($_SESSION['message'])){
					echo "<div class='alert alert-warning' role='alert'>".$_SESSION['message']."</div><br>";
				}
				unset($_SESSION["message"]);
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
