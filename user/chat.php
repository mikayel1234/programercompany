<?php
	require "../postgresql_require.php";
	session_start();
	$login=$_SESSION['login'];
	$desc=$_POST["desc"];
	$desc1=$_POST["desk1"];
	$ps=pg_query("INSERT INTO chat(username,description,usr) VALUES('$login','$desc','$desc1')");
	
?>