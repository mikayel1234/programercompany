<?php
    require "postgresql_require.php";
	$email=$_GET['email'];
	$link=pg_query("SELECT * from user_info WHERE email='$email'");
	if(pg_num_rows($link)==1)
	{
		echo json_encode(false);
	}
	else
	{
		echo json_encode(true);
	}
?>