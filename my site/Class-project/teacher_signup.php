<?php
include('admin/dbcon.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$school_id = $_POST['school_id'];

$query = mysqli_query($conn,"select * from teacher where  firstname='$firstname' and lastname='$lastname' and school_id = '$school_id'")or die(mysqli_error());
$row = mysqli_fetch_array($query);
$id = $row['teacher_id'];

$count = mysqli_num_rows($query);
if ($count > 0){
	mysqli_query($conn,"update teacher set username='$username',password = '$password', teacher_status = '1' where teacher_id = '$id'")or die(mysqli_error());
	mysqli_query($conn,"insert into activity_log (time,username,action) values(NOW(),'$username','Teacher signup: $firstname $lastname')")or die(mysqli_error());
	$_SESSION['id']=$id;
	echo 'true';
}else{
	echo 'false';
}
?>