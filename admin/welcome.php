<?php
	session_start();
	if(!$_SESSION){
		header("location:admin_login.html");
    }
    session_destroy();
?>

<html>
	<body>
		<h1>Login Successful</h1>
		<a href="logout.php">Logout</a>
	</body>
</html>