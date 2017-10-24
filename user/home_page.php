<?php
 		session_start();
 		require "../postgresql_require.php";
 		$login=$_SESSION['login'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		$result_user_nl=mysql_query("SELECT * from user_info WHERE login='$login'");
		$row_user_nl=mysql_fetch_assoc($result_user_nl);
	?>
	<title><?php echo $row_user_nl['name']." ".$row_user_nl['lastname'];?></title>
	<link rel="shortcut icon" href="http://www.domain.com/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../style_user/style.css">
</head>
<body>

</body>
</html>