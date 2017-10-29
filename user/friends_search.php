<?php
	include "include_header.php";
	$search=$_POST['friend'];
	$nf=explode(' ',$search);
	$name=$nf[0];
	$lastname=$nf[1];
	$result1=pg_query("SELECT * from user_info WHERE name='$name' AND lastname='$lastname'");
	echo $search;
	echo pg_num_rows($result1);
	
?>
</body>
</html>