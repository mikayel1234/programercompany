<?php
		require "../postgresql_require.php";
		session_start();
		$login=$_SESSION['login'];	
		$result_user_nm=pg_query("SELECT * from user_info WHERE login='$login'");
		$row_nl=pg_fetch_assoc($result_user_nm);
		$name=$row_nl['name'];	
		$lastname=$row_nl['lastname'];
		if(!isset($_SESSION['login'])||!strlen($_SESSION['login'])>0)
		{
			header("Location:../index.php");
			exit;
		}
		$img_user=pg_query("SELECT * from user_img WHERE login='$login'");
		$img_src=pg_fetch_assoc($img_user);
		$img_href=$img_src['href'];
	?>
<!DOCTYPE html>
<html>
<head>
	<noscript>
    	<meta http-equiv="refresh" content="0; url=error/javascript.php">
	</noscript>
	<title><?php echo $name." ".$lastname;?></title>
	<link rel="shortcut icon" href="http://www.domain.com/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../style_user/style.css">
	<script src="../jquery/jquery.min.js"></script>
</head>
<body>
<a href="shutdown_user.php">shoudown</a>
<img src="<?php echo $img_href?>">
<ul>
	<li><a href="home_page.php">Public</a></li>
	<li><a href="friends_page.php">Friends</a></li>
	<li><a href="photo.php">Photo</a></li>
</ul>