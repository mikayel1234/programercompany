<?php
	require "postgresql_require.php";
	$result=pg_query("SELECT * from user_info");
	echo pg_num_rows($result);
	pg_close();
?>