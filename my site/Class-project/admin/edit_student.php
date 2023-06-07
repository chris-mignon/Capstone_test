<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('edit_students_form.php'); ?>		   			
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Student List</div>
                            </div>
                            <div class="block-content collapse in">
									<div class="span12">
									<form action="delete_student.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
										<th></th>
									
										<th>ID </th>
										<th> Photo </th>
										<th>Name</th>
										<th>Class</th>
										<th>Status</th>
										<th></th>
										   </tr>
										</thead>
										<tbody>
											
                                         <?php
                                    $query = mysqli_query($conn,"select * from student LEFT JOIN class ON class.class_id = student.class_id LEFT JOIN student_status on student.status = student_status.status_id  where student.student_id = '$get_id'") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['student_id'];
                                        ?>

										<tr>
										<td width="30">
										<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
										<td><?php echo $row['student_id']; ?></td>
										<td width="40"><img class="img-circle" src="<?php echo $row['picture']; ?>" height="50" width="50"></td>
                                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td> 
														
										<td width="100"><?php echo $row['class_name']; ?></td> 
										<td width="100"><?php echo $row['status_name']; ?></td> 

										<td width="30"><a href="edit_student.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"></i> </a></td>
									 
										</tr>
                                   <?php } ?>    
                              
										</tbody>
									</table>
									</form>
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