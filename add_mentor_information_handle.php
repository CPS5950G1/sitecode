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
	    $description = $_POST['description'];
	    $email = $_POST['email'];
	    
		
		echo "<br><a href='user_logout.php'>Admin logout</a><br>";

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
		
		if($email == null){
			echo "Please enter a email";
			exit;
		}
		
		if($description == null){
			echo "Please enter a description";
			exit;
		}

		$query = "select $student_id from User where login_id = '$student_id'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		if($row[0] === $student_id){
			echo "<br>The Mentor already exits";
			die;
		}
		
		
		$query1 = "insert into User (ID,login_id, password, first_name,last_name,Role, description,Email) VALUES ('','$student_id', '123456' ,'$first_name', '$last_name','mentor', '$description', '$email')";
		$result1 = mysqli_query($con, $query1);
		if($result1){
			echo "Successfully insert the Mentor information<br>\n";
			echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
		}
		else {
			echo"<b>Mentor sign up faild !</b> Student ID have already exist.";
			echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
		}
		
		?>
	</body>
</html>