<?php
	require "../postgresql_require.php";
	$ps=pg_query("SELECT * from chat");
	$a="";
	while($row=pg_fetch_assoc($ps))
	{
		$d=$row['description'];
		echo $d;
		$a=$a+" "+$d;
		echo $a;
	}
	echo $a;
?>