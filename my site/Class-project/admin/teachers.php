<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container-fluid">
<div class="row-fluid">

<?php include('teacher_sidebar.php'); ?>
<div class="span3" id="adduser">
<?php include('add_teacher.php'); ?>		   			
</div>
<div class="span6" id="">
<div class="row-fluid">
<!-- block -->
<div id="block_bg" class="block">
<div class="navbar navbar-inner block-header">
<div class="muted pull-left">List of Teachers</div>
</div>
<div class="block-content collapse in">
<div class="span12">
<form action="delete_teacher.php" method="post">
<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
<a data-toggle="modal" href="#teacher_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
<?php include('modal_delete.php'); ?>
<thead>
<tr>
<th></th>
<th>ID</th>
<th>Photo</th>
<th>Name</th>
<th>School</th>
<th>Edit</th>
<th>status</th>
<th></th>
</tr>
</thead>
<tbody>
    <?php
$teacher_query = mysqli_query($conn,"select * from teacher LEFT JOIN teacher_status on teacher.teacher_status = teacher_status.status_id LEFT JOIN School on teacher.school_id = school.school_id") or die(mysqli_error());
while ($row = mysqli_fetch_array($teacher_query)) {
$id = $row['teacher_id'];
$teacher_status = $row['teacher_status'];
?>
<tr>
<td width="30">
<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
</td>
<td><?php echo $row['teacher_id']; ?></td>
<td width="40"><img class="img-circle" src="<?php echo $row['picture']; ?>" height="50" width="50"></td> 
<td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
<td><?php echo $row['school_name']; ?></td>
<td width="50"><a href="edit_teacher.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"></i></a></td>
<td><?php echo $row['status']; ?></td> 

<?php if ($teacher_status == '1' ){ ?>
    	
<td width="120"><a href="de_activate.php<?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="icon-remove"></i> Deactivate</a></td>
<?php }else if ($teacher_status == '2' ){ ?>
    <td width="120"><a href="activate.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-check"></i> Activate</a></td>			
<?php } ?>
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