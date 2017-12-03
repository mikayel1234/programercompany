<?php
	require "../postgresql_require.php";
	$ps=pg_query("SELECT * from chat");
	$a="";
	$array=[];
	$i=0;
	while($row=pg_fetch_assoc($ps))
	{
		$d=$row['description'];
		$a.=$row['username']."----".$d;	
		$array[$i]=$a;
		$i++;
	}
	echo $array;
?>