<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_log_sidebar.php'); ?>

                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">students Log </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
								
										<thead>
										  <tr>
										<th> ID </th>
										<th>Login time</th>
										<th>Logout time</th>
										<th>Firstname</th>
										<th>Lastname</th>
										<th>Username</th>
										<th>Student ID</th>
											
											
										   </tr>
										</thead>
										<tbody>
													<?php
													$student_query = mysqli_query($conn,"SELECT * from student_log LEFT JOIN student on student_log.student_id = student.student_id order by log_id DESC")or die(mysqli_error());
													while($row = mysqli_fetch_array($student_query)){
													$id = $row['log_id'];
													?>
									
												<tr>
												<td><?php echo $row['log_id']; ?></td>
												<td><?php echo $row['login_time']; ?></td>
												<td><?php echo $row['logout_time']; ?></td>
												<td><?php echo $row['firstname']; ?></td>
												<td><?php echo $row['lastname']; ?></td>
												<td><?php echo $row['username']; ?></td>
												<td><?php echo $row['student_id']; ?></td>
												</tr>
												<?php } ?>
										</tbody>
									</table>
                                </div>
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