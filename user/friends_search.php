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
		<p><?php echo $name?></p><br>
		<p><?php echo $lastname?></p>
		<?php
		$now_year=date("Y");
		$now_month=date("F");
		$now_day=date("d");
		$user_year=$row['year'];
		$user_month=$row['month'];
		$user_month=date("F", strtotime($user_month))
		$user_day=$row['day'];
		echo $now_month." ".$now_month." ".$now_day." ".$user_year." ".$user_month." ".$user_day;
	}
	
?>
</body>
</html>