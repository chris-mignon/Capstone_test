<?php
		include('admin/dbcon.php');


		session_start();

		
		$username = $_POST['username'];
		$password = $_POST['password'];



		/* student */
			$query = "SELECT * FROM student WHERE username='$username' AND password='$password'";
			$result = mysqli_query($conn,$query)or die(mysqli_error());
			$row = mysqli_fetch_array($result);
			$num_row = mysqli_num_rows($result);
			$student_id = $row['student_id'];
		/* teacher */
		$query_teacher = mysqli_query($conn,"SELECT * FROM teacher WHERE username='$username' AND password='$password'")or die(mysqli_error());
		$num_row_teacher = mysqli_num_rows($query_teacher);
		$teacher_row = mysqli_fetch_array($query_teacher);
		$teacher_id = $teacher_row['teacher_id'];

		if( $num_row > 0 ) { 
		$_SESSION['id'] = $student_id;
		echo 'true_student';
		mysqli_query($conn,"insert into student_log (login_time,username,student_id) values(NOW(),'$username','$student_id')")or die(mysqli_error());
		}else if ($num_row_teacher > 0){
		$_SESSION['id']=$teacher_id;
		echo 'true';
		mysqli_query($conn,"insert into teacher_log (login_time,username,teacher_id) values(NOW(),'$username','$teacher_id')")or die(mysqli_error()); 
		 }
		 
		 else{ 
				echo 'false';
		}	
				
		?>