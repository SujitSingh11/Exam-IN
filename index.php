<!DOCTYPE html>
<html>
<head>
	<?php include 'include/meta_include.php' ?>
	<title>Exam-IN</title>	
	<?php include 'include/css_include.php' ?>
</head>
<body>
	<!--Navigation-->
	<nav class="navbar navbar-expand-lg navbar-light bg-warning">
	  <a class="navbar-brand" href="#">Exam-in</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
	      
	    </div>
	  </div>
	  <div class="form-inline ">
	  	<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signupmodal">
		  Sign-up
		</button>
	  	<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signinmodal">
		  Sign-in
		</button>
	  </div>
	</nav>
	<!--Content-->



	<!--Models-->
	<!--Sign-up Model-->
	<div id="signupmodal" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Sign-up</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form class="" method="">    
	          <div class="form-row">
	              <div class="col"> 
	              	<label class="col-form-label" for="formGroupExampleInput">First Name</label>
	                <input type="text" class="form-control" name="first" placeholder="First name">
	              </div>
	              <div class="col">
	              	<label class="col-form-label" for="formGroupExampleInput">Last Name</label>
	                <input type="text" class="form-control" name="last" placeholder="Last name">
	              </div>
	          </div>
	          <div class="form-row">
	              <div class="col"> 
	              	<label class="col-form-label" for="formGroupExampleInput">Username</label>
	                <input type="text" class="form-control" name="username" placeholder="Username">
	              </div>
	              <div class="col">
	              	<label class="col-form-label" for="formGroupExampleInput">E-mail</label>
	                <input type="email" class="form-control" name="email" placeholder="Email">
	              </div>
	          </div>
	          <div class="form-row">
	              <div class="col"> 
	              	<label class="col-form-label" for="formGroupExampleInput">Password</label>
	                <input type="password" class="form-control" name="password" placeholder="Password">
	              </div>
	              <div class="col">
	              	<label class="col-form-label" for="formGroupExampleInput">Re-Enter Password</label>
	                <input type="password" class="form-control" name="re-password" placeholder="Re-Enter Password">
	              </div>
	          </div>
	          <div class="form-group p-1">
	              <label for="exampleFormControlSelect1">Select type of User</label>
	              <select class="form-control" name="user-type" id="usertype">
	                <option>Student</option>
	                <option>Staff</option>
	                <option>Admin</option>
	              </select>
	          </div>
	          <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Sign-up</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>	
	       </form>
	      </div>
	    </div>
	  </div>
	</div>

	<!--Sign-in Model-->
	<div id="signinmodal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Sign-in</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form class="" method="">    
	          <div class="form-group">
			    <label class="col-form-label" for="formGroupExampleInput">E-mail</label>
			    <input type="text" class="form-control" name="E-mail" id="formGroupExampleInput" placeholder="E-mail">
			  </div>
			  <div class="form-group">
			    <label class="col-form-label" for="formGroupExampleInput2">Password</label>
			    <input type="text" class="form-control" name="Password" id="formGroupExampleInput2" placeholder="Password">
			  </div>
			  <div class="modal-footer">
			   <button type="submit" name="sign-in-submit" class="btn btn-primary">Sign-in</button>
	           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	       	  </div>
	       </form>
	      </div>
	    </div>
	  </div>
	</div>

	<!--Footer-->
	<footer>
		
	</footer>
<?php include 'include/js_include.php' ?>
</body>
</html>