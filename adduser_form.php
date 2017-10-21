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
			if(strpos($name,"<")===false||strpos($lastname,"<")===false||strpos($login,"<")===false)
			{
				header("Location:index.php?error");
				exit;
			}
			if(pg_num_rows($result)==1)
			{
				header("Location:index.php?login");
				exit;
			}
			
	$password=crypt($login,$_POST['password']);
	$date_registration=date("Y/m/d");
	$link=pg_query("INSERT INTO user_info(name,lastname,login,password,year,day,month,fm,r_data) VALUES('$name','$lastname','$login','$password','$year','$day','$month','$gender','$date_registration')");

   
}
    catch(Exception $error)
    {
    	header("Location:error.php");
    }
   ?>