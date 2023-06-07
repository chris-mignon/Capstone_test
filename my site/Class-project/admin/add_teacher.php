<div class="row-fluid">
<!-- block -->
<div class="block">
<div class="navbar navbar-inner block-header">
<div class="muted pull-left">Add Teacher</div>
</div>
<div class="block-content collapse in">
<div class="span12">
<form method="post">

<div class="control-group">
<label>School:</label>
<div class="controls">
<select name="school"  class="" required>
<option>Select school</option>
<?php
$query = mysqli_query($conn,"select * from school order by school_name");
while($row = mysqli_fetch_array($query)){

?>
<option value="<?php echo $row['school_id']; ?>"><?php echo $row['school_name']; ?></option>
<?php } ?>
</select>
</div>
</div>

<div class="control-group">
<div class="controls">
<input class="input focused" name="firstname" id="focusedInput" type="text" placeholder = "Firstname">
</div>
</div>

<div class="control-group">
<div class="controls">
<input class="input focused" name="lastname" id="focusedInput" type="text" placeholder = "Lastname">
</div>
</div>

<div class="control-group">
<div class="controls">
<input class="input focused" name="username" id="focusedInput" type="text" placeholder = "Username">
</div>
</div>

<div class="control-group">
<div class="controls">
<input class="input focused" name="password" id="focusedInput" type="text" placeholder = "password">
</div>
</div>
<div class="control-group">
<div class="controls">
<button name="save" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

</div>
</div>
</form>
</div>
</div>
</div>
<!-- /block -->
</div>


<?php
if (isset($_POST['save'])) {

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$school_id = $_POST['school'];


$query = mysqli_query($conn,"select * from teacher where firstname = '$firstname' and lastname = '$lastname' ")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Data Already Exist');
</script>
<?php
}else{

mysqli_query($conn,"insert into teacher (firstname,lastname,username, password,picture,school_id,teacher_status)
values ('$firstname','$lastname','$username','$password','uploads/NO-IMAGE-AVAILABLE.jpg','$school_id','2')         
") or die(mysqli_error());
mysqli_query($conn,"insert into activity_log (time,username,action) values(NOW(),'$user_username','Add teacher, $firstname $lastname')")or die(mysqli_error());
?>
<script>
window.location = "teachers.php"; 
</script>
<?php   }} ?>

