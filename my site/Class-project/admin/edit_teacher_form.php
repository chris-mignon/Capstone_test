<div class="row-fluid">
<a href="teachers.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Teacher</a>
<!-- block -->
<div class="block">
<div class="navbar navbar-inner block-header">
<div class="muted pull-left">Edit Teacher</div>
</div>
<div class="block-content collapse in">
<div class="span12">
<form method="post">

<?php
$query = mysqli_query($conn,"select * from teacher where teacher_id = '$get_id' ")or die(mysqli_error());
$row = mysqli_fetch_array($query);
?>

<div class="control-group">
<label>School:</label>
<div class="controls">
<select name="school"  class="chzn-select"required>
<?php
$query_teacher = mysqli_query($conn,"select * from teacher join  school")or die(mysqli_error());
$row_teacher = mysqli_fetch_array($query_teacher);

?>

<option value="<?php echo $row_teacher['school_id']; ?>">
<?php echo $row_teacher['school_name']; ?>
</option>
<?php
$school = mysqli_query($conn,"select * from school order by school_name");
while($school_row = mysqli_fetch_array($school)){

?>
<option value="<?php echo $school_row['school_id']; ?>"><?php echo $school_row['school_name']; ?></option>
<?php } ?>
</select>
</div>
</div>

<div class="control-group">
<div class="controls">
<input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname" id="focusedInput" type="text" placeholder = "Firstname">
</div>
</div>

<div class="control-group">
<div class="controls">
<input class="input focused" value="<?php echo $row['lastname']; ?>"  name="lastname" id="focusedInput" type="text" placeholder = "Lastname">
</div>
</div>

<div class="control-group">
<div class="controls">
<input class="input focused" value="<?php echo $row['username']; ?>"  name="username" id="focusedInput" type="text" placeholder = "Username">
</div>
</div>

<div class="control-group">
<div class="controls">
<input class="input focused" value="<?php echo $row['password']; ?>"  name="password" id="focusedInput" type="text" placeholder = "Password">
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

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$pasword = $_POST['password'];
$school_id = $_POST['school'];

mysqli_query($conn," update teacher set firstname = '$firstname', lastname = '$lastname', username = '$username', password = '$pasword',school_id = '$school_id' where teacher_id = '$get_id'" )or die(mysqli_error());	
mysqli_query($conn,"insert into activity_log (time,username,action) values(NOW(),'$user_username','Edit Teacher $firstname $lastname')")or die(mysqli_error());
?>
<script>
window.location = "teachers.php"; 
</script>
<?php   } ?>

