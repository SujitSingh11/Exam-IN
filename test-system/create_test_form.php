<?php
    include_once '../db/database.php';
    session_start();
    //  if ($_SESSION['logged_in'] == true) {
        # code...
    //  }
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
  </head>
  <body>
    <!--Grid-->
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
                        <a class="nav-link" href="../test-system/test_form.php">Create Test</a>
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

        <!--Create Test Form-->
        <div class="main">
            <div class="container">
                <div class="mx-5">
                    <h2><?php echo $test['test_name'].' - '.$test['test_stream']; ?></h2>
                    <h4><?php echo $test['test_subject']; ?></h4>
                    <form id="question" class="" action="create_test.php" method="POST">
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
                                                        <select class='form-control mb-2' name='correct_option[]'>
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
                        <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#sure">Submit</button>
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
                        <p>Click 'Commit' if you want to Submit the test,<br></p>
                    </div>
                    <div class="modal-footer">
                        <button form="question" class="btn btn-dark" type="submit">Commit</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer-->
        <footer>
            <div class="footer-copyright">
                <p>© 2018 Copyright Exam-in</p>
            </div>
        </footer>
    </div>
    <?php include '../include/js_include.php' ?>
  </body>
</html>
