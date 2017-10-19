<?php
	require "postgresql_require.php";
	$name=$_POST['name'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$year=$_POST['year'];
	$month=$_POST['month'];
	$day=$_POST['day'];
	$password=crypt($email,$_POST['password']);
	$date_registration=date("Y/m/d");
	$link=pg_query("INSERT INTO user_info(name,lastname,email,password,year,day,month,fm,r_data) VALUES('$name','$lastname','$email','$password','$year','$day','$month','$gender','$date_registration')");
    	header("Location:home_page.php");
   