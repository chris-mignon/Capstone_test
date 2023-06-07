   <div class="row-fluid">
    <a href="school.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add School</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit School</div>
                            </div>
							<?php 
							$query = mysqli_query($conn,"select * from school where school_id = '$get_id'")or die(mysqli_error());
							$row = mysqli_fetch_array($query);
							?>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['school_name']; ?>" id="focusedInput" name="school_name" type="text" placeholder = "Name of school">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['principal']; ?>" id="focusedInput" name="principal" type="text" placeholder = "Principal">
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
 if (isset($_POST['update'])){
 

 $school_name = $_POST['school_name'];
 $principal = $_POST['principal'];
 
 mysqli_query($conn,"update school set school_name = '$school_name' , principal  = '$principal' where school_id = '$get_id' ")or die(mysqli_error());
 mysqli_query($conn,"insert into activity_log (time,username,action) values(NOW(),'$user_username','Edit School $school_name')")or die(mysqli_error());
 ?>
 <script>
 window.location='school.php'; 
 </script>
 <?php 
 }
 ?>
 