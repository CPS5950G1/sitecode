<?php


	
	$checkout=$_POST['checkout'];
	$checkin=1;

	echo "<br><b>Are you sure to check out?</b>";


	echo "<form name = 'input' action ='user_check.php' method = 'post' >";
		?>
		<input type='button' value='Click me' onclick="window.location='user_check.php'">No</input>
		<?php
	echo "</from>";

	echo "<form name = 'input' action ='user_check.php' method = 'post' >
		<input type='hidden' name = 'checkout' value=$checkout></input>
		<input type='submit' value='Yes'>Yes</input>";
	echo "</from>";
	 
?>