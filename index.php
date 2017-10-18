<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		require "postgresql_require.php";
		session_start();
		$_SESSION['email']="asd";
		if(isset($_SESSION['email']))
		{
			header("home_page.php");
			exit;
		}
	?>
</body>
</html>