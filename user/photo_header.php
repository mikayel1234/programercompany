<?php
	require '../postgresql_require.php';
	session_start();
	$login=$_SESSION['login'];
	$result=pg_query("SELECT * from user_1_photo WHERE login='$login'");
	$image=pg_fetch_assoc($result);
	header('Content-length:'.$image['image_size']);
	header('Content-type:' . $image['image_mime']);
	
echo $image['image_data'];

?>