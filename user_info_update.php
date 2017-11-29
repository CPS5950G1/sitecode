<?php

$servername = "imc.kean.edu";
$username = "wangqian";
$password = "1023275";
$dbname = "2017F_wangqian";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}else{

$ID = $_POST['ID'];

$login_id = $_POST['login_id'];

$password = $_POST['password'];

$first_name = $_POST['first_name'];

$last_name = $_POST['last_name'];

$description = $_POST['description'];

$email = $_POST['email'];


$query =mysqli_query($conn,"Update User set login_id='$login_id', password='$password', first_name='$first_name', last_name='$last_name', description='$description', Email='$email' where ID ='$ID' && login_id='$login_id'");

setcookie("ulogin_id", null);  
setcookie("upassword", null);
setcookie("alogin_id", null);  
setcookie("apassword", null);
     
echo "<h2>Update success!</h2> - <a href=\"user_login.php\">Go to login</a>";

}
mysqli_close($conn);
?>