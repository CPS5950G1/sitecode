<!DOCTYPE html>
<html>
	<title>Search Student</title>
	<body>
		<?php
		echo "<br>Please enter keywords to search student information. * for all: <br>"
		?>
		<form action = "admin_search_mentor_handle.php" method="post">
			Keywords: <input type="text" name="keywords" required="required">
			<input type="submit" name = "submit" value="submit" href = "admin_search_mentor_handle.php"><br/>Search Mentor Information</a>
		</form>
		<br><a href='user_check.php'>Admin home page</a>
	</body>
</html>