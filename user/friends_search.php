<?php
	include "include_header.php";
	$search=$_POST['friend'];
	$nf=explode(' ',$search);
	$name=$nf[0];
	$lastname=$nf[1];
	$result=pg_query("SELECT * from user_info WHERE name='$name' AND lastname='$lastname'");
	while($row=pg_fetch_assoc($result))
	{
		$frined_login=$row['login'];
		$img_result=pg_query("SELECT * from user_img WHERE login='$frined_login'");
		$frined_img=pg_fetch_assoc($img_result);
		$img_href=$frined_img['href'];
		?>
		<img src="<?php echo $img_href?>">
		<?php
	}
	
?>
</body>
</html>