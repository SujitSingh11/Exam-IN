<?php
	include '../db/database.php';
	session_start();
	if ($_SESSION['logged_in'] == false) {
        $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
        die(header('Location: ../error.php'));
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../include/meta_include.php' ?>
        <meta charset="utf-8">
        <title>My Profile</title>
        <?php include '../include/css_include.php' ?>
        <link rel="stylesheet" href="../css/master.css">
    	<?php  include '../include/staff_navbar_css.php' ?>
    </head>
    <body>
        <!--Navbar-->
    	<?php
		 	if ($_SESSION['user_type']==0) {
		 		include '../include/admin_navbar_include.php';
		 	}
			elseif ($_SESSION['user_type']==1) {
				include '../include/staff_navbar_include.php';
		 	}
			elseif ($_SESSION['user_type']==2) {
				include '../include/student_navbar_include.php';
			}
		?>
    	<div class="content-wrapper my-5">
    		<div class="container my-5">
    			<!--Staff Dashboard-->
    			<?php
    				if (isset($_SESSION['message']) AND !empty($_SESSION['message'])){
    					echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['message']."</div><br>";
    				}
    				unset($_SESSION["message"]);
                ?>
				<div class="card mx-5">
					<h4 class="card-header display-4" style="font-size:30px;">My Profile</h4>
					<div class="card-body">
						<hr>
						<div class="col">
							<div class="card mx-4">
								<div class="card-body">
									<div class="row mx-3">
										<div class="col-md-3 col-sm-3">
											<div id="profile" class="container">
												<?php
												if ($_SESSION['user_type']==0) {
													$designation = "Admin";
													echo"<img class='mb-2' src='../img/profile7.jpg' width='60%'>";
												}
												elseif ($_SESSION['user_type']==1) {
													$designation = "Staff";
													echo"<img id='img' class='mb-2 rounded-circle' src='../img/profile4.png' width='60%'>";
												}
												elseif ($_SESSION['user_type']==2) {
													$designation = "Student";
													echo"<img class='mb-2' src='../img/profile5.png' width='60%'>";
												}
												?>
											</div>
										</div>
										<div class="offset-3 col-md-4 col-sm-4">
											<h5 class="card-text my-2">Name:<i class="display-4" style="font-size:20px"> <?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?></i></h5>
											<h5 class="card-text my-2">Designation:<i class="display-4" style="font-size:20px"> <?php echo $designation; ?></i></h5>
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="col">
							<div class="card mx-4">
								<div class="card-body mx-3">
									<h5 class="card-title display-4" style="font-size:30px;">Other Information:</h5>
									<h5 class="card-text my-2">Email:<i class="display-4" style="font-size:20px"> <?php echo $_SESSION['email']; ?></i></h5>
									<h5 class="card-text my-2">Username:<i class="display-4" style="font-size:20px"> <?php echo $_SESSION['username']; ?></i></h5>
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
		<?php include '../include/staff_master_js_include.php' ?>
    </body>
</html>
