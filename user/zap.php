<?php
	require "../postgresql_require.php";
	session_start();
	$mail=$_SESSION['login'];
	$ps=pg_query("SELECT * from chat WHERE usr='$mail'or username='$mail'");
	$a="";
	$array=[];
	
	$i=0;
	while($row=pg_fetch_assoc($ps))
	{
		
		
			$d=$row['description'];
			$a=$row['username']."----".$d;	
			$array[$i]=$a;
			$i++;
			$a="";
		
		
	}
	echo json_encode($array);
?>
