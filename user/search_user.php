<?php
	require "../postgresql_require.php";
	if(isset($_GET['term']))
	{
		$array=array();
		$term=$_GET['term'];
		$result=pg_query("SELECT * from user_info WHERE name LIKE '$term%'");
		$result1=pg_query("SELECT * from user_info WHERE lastname LIKE '$term%'");
		$i=0;
		while($row=mysql_fetch_assoc($result))
		{	
			$array[$i]=$row['name'];
			$i++;
		}
		
		echo json_encode($array);
	}
?>