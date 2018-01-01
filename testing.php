<?php
include_once 'db/database.php';
$email = 'sujitkumarsingh29@gmail.com';
$result = $conn->query("SELECT user_id FROM users WHERE email='$email'");
$row=mysqli_fetch_assoc($result);
$new = (int) $row['user_id'];
echo $new;
