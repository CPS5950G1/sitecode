<!DOCTYPE html>
<html>
	<body>
		<?php
		$hostname = "imc.kean.edu";
		$username = "wangqian";
		$password = "1023275";
		$dbname = "2017F_wangqian";
		$con=mysqli_connect($hostname, $username,$password,$dbname);
		
		$student_id = $_POST['student_id'];
	    $first_name = $_POST['first_name'];
	    $last_name = $_POST['last_name'];
	    $email = $_POST['email'];
	    $course = $_POST['course'];
	    $mentor_id = $_POST['mentor_id'];
	    $intime = date("Y-m-d   h:i:s");
		
		

		if($student_id == null){
			echo "Please enter the student name";
			exit;
		}
	
	    if($first_name == null){
			echo "Please enter the student first name";
			exit;
		}
		
		if($last_name == null){
			echo "Please enter the student last name";
			exit;
		}
		
		if($course == null){
			echo "Please select a course";
			exit;
		}
		
		/*$query = "select name from PRODUCT where name = '$product_name'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		if($row[0] === $product_name){
			echo "<br>The product already exits";
			die;
		}
		*/
		
		$query1 = "insert into SEStudent (ID, student_id,first_name,last_name,Email,course,mentor_id,intime,outtime) VALUES ('','$student_id','$first_name', '$last_name','$email','$course','$mentor_id','$intime','')";


		$query2 = "select max(ID) from SEStudent";

		$result1 = mysqli_query($con, $query1);
		if($result1){
			echo "Successfully insert the student information<br>\n";
			$result2 = mysqli_query($con, $query2);
			$k = mysqli_fetch_array($result2);
			echo "Student information ID is: ".$k[0]."<br>";
			echo "Student ID is: ".$student_id."<br>";
			echo "Course is: ".$course."<br>";
			echo "Mentor ID is: ".$mentor_id."<br>";
			echo "Sign in time is ".$intime.".";
			echo "<br><br><br><br><br><b>student tutoring sign out</b><br>";
			
			
			
			echo "<form action='tutoring_time_out.php' method = 'post'>
			<input type='hidden' name = 'information_id' value=$k[0]></input>
			<input type='hidden' name = 'student_id' value=$student_id></input>
			<input type='hidden' name = 'course' value=$course></input>
			<input type='submit' value='Sign out'></input>
			</form>";
			


		}
		else {
			echo"Insert faild";
		}
		
		?>
	</body>
</html>