<?php
	include 'db/database.php';
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
          <h1 id="homeHeading" class="animated fadeIn">An Online Solution For Examination</h1>
          <hr>
          <p>Join our community to enjoy the full features of Exam-In!</p>
          <a class="btn btn-outline-light btn-xl js-scroll-trigger" href="#about">Find Out More</a>
        </div>
      </div>
    </header>

	<!--Modals-->
	<?php include 'include/login_modal_include.php' ?>
	<!--Services-->
	<section id="services">
	  <div class="container">
		<div class="row">
		  <div class="col-lg-12 text-center">
			<h2 class="section-heading text-uppercase">Services</h2>
			<h3 class="section-subheading text-muted mb-5 wow animated fadeInUp" style="font-size:0.3 em;">Services we provide</h3>
		  </div>
		</div>
		<div class="row text-center">
		  <div class="col-md-4">
			<span class="fa-stack fa-4x">
			  <i class="fa fa-circle fa-stack-2x text-primary"></i>
			  <i class="fa fa-copy fa-stack-1x fa-inverse wow animated fadeInUp"></i>
			</span>
			<h4 class="service-heading">Create Test</h4>
			<p class="text-muted">Staff Users are able to create test for Student Users.</p>
		  </div>
		  <div class="col-md-4">
			<span class="fa-stack fa-4x">
			  <i class="fa fa-circle fa-stack-2x text-primary"></i>
			  <i class="fa fa-laptop fa-stack-1x fa-inverse wow animated fadeInUp"></i>
			</span>
			<h4 class="service-heading">Attempt Test</h4>
			<p class="text-muted">Student Users able to Attempt test created by Staff Users.</p>
		  </div>
		  <div class="col-md-4">
			<span class="fa-stack fa-4x">
			  <i class="fa fa-circle fa-stack-2x text-primary"></i>
			  <i class="fa fa-lock fa-stack-1x fa-inverse wow animated fadeInUp"></i>
			</span>
			<h4 class="service-heading">Web Security</h4>
			<p class="text-muted">Site is secured by advance encryption methods and user data is kept secured.</p>
		  </div>
		</div>
	  </div>
	</section>

	<!--SHOWCASE -->
	<div class="section text-parallax parallax-image1" id="services">
		<div class="container">
			<div class="row showcase">
				<div class="col-md-3 col-sm-6 wow animated fadeInUp">
					<div class="item">
						<div class="icon"><i class="fa fa-copy"></i>
						</div>
						<h4><span class="counter">1200</span><br>Tests</h4>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 wow animated fadeInUp">
					<div class="item">
						<div class="icon"><i class="fas fa-users"></i>
						</div>
						<h4><span class="counter">500</span><br>Users</h4>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 wow animated fadeInUp">
					<div class="item">
						<div class="icon"><i class="fas fa-th"></i>
						</div>
						<h4><span class="counter">3200</span><br>Test Attempted</h4>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 wow animated fadeInUp">
					<div class="item">
						<div class="icon"><i class="fa fa-font"></i>
						</div>
						<h4><span class="counter">150</span><br />Staff</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="dark-mask"></div>
	</div>

	<section class="section contact" id="contact">
		<div class="container">
			<div class="col-md-12">
				<h2 class="title text-white wow animated slideInLeft">Contact Us</h2>
				<div class="row">
					<div class="col-md-8 offset-2">
						<form method="post" action="contact_us_form.php">
							<div class="controls wow animated slideInRight">
								<div class="row">
									<div class="col-md-6">
										<input type="text" name="fname" class="form-control" placeholder="Your firstname *" required="required">
									</div>
									<div class="col-md-6">
										<input type="text" name="lname" class="form-control" placeholder="Your lastname *" required="required">
									</div>
									<div class="col-md-6">
										<input type="email" name="cemail" class="form-control" placeholder="Your email *" required="required">
									</div>
									<div class="col-md-6">
										<input type="number" name="phone" class="form-control" placeholder="Your phone">
									</div>
									<div class="col-md-12">
										<textarea name="message" class="form-control" placeholder="Message for Us *" rows="4" required="required"></textarea>
									</div>
									<div class="col-md-12 text-center wow animated fadeInUp" style="animation-delay: 0.5s;">
										<input type="submit" class="btn btn-primary btn-lg" value="Send message">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Testimonial-->

	<!--Contact-->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto text-center">
					<h2 class="section-heading wow animated slideInLeft">Let's Get In Touch!</h2>
					<hr class="primary wow animated slideInRight">
					<p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 ml-auto text-center">
					<i class="fas fa-phone fa-2x sr-contact my-3 wow animated fadeInUp" style="animation-delay: 0.5s;"></i>
					<p>123-456-6789</p>
				</div>
				<div class="col-lg-4 mr-auto text-center">
					<i class="fas fa-envelope fa-2x sr-contact my-3 wow animated fadeInUp" style="animation-delay: 0.5s;"></i>
					<p>
					  <a href="mailto:examin.assist@yahoo.com">examin.assist@yahoo.com</a>
					</p>
				</div>
			</div>
		</div>
	</section>
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

		$("#service").click(function() {
		    $('html, body').animate({
		        scrollTop: $("#services").offset().top
		    }, 1000);
		});
	</script>
</body>
</html>
