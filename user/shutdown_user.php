<?php
	require "../postgresql_require.php";
	session_start();
	$login=$_SESSION['login'];
	$hours=date("h");
	$minute=date("i");
	$year=date("Y");
	$month=date("m");
	$day=date("d");
	$query=pg_query("UPDATE online SET hour=$hours,minute=$minute,day=$day,month=$month,year=$year,online='no' WHERE user_login='$login'");
	$_SESSION['login']="";
	header("Location:../index.php");
?>