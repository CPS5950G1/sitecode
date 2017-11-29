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
				$query = "select * from User where login_id!='admin'";
			}else{
				$query = "select ID,login_id, password, first_name, last_name, description,Email from User where (login_id like '%$keywords%' or password like '%$keywords%' or first_name like '%$keywords%' or last_name like '%$keywords%' or description like '%$keywords%' or Email like '%$keywords%') and login_id!='admin'";
			}
			$result = mysqli_query($con, $query);
			echo "<a href = 'user_logout.php'>Admin logout</a>";
			echo "<br><a href='user_check.php'>Admin home page</a>";
			if(mysqli_num_rows($result)>0){
					
					echo "<br>Here list the result for searching: $keywords<br>";
					echo "<form name='input' action='update_mentor.php' method='post'>";
					echo "<table border=1>\n";
					echo "<tr><td>ID<td>Mentor ID<td>Password<td>First Name<td>Last Name<td>Description<td>Email</tr>";
					
					
						while($row = mysqli_fetch_array($result)) {
							$id = $row['ID'];
							$login_id = $row['login_id'];
							$password = $row['password'];
							$first_name = $row['first_name'];
							$last_name = $row['last_name'];
							$description = $row['description'];
							$email = $row['Email'];
							
							
								
							echo "<tr><td bgcolor=yellow><input type='hidden' name = 'id[]' value='$id'>$id
							<td><input type='text' name = 'login_id[]' value='$login_id' maxlength='7'>
							<input type='hidden' name = 'originlogin_id[]' value='$login_id'>
							<td><input type='text' name = 'password[]' value='$password'>
							<input type='hidden' name = 'originpassword[]' value='$password'>
							<td><input type='text' name = 'first_name[]' value='$first_name'>
							<input type='hidden' name = 'originfirst_name[]' value='$first_name'>
							<td><input type='text' name = 'last_name[]' value='$last_name'>
							<input type='hidden' name = 'originlast_name[]' value='$last_name'>
							<td><input type='text' name = 'description[]' value='$description' size='60' maxlength='255'>
							<input type='hidden' name = 'origindescription[]' value='$description'>
							<td><input type='text' name = 'email[]' value='$email'>
							<input type='hidden' name = 'originemail[]' value='$email'>
							
							";
						}
					
					echo "</table>\n";
					echo "<br><input type='submit' name='submit' value='Update Mentor Info'></form>";
					
					echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
				
				}else{
					echo "<br><br>There is no such records as keywords like <b>$keywords</b>";
					echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
				}

			}
			

	
		?>
		
		
	</body>
</html>