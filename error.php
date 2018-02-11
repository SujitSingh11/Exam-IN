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
    <div class="container">
		<div class="row">
			<div class="col-sm-6 offset-sm-3">
                <div class="card" style="margin-top: 30vh">
                    <h2 class="card-header">Error.!</h2>
    				<div class="card-body m-4">
                        <?php
                            if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            else:
                                header( "location: index.php" );
                            endif;
                        ?>
    				</div>
                    <div class="card-footer">
                        <div class="offset-10">
                            <button id="HomeButton" type="button" class="btn btn-info">Home</button>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
    <script>
        document.getElementById("HomeButton").onclick = function () {
            location.href = "index.php";
        };
    </script>
    <?php include 'include/js_include.php' ?>
</body>
</html>
