<?php
	require "../postgresql_require.php";
	session_start();
	$_SESSION['login']="";
	header("Location:../index.php");
?>