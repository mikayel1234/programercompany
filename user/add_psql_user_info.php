	<?php
		require "../postgresql_require.php";
		session_start();
		$login=$_SESSION['login'];
		if(!isset($_SESSION['login'])||(!strlen($login))>0)
		{
			header("Location:../index.php");
			exit;
		}
		if(isset($_POST['add_information_user']))
		{
			$workplace=$_POST['work'];
			$class=$_POST['class'];
			$country=$_POST['country'];
			$city=$_POST['city'];
			$tel=$_POST['telephone'];
			$new_info=pg_query("SELECT * from new_info WHERE login='$login'");
			if (pg_num_rows($new_info)==1) {
				$add_info=pg_query("UPDATE new_info SET workplace='$workplace',class='$class',country='$country',city='$city',telephone='$tel'");
			}
			else
			{
				$add_info=pg_query("INSERT INTO new_info(workplace,class,country,city,telephone,login) VALUES('$workplace','$class','$country','$city','$tel','$login')");
			}
			header("Location:home_page.php");
			exit;
		}

	?>