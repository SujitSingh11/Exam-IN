<?php
  	
  	$conn = mysqli_connect('localhost','root','','sococlub');

  	if (!$conn) {
  		die("connection failed " . mysqli_connect_error());
  	}

