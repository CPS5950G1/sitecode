<!DOCTYPE html>
<html>
	<body>
		<?php
		$hostname = "imc.kean.edu";
		$username = "wangqian";
		$password = "1023275";
		$dbname = "2017F_wangqian";
		$con=mysqli_connect($hostname, $username,$password,$dbname);
		
		$id = $_POST['id'];
		$login_id = $_POST['login_id'];
		$password = $_POST['password'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$description = $_POST['description'];
		$email = $_POST['email'];
		
		$originlogin_id = $_POST['originlogin_id'];
		$originpassword = $_POST['originpassword'];
		$originfirst_name = $_POST['originfirst_name'];
		$originlast_name = $_POST['originlast_name'];
		$origindescription = $_POST['origindescription'];
		$originemail = $_POST['originemail'];
		




		for($i=0;$i<count($id);$i++) {
			if (empty($login_id[$i])||empty($password[$i])||empty($first_name[$i])||empty($last_name[$i])||empty($description[$i])||empty($email[$i])) {
				echo "<b>ERROR !</b> Any column shouldn't be empty. <br><b>All update faild.</b>";
				echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
				die;
			}	
		}

		mysqli_query($con, "set autocommit=0");
		mysqli_query($con, "begin");
		$j = 0;

		for($i=0;$i<count($id);$i++) {
			if (empty($login_id[$i])||empty($password[$i])||empty($first_name[$i])||empty($last_name[$i])||empty($description[$i])||empty($email[$i])) {
				echo "<b>ERROR !</b> Any column shouldn't be empty. <br><b>All update faild.</b>";
				mysqli_query($con, "rollback");
				die;

			}
			elseif($login_id[$i]==$originlogin_id[$i]&&$password[$i]==$originpassword[$i]&&$first_name[$i]==$originfirst_name[$i]&&$last_name[$i]==$originlast_name[$i]&&$description[$i]==$origindescription[$i]&&$email[$i]==$originemail[$i]){
				continue;
			}
			else{
				$query[$i] = "UPDATE User SET login_id='$login_id[$i]',password='$password[$i]', first_name='$first_name[$i]', last_name='$last_name[$i]'
				, description='$description[$i]',Email='$email[$i]' where ID = '$id[$i]'";
				
				$result[$i] = mysqli_query($con, $query[$i]);
				if ($result[$i]) {
					echo "<br>Successfully update Mentor $login_id[$i]";
					echo "<br>";
					$j++;
				}
				else {
					echo "<br>Mentor $i information didn't update: $query[$i]";
					echo "<br>Error reason is : ".mysqli_error($con);
					mysqli_query($con, "rollback");
				}
			}
				
			}
			mysqli_query($con, "commit");
			if($j==1){
				echo "<br>$j mentor was updated.";
			}else{
				echo "<br>$j mentors were updated.";
			}
			echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
	
		?>
	</body>
</html>