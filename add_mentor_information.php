<!DOCTYPE html>

<html>
	<body>
		<?php 
			echo "<br><a href = 'user_logout.php'>Admin logout</a>";
		?>
		<br>
		Add mentor information
		<form action="add_mentor_information_handle.php" method="post">
	    <p>Mentor student ID(7 numbers): <input type = "text" placeholder="ID" name="student_id" size="7" maxlength="7" reuqired="required"></p>
        <p>First name: <input type="text" placeholder="First name" name="first_name" size="30" maxlength="60" required="required"></p>
	    <p>Last name: <input type="test" placeholder="Last name" name="last_name" size="30" maxlength="60" required="required"></p>
	    <p>Description: <input type="text" placeholder="Description" name="description" size="30" maxlength="60"></p>
	    <p>Email: <input type="text" placeholder="Email" name="email" size="30" maxlength="60" required="required"></p>
	    
	    
	    <input type="submit" value="Submit">
    </form>
    <br><br><br><a href='user_check.php'>Admin home page</a>
	</body>
</html>