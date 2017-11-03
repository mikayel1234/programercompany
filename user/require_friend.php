<?php
	require "../postresql_require.php";
	session_start();
	if(!isset($_SESSION['login'])||strlen($_SESSION['login'])==0)
	{
		header("Location:../index.php");
		exit;
	}
	$login=$_SESSION['login'];
	$id=$_GET['id'];
	

?>