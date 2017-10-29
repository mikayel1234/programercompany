<?php
	include "include_header.php";
	$search=$_POST['friend'];
	$result1=pg_query("SELECT CONCAT(name,' ', lastname) AS 'fullname'from user_info WHERE fullname ='$search'");
	echo $search;
	while($row=pg_fetch_assoc($result1))
	{
		echo 1;
	}
?>
</body>
</html>