<?php
	require "../postgresql_require.php";
	session_start();
	$login=$_SESSION['login'];
	$hours=date("h");
	$minute=date("i");
	$year=date("Y");
	$mont=date("m");
	$day=date("d");
	$query=pg_query("UPDATE online SET hour=$hours,minute=$minute,day=$day,month=$month,year=$year WHERE user_login='$login'");
	$_SESSION['login']="";
	
?>