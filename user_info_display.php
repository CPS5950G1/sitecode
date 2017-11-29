<!DOCTYPE html>
<html>
	<body>
		<?php
			if(!empty($_COOKIE['ulogin_id'])){ 

				echo "<a href='user_logout.php'>Mentor logout</a><br>";

				$servername = "imc.kean.edu";
				$username = "wangqian";
				$password = "1023275";
				$dbname = "2017F_wangqian";
				$conn = new mysqli($servername, $username, $password, $dbname);

				if ($conn->connect_error) {

				    die("Connection failed: " . $conn->connect_error);

				}else{
					$login_id = $_COOKIE['ulogin_id'];
					$sql = "SELECT * FROM User where login_id='$login_id'";
					$result = mysqli_query($conn,$sql);
				?>

				<form name='input' action='user_info_update.php' method='post'>
				<table border=1>
				<th>ID</th><th>login ID</th><th>Password</th><th>First Name</th><th>Last Name</th><th>Description</th><th>Email</th><tr>

				<?php
				while($row = mysqli_fetch_array($result)){
				  echo "<td bgcolor=yellow>".$row['ID']."</td><td bgcolor=yellow> ".$row['login_id']."</td><td>".$row['password']."</td><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td>".$row['description']."</td><td>".$row['Email']."</td><tr>";
				 
					?>
					<td bgcolor=yellow><?php echo $row['ID']  ?></td><input type="hidden" name="ID" value="<?php echo $row['ID'] ?>">  <?php
					 ?><td bgcolor=yellow><?php echo $row['login_id']  ?></td><input type="hidden" name="login_id" value="<?php echo $row['login_id'] ?>"><?php
					 ?><td><input type="text" name="password" value="<?php echo $row['password'];  ?>"></td><?php
					 ?><td><input type="text" name="first_name" value="<?php echo $row['first_name'];  ?>"></td><?php
					 ?><td><input type="text" name="last_name" value="<?php echo $row['last_name'];  ?>"></td><?php
					 ?><td><input type="text" name="description" value="<?php echo $row['description'];  ?>"></td><?php
					 ?><td><input type="text" name="email" value="<?php echo $row['Email'];  ?>"></td><?php
				}
				?>
				<br>

				</table>

				<input type='submit' value='Update information'>	

				<?php
				echo "<br><a href='user_check.php'>Mentor home page</a>";

				}

			}else{
				echo "Please login first.";
			}
			mysqli_close($conn);
		?>
	</body>
</html>