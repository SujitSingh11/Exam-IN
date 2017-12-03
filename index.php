<?php 
	require 'db/database.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'include/meta_include.php' ?>
	<title>Exam-IN</title>	
	<?php include 'include/css_include.php' ?>
</head>
<body class="bg-light">
	<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    		if (isset($_POST['login'])) { 
    			//user logging in
        		require 'login-system/sign-in.php';        
	    	}
	    	elseif (isset($_POST['register'])) { 
	    		//user registering
	        	require 'login-system/sign-up.php';   
	    	}
		}
	?>
	<!--Navigation-->
	<?php include 'include/navbar_include.php' ?>

	<!--Content-->
	<header class="masthead">
      <div class="header-content">
        <div class="header-content-inner">
          <h1 id="homeHeading">An Online Solution For Examination</h1>
          <hr>
          <p>Join our community to enjoy the full features of Exam-In!</p>
          <a class="btn btn-outline-light btn-xl js-scroll-trigger" href="#about">Find Out More</a>
        </div>
      </div>
    </header>

	<!--Models-->
	<?php include 'include/login_modal_include.php' ?>

	<!--Footer-->
	<footer>
		
	</footer>

	<?php include 'include/js_include.php' ?>
</body>
</html>