<?php
include('dbcon.php');
if (isset($_POST['delete_subject'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM subject where subject_id='$id[$i]'");
	mysqli_query($conn,"insert into activity_log (username,time,action) values('$user_username',NOW(),'subject deleted')")or die(mysqli_error());
}
header("location: subjects.php");
}
?>