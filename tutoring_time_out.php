<!DOCTYPE html>

<html>
	<body>
	<?php
	

	$hostname = "imc.kean.edu";
	$username = "wangqian";
	$password = "1023275";
	$dbname = "2017F_wangqian";
	$con=mysqli_connect($hostname, $username,$password,$dbname);

	$outtime = date("Y-m-d   h:i:s");
	$informationid = $_POST['information_id'];
	$student_id = $_POST['student_id'];
	$course = $_POST['course'];

	$query="update  SEStudent set outtime = '$outtime' where ID='$informationid'";
	$result = mysqli_query($con, $query);
	if($result){
		echo "Student information ID: ".$informationid.".<br>";
		echo "Student ID: ".$student_id.".<br>";
		echo "Course: ".$course.".<br>";
		echo "Successful Sign out, sign out time is ".$outtime.".";
		
		echo "<br><a href='user_check.php'>Mentor home page</a>";
	}


	
	  
	?>
	</body>
</html>