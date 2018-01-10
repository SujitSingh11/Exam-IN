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
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
	<footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2 class="logo"><a href="#"> Exam-in </a></h2>
                </div>
                <div class="col-sm-2">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></i></a>
                        <a href="#" class="facebook"><i class="fab fa-facebook-square"></i></a>
                        <a href="#" class="google"><i class="fab fa-google-plus-g"></i></a>
                    </div>
                    <button type="button" class="btn btn-default">Contact us</button>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2018 Copyright Text </p>
        </div>
    </footer>

	<?php include 'include/js_include.php' ?>
	<script>
		$(function () {
		    var iframe = $('.main-content iframe')[0],
		        menu_links = $('.items li a'),
		        selected_link,
		        href;


		    $(window).on('hashchange', function() {

		        if(window.location.hash){
		            href = window.location.hash.substring(1);
		            selected_link = $('a[href$="'+href+'"]');

		            // Check if the hash is valid - it should exist as one of the menu items.
		            if(selected_link.length){
		                iframe.contentWindow.location.replace(href + '.html');

		                menu_links.removeClass('active');
		                selected_link.addClass('active');
		            }
		        }
		        else{
		            iframe.contentWindow.location.replace('Footer-with-logo.html');
		            menu_links.removeClass('active');
		            $(menu_links[0]).addClass('active');
		        }

		    });


		    if(window.location.hash){
		        $(window).trigger('hashchange');
		    }


		    menu_links.on('click', function (e) {
		        e.preventDefault();

		        window.location.hash = $(this).attr('href');
		    });


		    $('#template-select').on('change', function (e) {
		        e.preventDefault();

		        window.location.hash = $(this).find(':selected').data('href');
		    });

		});
	</script>
</body>
</html>