<?php

	setcookie("alogin_id", $login_id, null);  
	setcookie("apassword", $password, null);
	setcookie("ulogin_id", $login_id, null);  
	setcookie("upassword", $password, null);
	

	header("location:user_login.php");  
?>