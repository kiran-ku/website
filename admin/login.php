<?php
	session_start();
	$host = "localhost"; 
	$username = "kestreli_admin"; 
	$password = "Admin@123";  
	$db_name = "kestreli_admin";  
  
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB"); 
	$username=$_POST['username']; 
	$password=$_POST['password']; 
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	$sql="SELECT * FROM admin WHERE username='$username' and password='$password'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count==1){
		$_SESSION['user']=$username;
		if($_SESSION){
			header("location:admin1.php");
		}
		else{
			echo "Session expired please login again!";
		}
	}
	else {
		echo "Wrong Username or Password";
	}
	ob_end_flush();
?>