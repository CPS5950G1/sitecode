<!DOCTYPE html>

<html>
	<body>
		<?php 
			echo "<br><a href = 'user_logout.php'>Admin logout</a>";
		?>
		<br>
		Add Student information
		<form action="add_student_information_handle.php" method="post">
	    <p>Student ID(7 numbers): <input type = "text" placeholder="ID" name="student_id" size="7" maxlength="7" reuqired="required"></p>
        <p>First name: <input type="text" placeholder="First name" name="first_name" size="30" maxlength="60" required="required"></p>
	    <p>Last name: <input type="test" placeholder="Last name" name="last_name" size="30" maxlength="60" required="required"></p>
	    <p>Email: <input type="text" placeholder="Email" name="email" size="30" maxlength="60" required="required"></p>
	    <p>Select mentor:<select name="mentor_id" required="required">
	    	<option selected value="">---Please Select mentor ID---</option>
	    	<?php
	    	$hostname = "imc.kean.edu";
		    $username = "wangqian";
		    $password = "1023275";
		    $dbname = "2017F_wangqian";
		    $con=mysqli_connect($hostname, $username,$password,$dbname);
		
	    	$query = "select login_id From User where Role='mentor'";
	    	$result = mysqli_query($con, $query);
			while ($row = mysqli_fetch_array($result)) {
				$mentor_id = $row['login_id'];
				echo "<option value = '$mentor_id'>$mentor_id</option>\n";	
			}

	    	?>
	    </select>
	    <p>Select Course:<select name="course" required="required">
	    	<option selected value="">---Please Select a course---</option>
	    	<?php
	    	$hostname = "imc.kean.edu";
		    $username = "wangqian";
		    $password = "1023275";
		    $dbname = "2017F_wangqian";
		    $con=mysqli_connect($hostname, $username,$password,$dbname);
		
	    	$query = "select course_id,course_name From SECourse";
	    	$result = mysqli_query($con, $query);
			while ($row = mysqli_fetch_array($result)) {
				$c_id = $row['course_id'];
				$c_name = $row['course_name'];
				echo "<option value = '$c_id'>$c_id</option>\n";	
			}

	    	?>
	    </select>
	    <input type="submit" value="Submit">
    </form>
    
    <br><br><br><a href='user_check.php'>Admin home page</a>
    
	</body>
</html>