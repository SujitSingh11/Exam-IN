<?php
    include_once '../db/database.php';
    session_start();
    if ($_SESSION['logged_in'] == false) {
        $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
        die(header('Location: ../error.php'));
    }
    $test_name = $_SESSION['test_name'];
    $sql = "SELECT * FROM test_bank WHERE test_name='$test_name'";
    $result = mysqli_query($conn,$sql);
    $test = mysqli_fetch_assoc($result);
    $_SESSION['number_of_questions'] = $test['number_of_questions'];
    $_SESSION['test_id'] = $test['test_id'];
?>
<!DOCTYPE html>
<html>
  <head>
    <?php  include '../include/meta_include.php' ?>
    <meta charset="utf-8">
    <title>Create Test</title>
    <?php  include '../include/css_include.php' ?>
    <link rel="stylesheet" href="../css/master.css">
    <?php  include '../include/staff_navbar_css.php' ?>
  </head>
  <body>
    <!--Navbar-->
    <?php  include '../include/staff_navbar_include.php' ?>
    <!--Create Test Form-->
    <div class="content-wrapper my-5">
        <div class="container my-5">
            <?php
				if (isset($_SESSION['message']) AND !empty($_SESSION['message'])){
					echo "<div class='alert alert-warning' role='alert'>".$_SESSION['message']."</div><br>";
				}
				unset($_SESSION["message"]);
			?>
            <div class="mx-5">
                <h2><?php echo $test['test_name'].' - '.$test['test_stream']; ?></h2>
                <h4><?php echo $test['test_subject']; ?></h4>
                <form id="question" class="" action="test_questions_script.php" method="POST">
                    <?php
                        for ($i=0; $i < $test['number_of_questions']; $i++) {
                            echo"<div class='card'>
                                    <div class='card-header'>
                                        <div class='form-group'>
                                            <label class='question'><span>".($i+1).".</span> Question</label>
                                            <input type='text' class='form-control' name='question[]' placeholder='Enter Question'>
                                        </div>
                                    </div>
                                    <div class='card-body rel'>
                                        <div class='form-group'>
                                            <div class='row'>
                                                <div class='col-md-6'>
                                                    <label>Option 1</label>
                                                    <input class='form-control mb-1' type='text' name='option_1[]' placeholder='Enter Option 1'>
                                                    <label>Option 2</label>
                                                    <input class='form-control mb-1' type='text' name='option_2[]' placeholder='Enter Option 2'>
                                                    <label>Option 3</label>
                                                    <input class='form-control mb-1' type='text' name='option_3[]' placeholder='Enter Option 3'>
                                                    <label>Option 4</label>
                                                    <input class='form-control mb-1' type='text' name='option_4[]' placeholder='Enter Option 4'>
                                                </div>
                                                <div class='col-md-4 offset-2'>
                                                    <label>Correct Option</label>
                                                    <select class='custom-select mb-2' name='correct_option[]'>
                            							<option selected>Choose Option...</option>
                            							<option>Option 1</option>
                            							<option>Option 2</option>
                            							<option>Option 3</option>
                            							<option>Option 4</option>
                            						</select>
                                                    <label>Marks</label>
                                                    <input class='form-control' type='number' min='1' max='10' name='marks[]' placeholder='Marks'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/>";
                        }
                    ?>
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
                    <h5 class="modal-title">Are you Sure.?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
                </div>
                <div class="modal-body">
                    <p>Click 'Create' if you want to Submit the test<br></p>
                </div>
                <div class="modal-footer">
                    <button form="question" class="btn btn-dark" type="submit">Create</button>
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
