<!DOCTYPE html>
<html>
	<body>

		<?php
		$hostname = "imc.kean.edu";
		$username = "wangqian";
		$password = "1023275";
		$dbname = "2017F_wangqian";
		$con=mysqli_connect($hostname, $username,$password,$dbname);
		
		if(isset($_POST['submit'])){
			$keywords = $_POST['keywords'];
			if($keywords == '*'){
				$query = "select ID,student_id,first_name,last_name, Email, course,mentor_id,intime,outtime from SEStudent order by ID asc";
			}else{
				$query = "select ID,student_id,first_name,last_name, Email, course,mentor_id,intime,outtime from SEStudent where student_id like '%$keywords%' or mentor_id like '%$keywords%' or first_name like '%$keywords%' or last_name like '%$keywords%' or course like '%$keywords%' or Email like '%$keywords%' order by ID asc";
			}
			$result = mysqli_query($con, $query);
			echo "<a href = 'user_logout.php'>Admin logout</a>";
			
			if(mysqli_num_rows($result)>0){
					
					echo "<br>Here list the result for searching: $keywords<br>";
					echo "<form name='input' action='update_student.php' method='post'>";
					echo "<table border=1>\n";
					echo "<tr><td>ID<td>Student ID<td>First Name<td>Last Name<td>Email<td>Course<td>Mentor ID<td>Sign in time<td>Sign out time</tr>";
					
					
						while($row = mysqli_fetch_array($result)) {
							$id = $row['ID'];
							$student_id = $row['student_id'];
							$first_name = $row['first_name'];
							$last_name = $row['last_name'];
							$email = $row['Email'];
							$course = $row['course'];
							$mentor_id = $row['mentor_id'];
							$intime = $row['intime'];
							$outtime = $row['outtime'];
							
								
							echo "<tr><td bgcolor=yellow><input type='hidden' name = 'id[]' value='$id'>$id
							<td><input type='text' name = 'student_id[]' value='$student_id'>
							<input type='hidden' name = 'originstudent_id[]' value='$student_id'>
							<td><input type='text' name = 'first_name[]' value='$first_name'>
							<input type='hidden' name = 'originfirst_name[]' value='$first_name'>
							<td><input type='text' name = 'last_name[]' value='$last_name'>
							<input type='hidden' name = 'originlast_name[]' value='$last_name'>
							<td><input type='text' name = 'email[]' value='$email'>
							<input type='hidden' name = 'originemail[]' value='$email'>
							

							<td><select name = 'course[]'>
							<option value = '$course'>$course</option>
							";
							
							$querycourse = "SELECT course_id from SECourse";
							$resultcourse = mysqli_query($con, $querycourse);
							while ($rowcourse = mysqli_fetch_array($resultcourse)) {
								$course1 = $rowcourse['course_id'];
								echo"<option value = '$course1'>$course1</option>";
							}
							
							echo"</select>
							<input type='hidden' name = 'origincourse[]' value='$course'>
							<td><select name = 'mentor_id[]'>
							<option value = '$mentor_id'>$mentor_id</option>
							";
							
							$querymentor = "SELECT login_id from User where Role='mentor'";
							$resultmentor = mysqli_query($con, $querymentor);
							while ($rowmentor = mysqli_fetch_array($resultmentor)) {
								$mentor_id1 = $rowmentor['login_id'];
								echo"<option value = '$mentor_id1'>$mentor_id1</option>";
							}
							
							echo"</select>
							<input type='hidden' name = 'originmentor_id[]' value='$mentor_id'>
							<td><input type='text' name = 'intime[]' value='$intime'>
							<input type='hidden' name = 'originintime[]' value='$intime'>
							<td><input type='text' name = 'outtime[]' value='$outtime'></tr>
							<input type='hidden' name = 'originouttime[]' value='$outtime'>
							";
						}
					
					echo "</table>\n";
					echo "<br><input type='submit' name='submit' value='Update student info'></form>";
					
					echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
				
				}else{
					echo "<br><br>There is no such records as keywords like <b>$keywords</b>";
					echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
				}

			}
			

	
		?>
		
		
	</body>
</html>