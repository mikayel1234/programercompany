
<!DOCTYPE html>
<html>
<head>
	<?php
		require "../postgresql_require.php";
		session_start();
		$login=$_SESSION['login'];
		if(isset($_SESSION['login']))
		{
			echo "string";
		}
		echo $login;
		$result_user_nm=pg_query("SELECT * from user_info WHERE login='$login'");
		$row_nl=pg_fetch_assoc($result_user_nm);
		$name=$row_nl['name'];
		echo $name;
		$lastname=$row_nl['lastname'];
		echo $lastname;
	?>
	<title><?php echo $name." ".$lastname;?></title>
	<link rel="shortcut icon" href="http://www.domain.com/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../style_user/style.css">
</head>
<body>

</body>
</html>