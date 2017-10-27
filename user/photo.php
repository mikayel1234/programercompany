<?php
	include "include_header.php";
	require '../postgresql_require.php';
	session_start();
	$login=$_SESSION['login'];
	$img_1_user=pg_query("SELECT * from user_img WHERE login='$login'");
	$img_1_href=pg_fetch_assoc($img_1_user);
?>
<div>
	<h1>photo</h1>
	<img src="<?php echo $img_1_href['href']?>">
</div>
</body>
</html>