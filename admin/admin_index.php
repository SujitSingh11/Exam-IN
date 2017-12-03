<?php 
	include '../db/database.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include '../include/meta_include.php' ?>
	<title>Exam-In Admin</title>
	<?php include '../include/css_include.php' ?>
</head>
<body>
	<button id="logout" class="btn btn-outline-danger" type="button">Logout</button>
	<script type="text/javascript">
		document.getElementById("logout").onclick = function () {
        	location.href = "../index.php";
   		};
	</script>
	<?php include '../include/js_include.php' ?>
</body>
</html>