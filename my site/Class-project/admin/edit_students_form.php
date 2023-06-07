<div class="row-fluid">
<a href="students.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Student</a>
<!-- block -->
<div class="block">
<div class="navbar navbar-inner block-header">
<div class="muted pull-left">Add Student</div>
</div>
<div class="block-content collapse in">
<?php
$query = mysqli_query($conn,"select * from student LEFT JOIN class ON class.class_id = student.class_id LEFT JOIN student_status on student.status = student_status.status_id where student_id = '$get_id'")or die(mysqli_error());
$row = mysqli_fetch_array($query);
?>
<div class="span12">
<form method="post">

<div class="control-group">

<div class="controls">
<select  name="class" class="" required>
<option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
<?php
$cys_query = mysqli_query($conn,"select * from class order by class_name");
while($cys_row = mysqli_fetch_array($cys_query)){

?>
<option value="<?php echo $cys_row['class_id']; ?>"><?php echo $cys_row['class_name']; ?></option>
<?php } ?>
</select>
</div>
</div>

<div class="control-group">
<div class="controls">
<input name="firstname" value="<?php echo $row['firstname']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Firstname" required>
</div>
</div>

<div class="control-group">
<div class="controls">
<input name="lastname"  value="<?php echo $row['lastname']; ?>"  class="input focused" id="focusedInput" type="text" placeholder = "Lastname" required>
</div>
</div>

<div class="control-group">
<div class="controls">
<input  name="username"  value="<?php echo $row['username']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Username" required>
</div>
</div>

<div class="control-group">
<div class="controls">
<input  name="password"  value="<?php echo $row['password']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Password" required>
</div>
</div>


<div class="control-group">

<div class="controls">
<select  name="status" class="" required>
<option value="<?php echo $row['status_id']; ?>"><?php echo $row['status_name']; ?></option>
<?php
$status_query = mysqli_query($conn,"select * from student_status order by status_name");
while($status_row = mysqli_fetch_array($status_query)){

?>
<option value="<?php echo $status_row['status_id']; ?>"><?php echo $status_row['status_name']; ?></option>
<?php } ?>
</select>
</div>
</div>





<div class="control-group">
<div class="controls">
<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

</div>
</div>
</form>
</div>
</div>
</div>
<!-- /block -->
</div>



<?php
if (isset($_POST['update'])) {

$class = $_POST['class'];
$firstname = $_POST['firstname'];
$username = $_POST['username'];
$lastname =$_POST['lastname'];
$password = $_POST['password'];
$stat = $_POST['status'];

mysqli_query($conn,"update student set username = '$username' , password = '$password',firstname ='$firstname' , lastname = '$lastname' , class_id = '$class', status ='$stat' where student_id = '$get_id' ")or die(mysqli_error());
mysqli_query($conn,"insert into activity_log (time,username,action) values(NOW(),'$user_username','Edit Student $firstname $lastname , Student ID: $get_id')")or die(mysqli_error());
?>

<script>
window.location = "students.php"; 
</script>

<?php     }  ?>
