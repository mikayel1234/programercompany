<?php
	include "include_header.php";
	$search=$_POST['friend'];
	$nf=explode(' ',$search);
	$name=$nf[0];
	$lastname=$nf[1];
	$result=pg_query("SELECT * from user_info WHERE (name='$name' OR lastname='$lastname') AND NOT login='$login'");
	if(pg_num_rows($result)==0)
	{
		?>
		<p>no result</p>
		<?php
	}
	while($row=pg_fetch_assoc($result))
	{
		$id=$row['id'];
		?>
		<div>
			<?php
			$frined_login=$row['login'];
			$img_result=pg_query("SELECT * from user_img WHERE login='$frined_login'");
			$frined_img=pg_fetch_assoc($img_result);
			$img_href=$frined_img['href'];
			?>
			<img src="<?php echo $img_href?>" class="search_user_photo"><br>
			<a href="user_inforamtion.php?id=<?php echo $id?>">
			<p class="user_nl"><?php echo $row['name']?></p>
			<p class="user_nl"><?php echo $row['lastname']?></p><br>
			</a>
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
			if($now_month>$user_month)
			{
				?>
				<p class="year_user">Year <?php echo $now_year-$user_year?></p>
				<?php
			}
			elseif($now_month<$user_month)
			{
				?>
				<p class="year_user">Year <?php echo $now_year-$user_year-1?></p>
				<?php
			}
			elseif($now_month==$user_month)
			{
				if($now_day>$user_day)
				{
					?>
					<p class="year_user">Year <?php echo $now_year-$user_year?></p>
					<?php
				}
				elseif($now_day<$user_day)
				{
					?>
					<p class="year_user">Year <?php echo $now_year-$user_year-1?></p>
					<?php
				}
				elseif($now_day==$user_day)
				{
					?>
					<p class="year_user">Year <?php echo $now_year-$user_year?></p>
					<?php
				}
		}
		$information_new=pg_query("SELECT * from new_info WHERE login='$frined_login'");
		if(pg_num_rows($information_new)==0)
		{
			?>
			<p>no information</p>
			<?php
		}
		else
		{
			$info=pg_fetch_assoc($information_new);
			$work=$info['workplace'];
			$class=$info['class'];
			$country=$info['country'];
			$city=$info['city'];
			$telephone=$info['telephone'];
			if($work=="")
			{
				?>
				<p>work:dont is </p>
				<?php
			}
			else
			{
				?>
				<p>work:<?php echo $work?></p>
				<?php
			}
			if($class=="")
			{
				?>
				<p>work:dont is </p>
				<?php
			}
			else
			{
				?>
				<p>class:<?php echo $class?></p>
				<?php
			}
			if($country=="")
			{
				?>
				<p>country:dont is </p>
				<?php
			}
			else
			{
				?>
				<p>country:<?php echo $country?></p>
				<?php
			}
			if($city=="")
			{
				?>
				<p>city:dont is </p>
				<?php
			}
			else
			{
				?>
				<p>city:<?php echo $city?></p>
				<?php
			}
			if($telephone=="")
			{
				?>
				<p>telephone:dont is </p>
				<?php
			}
			else
			{
				?>
				<p>telephone:<?php echo $telephone?></p>
				<?php
			}
		}
		?>
		<button id="add_friend">
			<hr>
			</div>
		
		<?php
	}
	
?>
<script type="text/javascript">
	$(".add_friend").click(function(){
		console.log("error");
	});
</script>
</body>
</html>