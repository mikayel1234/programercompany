<?php
	require "postgresql_require.php";
	session_start();
	$name=$_POST['name'];
	$lastname=$_POST['lastname'];
	$login=$_POST['login'];
	$gender=$_POST['gender'];
	$year=$_POST['year'];
	$month=$_POST['month'];
	$day=$_POST['day'];
	$password=crypt($login,$_POST['password']);
	$date_registration=date("Y/m/d");
	$link=pg_query("INSERT INTO user_info(name,lastname,login,password,year,day,month,fm,r_data) VALUES('$name','$lastname','$login','$password','$year','$day','$month','$gender','$date_registration')");
	$_SESSION['login']=$login;
    header("Location:home_page.php");
   