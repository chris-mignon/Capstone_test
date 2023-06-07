<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('subject_sidebar.php'); ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Add Subject</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="subjects.php"><i class="icon-arrow-left"></i> Back</a>
									    <form class="form-horizontal" method="post">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Subject Code</label>
											<div class="controls">
											<input type="text" name="subject_code" id="inputEmail" placeholder="Subject Code">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Subject Title</label>
											<div class="controls">
											<input type="text" class="span8" name="title" id="inputPassword" placeholder="Subject Title" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="inputPassword">Number of Units</label>
											<div class="controls">
											<select name ="unit" class= "" placeholder="Subject Title"required > 
											<option> </option>
											<option value ="1"> 1</option>
											<option value ="2">2 </option>
											<option value ="3">3 </option>
											<option value ="4">4 </option>
											 </select>
											</div>
										</div>
											


										<div class="control-group">
									<label class= "control-label">Category:</label>
									<div class="controls">
									<select name="category"  class="" required>
										<option> </option>
										<?php
										$query = mysqli_query($conn,"select * from category order by category_name");
										while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
										<?php } ?>
											</select>
											</div>
											</div>

												
										<div class="control-group">
									<label class= "control-label">Term:</label>
									<div class="controls">
									<select name="term"  class="" required>
										<option></option>
										<?php
										$query = mysqli_query($conn,"select * from term order by term_id");
										while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['term_id']; ?>"><?php echo $row['term_name']; ?></option>
										<?php } ?>
											</select>
											</div>
											</div>



								
										<div class="control-group">
											<label class="control-label" for="inputPassword">Description</label>
											<div class="controls">
													<textarea name="description" id="ckeditor_full"></textarea>
											</div>
										</div>
												
																		
											
										<div class="control-group">
										<div class="controls">
										
										<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
										</div>
										</div>
										</form>
										
										<?php
										if (isset($_POST['save'])){
										$subject_code = $_POST['subject_code'];
										$title = $_POST['title'];
										$unit = $_POST['unit'];
										$description = $_POST['description'];
										$category = $_POST['category'];
										$term = $_POST['term'];
										
										$query = mysqli_query($conn,"select * from subject where subject_code = '$subject_code' ")or die(mysqli_error());
										$count = mysqli_num_rows($query);

										if ($count > 0){ ?>
										<script>
										alert('Data Already Exist');
										</script>
										<?php
										}else{
										mysqli_query($conn,"insert into subject (subject_code,subject_title,category,description,unit,term) values('$subject_code','$title','$category','$description','$unit','$term')")or die(mysqli_error());
										
										
										mysqli_query($conn,"insert into activity_log (time,username,action) values(NOW(),'$user_username','Add Subject $subject_code')")or die(mysqli_error());
										
										
										?>
										<script>
										window.location = "subjects.php";
										</script>
										<?php
										}
										}
										
										?>
									
								
		                            </div>
		                        </div>
		                        <!-- /block -->
		                    </div>
		                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>