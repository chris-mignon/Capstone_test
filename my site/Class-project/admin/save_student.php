<?php
include('dbcon.php');
    
            $student_id =$_POST['sid'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password= $_POST['password'];
            $class_id= $_POST['class_id'];

            mysqli_query($conn,"insert into student (student_id,firstname,lastname,class_id,username,password,picture,status)
    values ('$student_id', '$firstname', '$lastname', '$class_id','$username','$password','uploads/NO-IMAGE-AVAILABLE.jpg','2')                                    
    ") or die(mysqli_error()); 
    mysqli_query($conn,"INSERT into activity_log (time,username,action) values(NOW(),'admin','Add new student, $firstname $lastname ')")or die(mysqli_error());
    ?>
