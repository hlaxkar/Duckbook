<?php
include("connect.php")
if(isset($_POST['b1']))
	mysqli_query($conn,"update user_info set
	
	fname
	
	where uid = '"..$_SESSION['sid']"'")
?>