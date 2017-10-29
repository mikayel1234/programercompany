<?php
	require "../postgresql_require.php";
	if(isset($_GET['term']))
	{
		$array=[];
		$term=$_GET['term'];
		$result=pg_query("SELECT * from user_info WHERE name LIKE '$term%'");
		
		
	}
?>