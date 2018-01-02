<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'include/meta_include.php' ?>
    <title>Error</title>
    <?php include 'include/css_include.php' ?>
</head>
<body class="bg-light">
    <div>
        <h1>Error</h1>
        <p>
            <?php
                if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);     
                else:
                    header( "location: index.php" );
                endif;
            ?>
        </p>
        <a href="index.php"><button class="btn btn-dark">Home</button></a>
    </div>

    <?php include 'include/js_include.php' ?>
</body>
</html>
