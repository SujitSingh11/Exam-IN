<?php
	require 'db/database.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'include/meta_include.php' ?>
	<title>Exam-IN</title>
	<link rel="shortcut icon" href="Logo-title.ico">
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

	<!--Modals-->
	<?php include 'include/login_modal_include.php' ?>
	<?php include 'include/contact_us_modal_include.php' ?>

	<!--Services-->

	<!--Testimonial-->

	<!--Something-->

	<!--Footer-->
	<?php include 'include/footer_include.php' ?>

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
