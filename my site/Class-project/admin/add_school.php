   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add School</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="school_name" type="text" placeholder = "School Name">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="principal" type="text" placeholder = "Principal">
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
if (isset($_POST['save'])){
$principal = $_POST['principal'];
$school_name = $_POST['school_name'];


$query = mysqli_query($conn,"select * from school where school_name = '$school_name' and principal = '$principal' ")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Data Already Exist');
</script>
<?php
}else{
mysqli_query($conn,"insert into school (school_name,principal) values('$school_name','$principal')")or die(mysqli_error());
mysqli_query($conn,"insert into activity_log (time,username,action) values(NOW(),'$user_username','Add School $school_name')")or die(mysqli_error());
?>
<script>
window.location = "school.php";
</script>
<?php
}
}
?>