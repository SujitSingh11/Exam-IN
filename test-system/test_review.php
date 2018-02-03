<?php
    include_once '../db/database.php';
    session_start();
    //  if ($_SESSION['logged_in'] == true) {
        # code...
    //  }
    $test_name = $_POST['test_name'];
    $test_id = $_POST['test_id'];
    $sql = "SELECT * FROM test_question WHERE test_id = $test_id";
    $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
    <?php  include '../include/meta_include.php' ?>
    <meta charset="utf-8">
    <title>Test Bank</title>
    <?php  include '../include/css_include.php' ?>
    <link rel="stylesheet" href="../css/master.css">
    <?php  include '../include/staff_navbar_css.php' ?>
</head>
<body>
    <!--Navbar-->
    <?php  include '../include/staff_navbar_include.php' ?>

    <!--Test Review-->
    <div class="content-wrapper my-5">
        <div class="container my-3">
            <div class="card">
                <h5 class="card-header">Test Review</h5>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $test_name; ?></h5>
                    <!--Test Review-->

                    <?php

                    ?>
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
