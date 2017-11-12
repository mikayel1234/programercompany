<?php
	require "../postgresql_require.php";
	session_start();
	$login=$_SESSION['login'];
	$desc=$_POST["desc"];
	$ps=pg_query("INSERT INTO chat(username,description) VALUES('$login','$desc')");
	
?>