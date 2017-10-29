<?php
	include "include_header.php";
	$search=$_POST['friend'];
	$result=pg_query("SELECT * from user_info WHERE (name+' '+lastname) ='$search'");
	while($row=pg_fetch_assoc($result))
	{
		echo 1;
	}
?>
</body>
</html>