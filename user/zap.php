<?php
	require "../postgresql_require.php";
	$ps=pg_query("SELECT * from chat");
	$a="";
	while($row=pg_fetch_assoc($ps))
	{
		$a=$a+" "+$row['description'];
	}
	echo $a;
?>