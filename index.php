<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$result=pg_connect("ec2-54-243-252-91.compute-1.amazonaws.com","mbqqlybjsttlim","3b6c57d79808af21d053cc103827a32c97acb740f30bc421b079e0c43a3d71d9");
		if($result)
		{
			echo "asd";
		}
		echo pg_error();
	?>
</body>
</html>