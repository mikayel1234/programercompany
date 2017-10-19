<?php
    require "postgresql_require.php";
	$login=$_GET['login'];
	$link=pg_query("SELECT * from user_info WHERE login='$login'");
	if(pg_num_rows($link)==1)
	{
		echo json_encode(false);
	}
	else
	{
		echo json_encode(true);
	}
?>