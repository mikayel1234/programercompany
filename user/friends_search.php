<?php
	include "include_header.php";
	$search=$_POST['friend'];
	$result1=pg_query("SELECT * from user_info WHERE (name+' '+lastname) ='$search'");
	echo $search;
	echo pg_num_rows($result1);
	
?>
</body>
</html>