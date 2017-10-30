<?php
	include "include_header.php";
	$search=$_POST['friend'];
	$nf=explode(' ',$search);
	$name=$nf[0];
	$lastname=$nf[1];
	$result=pg_query("SELECT * from user_info WHERE (name='$name' OR lastname='$lastname') AND NOT login='$login'");
	while($row=pg_fetch_assoc($result))
	{
		?>
		<div>
			<?php
			$frined_login=$row['login'];
			$img_result=pg_query("SELECT * from user_img WHERE login='$frined_login'");
			$frined_img=pg_fetch_assoc($img_result);
			$img_href=$frined_img['href'];
			?>
			<img src="<?php echo $img_href?>" class="search_user_photo"><br>
			<p class="user_nl"><?php echo $row['name']?></p>
			<p class="user_nl"><?php echo $row['lastname']?></p>
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
		?>
			<hr>
			</div>
		<?php
	}
	
?>
</body>
</html>