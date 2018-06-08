<?php
    include_once '../db/database.php';
    session_start();

    if ($_SESSION['logged_in'] == false) {
        $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
        die(header('Location: ../error.php'));
    }
    $test_id = $_POST['test_id'];
    $_SESSION['test_id'] = $test_id;
    $test_name = $_POST['test_name'];
    $sql_test_info = "SELECT * FROM test_bank WHERE test_id = '$test_id'";
    $result_test_info = mysqli_query($conn,$sql_test_info);
    $row_test_info = mysqli_fetch_assoc($result_test_info);

    $sql_test_questions = "SELECT * FROM test_questions WHERE test_id = '$test_id'";
    $result_test_questions = mysqli_query($conn,$sql_test_questions);
?>
<!DOCTYPE html>
<html>
<head>
    <?php  include '../include/meta_include.php' ?>
    <meta charset="utf-8">
    <title>Edit Test</title>
    <?php  include '../include/css_include.php' ?>
    <link rel="stylesheet" href="../css/master.css">
    <?php  include '../include/staff_navbar_css.php' ?>
</head>
<body>
    <!--Navbar-->
    <?php include '../include/staff_navbar_include.php' ?>

    <!--Edit Test Form-->
    <div class="content-wrapper my-5">
        <div class="container my-5">
            <?php
				if (isset($_SESSION['message']) AND !empty($_SESSION['message'])){
					echo "<div class='alert alert-warning' role='alert'>".$_SESSION['message']."</div><br>";
				}
				unset($_SESSION["message"]);
			?>
            <div class="mx-5">
                <div class='alert alert-info alert-dismissible fade show' role='alert'>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="display-4" style="font-size:20px;">Plese Edit the questions as desired.</p>
                </div>
                <div class='alert alert-info alert-dismissible fade show' role='alert'>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="display-4" style="font-size:20px;">Do not leave blank fields.</p>
                </div>
                <div class="card my-5">
                    <div class="card-header">
                        <h4 class="display-4" style="font-size:30px;"><?php echo $row_test_info['test_name'].' - '.$row_test_info['test_stream']; ?></h4>
                    </div>
                    <div class="card-body">
                        <h4 class="display-4" style="font-size:28px;"><?php echo $row_test_info['test_subject']; ?></h4>
                        <form id="question" action="edit_test_script.php" method="POST">
                            <?php
                                $i = 0;
                                while($row_test_questions = mysqli_fetch_assoc($result_test_questions)) {
                                    echo"<div class='card'>
                                            <div class='card-header'>
                                                <div class='form-group'>
                                                    <label class='question'><span>".($i+1).".</span> Question</label>
                                                    <input type='text' class='form-control' name='question[]' placeholder='Enter Question' value='".$row_test_questions['question']."'>
                                                </div>
                                            </div>
                                            <div class='card-body rel'>
                                                <div class='form-group'>
                                                    <div class='row'>
                                                        <div class='col-md-6'>
                                                            <label>Option 1</label>
                                                            <input class='form-control mb-1' type='text' name='option_1[]' placeholder='Enter Option 1' value='".$row_test_questions['option_1']."'>
                                                            <label>Option 2</label>
                                                            <input class='form-control mb-1' type='text' name='option_2[]' placeholder='Enter Option 2' value='".$row_test_questions['option_2']."'>
                                                            <label>Option 3</label>
                                                            <input class='form-control mb-1' type='text' name='option_3[]' placeholder='Enter Option 3' value='".$row_test_questions['option_3']."'>
                                                            <label>Option 4</label>
                                                            <input class='form-control mb-1' type='text' name='option_4[]' placeholder='Enter Option 4' value='".$row_test_questions['option_4']."'>
                                                        </div>
                                                        <div class='col-md-4 offset-2'>
                                                            <label>Correct Option</label>
                                                            <select class='custom-select mb-2' name='correct_option[]'>
                                                            <option>Choose Option...</option>";
                                                            if ($row_test_questions['correct_option'] == 1) {
                                                                echo"   <option selected>Option 1</option>
                                                                <option>Option 2</option>
                                                                <option>Option 3</option>
                                                                <option>Option 4</option>";
                                                            }
                                                            elseif ($row_test_questions['correct_option'] == 2) {
                                                                echo"   <option>Option 1</option>
                                                                <option selected>Option 2</option>
                                                                <option>Option 3</option>
                                                                <option>Option 4</option>";
                                                            }
                                                            elseif ($row_test_questions['correct_option'] == 3) {
                                                                echo"   <option>Option 1</option>
                                                                <option>Option 2</option>
                                                                <option selected>Option 3</option>
                                                                <option>Option 4</option>";
                                                            }
                                                            elseif ($row_test_questions['correct_option'] == 4) {
                                                                echo"   <option>Option 1</option>
                                                                <option>Option 2</option>
                                                                <option>Option 3</option>
                                                                <option selected>Option 4</option>";
                                                            }
                                                            echo"	</select>
                                                            <label>Marks</label>
                                                            <input class='form-control' type='number' min='1' max='10' name='marks[]' placeholder='Marks' value='".$row_test_questions['marks']."'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <br/>";
                                    $i++;
                                }
                            ?>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark offset-11" type="button" data-toggle="modal" data-target="#sure">Submit</button>
                    </div>
                </div>
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
                    <p>Click 'Update' if you want to Upadte the test<br></p>
                </div>
                <div class="modal-footer">
                    <button form="question" class="btn btn-dark" type="submit">Update</button>
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
