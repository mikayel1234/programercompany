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
		$now_month=date("n");
		$now_day=date("d");
		$user_year=$row['year'];
		$user_month=$row['month'];
		if($user_month=="January")
		{
			$user_month=1;
		}
		elseif($user_month=="February")
		{
			$user_month=2;
		}
		elseif($user_month=="March")
		{
			$user_month=3;
		}
		elseif($user_month=="April")
		{
			$user_month=4;
		}
		elseif($user_month=="May")
		{
			$user_month=5;
		}
		elseif($user_month=="June")
		{
			$user_month=6;
		}
		elseif($user_month=="July")
		{
			$user_month=7;
		}
		elseif($user_month=="August")
		{
			$user_month=8;
		}
		elseif($user_month=="September")
		{
			$user_month=9;
		}
		elseif($user_month=="October")
		{
			$user_month=10;
		}
		elseif($user_month=="November")
		{
			$user_month=11;
		}
		elseif($user_month=="December")
		{
			$user_month=12;
		}
		$user_day=$row['day'];
		echo $user_month." ".$now_month;
	}
	
?>
</body>
</html>