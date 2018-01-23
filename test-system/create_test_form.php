<?php
    include_once '../db/database.php';
    session_start();
    //  if ($_SESSION['logged_in'] == true) {
        # code...
    //  }
    $_SESSION['test_name'] = 'Class Test 1';
    $test_name = $_SESSION['test_name'];
    $sql = "SELECT * FROM test_bank WHERE test_name='$test_name'";
    $result = mysqli_query($conn,$sql);
    $test = mysqli_fetch_assoc($result);
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
        <nav class="sidenav navbar">
            <!--User Information-->

            <!--Links-->

            <!--Function Buttons-->
        </nav>

        <!--Create Test Form-->
        <div class="create-test">
            <div class="container">
                <div class="mx-5">
                    <h2><?php echo $test['test_name'].' - '.$test['test_stream']; ?></h2>
                    <h4><?php echo $test['test_subject']; ?></h4>
                    <form class="" action="get_questions.php" method="POST">
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
                                    </div>";
                            }
                        ?>
                        <button class="btn btn-dark" type="submit">Submit</button>
                    </form>
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
