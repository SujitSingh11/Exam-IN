<?php
	include '../db/database.php';
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
		<div class="container my-3">
			<div class="card">
				<h3 class="card-header">Manage Test</h3>
				<div class="card-body">
					<?php
    					if (isset($_SESSION['message']) AND !empty($_SESSION['message'])){
    						echo "<div class='alert alert-warning' role='alert'>".$_SESSION['message']."</div><br>";
    					}
    					unset($_SESSION["message"]);
					?>
                    <table class="table table-striped my-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Test ID</th>
                                <th scope="col">Staff ID</th>
                                <th scope="col">Test Name</th>
                                <th scope="col">Test Stream</th>
                                <th scope="col">Test Subject</th>
                                <th scope="col">Negative Marking</th>
                                <th scope="col">Test Visiblity</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $i = 0;
                                if ($row['neg_marks'] > 0) {
                                    $neg_marks = "Yes";
                                }
                                if ($row['neg_marks'] == 0) {
                                    $neg_marks = "No";
                                }
                                if ($row['test_visibility'] == 0) {
                                    $test_visibility = "Public";
                                }
                                if ($row['test_visibility'] == 1) {
                                    $test_visibility = "Private";
                                }
                                echo "<tr>
                                <th scope='row'>".($i+1)."</th>
                                <td>".$row['test_id']."</td>
                                <td>".$row['staff_id']."</td>
                                <td>".$row['test_name']."</td>
                                <td>".$row['test_stream']."</td>
                                <td>".$row['test_subject']."</td>
                                <td>".$neg_marks."</td>
                                <td>".$test_visibility."</td>
                                <form action='test_delete.php' method='post'>
                                    <input type='hidden' name='test_id' value='".$row['test_id']."'>
                                    <td><button class='btn btn-outline-danger' name='submitTest' type='submit'><i class='far fa-trash-alt'></i></button></td>
                                </form>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
			</div>
		</div>
	</div>
    <!--Edit and Delete Modals-->

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
