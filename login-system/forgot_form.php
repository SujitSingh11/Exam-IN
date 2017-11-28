<!DOCTYPE html>
<html>
<head>
	<?php include '../include/meta_include.php' ?>
	<title>Forgot Password</title>
	<?php include '../include/css_include.php' ?>
</head>
<body class="bg-light">
	<!--Reset Form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-6 offset-sm-3">
				<form class="card" style="margin-top: 30vh">
					<div class="card-body m-4" >
						<h2>Reset Password</h2>
						<div class="form-group">
							<label class="col-form-lable">Enter your Registered E-mail Address</label>
							<input type="email" class="form-control" name="email" placeholder="E-mail">
						</div>
							<button type="submit" name="reset-submit" class="btn btn-primary">Request Reset Mail</button>
							<button id="HomeButton" type="button" name="reset-cancel" class="btn btn-warning">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php include '../include/js_include.php' ?>
	<script type="text/javascript">
		document.getElementById("HomeButton").onclick = function () {
        location.href = "../index.php";
    };
	</script>
</body>
</html>