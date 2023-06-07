<?php
include('dbcon.php');
include('session.php');
mysqli_query($conn,"update admin_log set logout_time = NOW() where user_id = '$session_id' ORDER BY log_id DESC LIMIT 1 ")or die(mysqli_error());

 session_destroy();
header('location:index.php'); 
?>