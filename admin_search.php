<!DOCTYPE html>
<html>
	<title>Search Student</title>
	<body>
		<?php
		echo "<br>Please enter keywords to search student information. * for all: <br>"
		?>
		<form action = "admin_search_student_handle.php" method="post">
			Keywords: <input type="text" name="keywords" required="required">
			<input type="submit" name = "submit" value="submit" href = "admin_search_student_handle.php"><br/>Search Student Information</a>
		</form>
		<br><a href='user_check.php'>Admin home page</a>
	</body>
</html>