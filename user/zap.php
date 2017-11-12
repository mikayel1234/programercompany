<?php
	require "../postgresql_require.php";
	$ps=pg_query("SELECT * from chat");
	$a="";
	while($row=pg_fetch_assoc($ps))
	{
		$d=$row['description'];
		$a+=$d+" ";		
	}
	echo $a;
?>