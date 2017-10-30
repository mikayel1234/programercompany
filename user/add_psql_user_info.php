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
			echo $workplace." ".$class." ".$country." ".$city." ".$tel;
		}

	?>