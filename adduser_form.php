<?php
	try{

	
	require "postgresql_require.php";
	session_start();
	$name=$_POST['name'];
	$lastname=$_POST['lastname'];
	$login=$_POST['login'];
	$gender=$_POST['gender'];
	$year=$_POST['year'];
	$month=$_POST['month'];
	$day=$_POST['day'];
	$number=$_POST['number'];
	$result=pg_query("SELECT * from user_info WHERE login='$login'");
			if($year%4!=0&&$month=="February"&&$day==29||$year%4!=0&&$month=="February"&&$day==30||year%4!=0&&$month=="February"&&day==31)
			{
				header("Location:index.php?date");
				exit;
			}
			if($year%4==0&&$month=="February"&&$day==30||$year%4!=0&&$month=="February"&&$day==31)
			{
				header("Location:index.php?date");
				exit;
			}
			if($month=="April"&&$day==31)
			{
				header("Location:index.php?date");
				exit;
			}
			if($month=="June"&&$day==31)
			{
				header("Location:index.php?date");
				exit;
			}
			if($month=="September"&&$day==31)
			{
				header("Location:index.php?date");
				exit;
			}
			if($month=="November"&&$day==31)
			{
				header("Location:index.php?date");
				exit;
			}
			if(strpos($name,"<")!==false||strpos($lastname,"<")!==false||strpos($login,"<")!==false)
			{
				header("Location:index.php?error");
				exit;
			}
			if(pg_num_rows($result)==1)
			{
				header("Location:index.php?login");
				exit;
			}
			if($number!=$_GET['kod'])
			{
				header("Location:index.php?pinkod");
				exit;
			}
	$password=crypt($_POST['password'],$login);
	$date_registration=date("Y/m/d");
	$link=pg_query("INSERT INTO user_info(name,lastname,login,password,year,day,month,fm,r_data) VALUES('$name','$lastname','$login','$password','$year','$day','$month','$gender','$date_registration')");
	$result=pg_query("INSERT INTO online(user_login,online) VALUES('$login','yes')");
	if($gender=="male")
	{
		$add_img=pg_query("INSERT INTO user_img(login,href) VALUES('$login','photo_1/male.jpg')");
	}	
	else
	{
		$add_img=pg_query("INSERT INTO user_img(login,href) VALUES('$login','photo_1/female.jpg')");
	}
    header("Location:user/home_page.php");
    $_SESSION['login']=$login;
}
    catch(Exception $error)
    {
    	header("Location:error/error.php");
    }
   ?>