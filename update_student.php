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
		$student_id = $_POST['student_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$course = $_POST['course'];
		$mentor_id = $_POST['mentor_id'];
		$intime = $_POST['intime'];
		$outtime = $_POST['outtime'];
		$originstudent_id = $_POST['originstudent_id'];
		$originfirst_name = $_POST['originfirst_name'];
		$originlast_name = $_POST['originlast_name'];
		$originemail = $_POST['originemail'];
		$origincourse = $_POST['origincourse'];
		$originmentor_id = $_POST['originmentor_id'];
		$originintime = $_POST['originintime'];
		$originouttime = $_POST['originouttime'];




		for($i=0;$i<count($id);$i++) {
			if (empty($student_id[$i])||empty($first_name[$i])||empty($last_name[$i])||empty($course[$i])||empty($mentor_id[$i])||empty($intime[$i])||empty($outtime[$i])) {
				echo "<b>ERROR !</b> Any column except Email shouldn't be empty. <br><b>All update faild.</b>";
				echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
				die;
			}	
			elseif ($intime[$i]==0||$outtime[$i]==0) {
				echo "<b>ERROR !</b> Sign in time and sign out time can not be 0. <br><b>All update faild.</b>";
				echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
				die;
			}
		}

		mysqli_query($con, "set autocommit=0");
		mysqli_query($con, "begin");
		$j = 0;

		for($i=0;$i<count($id);$i++) {
			if (empty($student_id[$i])||empty($first_name[$i])||empty($last_name[$i])||empty($course[$i])||empty($mentor_id[$i])) {
				echo "Student ID, first name, last name, course ID, mentor ID shouldn't be empty. <br><b>All update faild.</b>";
				mysqli_query($con, "rollback");
				die;

			}
			elseif($student_id[$i]==$originstudent_id[$i]&&$first_name[$i]==$originfirst_name[$i]&&$last_name[$i]==$originlast_name[$i]&&$email[$i]==$originemail[$i]&&$course[$i]==$origincourse[$i]&&$mentor_id[$i]==$originmentor_id[$i]&&$intime[$i]==$originintime[$i]&&$outtime[$i]==$originouttime[$i]){
				continue;
			}
			else{
				$query[$i] = "UPDATE SEStudent SET student_id='$student_id[$i]',first_name='$first_name[$i]', last_name='$last_name[$i]', Email='$email[$i]'
				, course='$course[$i]',mentor_id='$mentor_id[$i]',intime='$intime[$i]', outtime='$outtime[$i]'  where ID = '$id[$i]'";
				
				$result[$i] = mysqli_query($con, $query[$i]);
				if ($result[$i]) {
					echo "<br>Successfully update Student $id[$i]";
					echo "<br>";
					$j++;
				}
				else {
					echo "<br>Student $i information didn't update: $query[$i]";
					echo "<br>";
					mysqli_query($con, "rollback");
				}
			}
				
			}
			mysqli_query($con, "commit");
			if($j==1){
				echo "<br>$j student was updated.";
			}else{
				echo "<br>$j students were updated.";
			}
			echo "<br><br><br><a href='user_check.php'>Admin home page</a>";
	
		?>
	</body>
</html>