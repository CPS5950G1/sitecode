<?php
 
	$servername = "imc.kean.edu";
	$username = "wangqian";
	$password = "1023275";
	$dbname = "2017F_wangqian";
	$conn = new mysqli($servername, $username, $password, $dbname);

	$query = "";





	if(isset($_POST['$checkkey'])){
		if($_POST['$checkkey']==0){
			$checkkey=1;
		}elseif($_POST['$checkkey']==1){
			$checkkey=0;
		}else{
			echo "ERROR!";
		}
	}
	

	header("location:user_check.php");  
?>