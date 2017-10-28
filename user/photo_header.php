<?php
	require '../postgresql_requrie.php';
	session_start();
	$login=$_SESSION['login'];
	$result=pg_query("SELECT * from user_1_photo WHERE login='$login'");
	$image=pg_fetch_assoc($result);


?>