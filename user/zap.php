<?php
	require "../postgresql_require.php";
	$ps=pg_query("SELECT * from chat");
	$a="";
	$array=[];
	session_start();
	$mail=$_SESSION['login'];
	$i=0;
	while($row=pg_fetch_assoc($ps))
	{
		if($row['usr']==$mail)
		{
			$d=$row['description'];
			$a=$row['username']."----".$d;	
			$array[$i]=$a;
			$i++;
			$a="";
		}
		
	}
	echo json_encode($array);
?>