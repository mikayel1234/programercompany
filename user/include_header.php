<?php
		require "../postgresql_require.php";
		session_start();
		if(!isset($_SESSION['login'])||!strlen($_SESSION['login'])>0)
		{
			header("Location:../index.php");
			exit;
		}
		$login=$_SESSION['login'];	
		$result_user_nm=pg_query("SELECT * from user_info WHERE login='$login'");
		$row_nl=pg_fetch_assoc($result_user_nm);
		$name=$row_nl['name'];	
		$lastname=$row_nl['lastname'];
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
	<link href="../jquery-ui-css/jquery-ui.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="http://www.domain.com/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../style_user/style.css">
	<script src="../jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="../smartmenus/sm-core-css.css">
	<link rel="stylesheet" href="../smartmenus/sm-simple.css">
	<script src="../smartmenus/jquery.smartmenus.min.js"></script>
	<script src="../jquery/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#friend").autocomplete({source:"search_user.php"});
			$('.sm').smartmenus();
		});
	</script>
</head>
<body>
<div id="header_reg">
	<h1 id="header_index">Programer Company</h1>
</div>
<a href="shutdown_user.php"><img src="../images/images.jpg" id="logout_logo"></a>
<img src="<?php echo $img_href?>">
<ul class="sm sm-core-css">
	<li><a href="home_page.php">Public</a></li>
	<li><a href="friends_page.php">Friends</a></li>
</ul>
<form method="post" action="friends_search.php">
	<input type="text" name="friend" id="friend">
	<input type="submit" name="search_user">
</form>
