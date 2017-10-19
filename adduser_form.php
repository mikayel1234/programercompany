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
	$hours= date("h");
	$date_registration=date("Y/m/d");
	$link=pg_query("INSERT INTO user_info(name,lastname,email,password,year,day,month,fm,tfmail,r_hours,r_data) VALUES('$name','$lastname','$email','$password','$year','$day','$month','$gender','no',$hours,'$date_registration')");
	//////
	$subject = "Hello ".$name;
    $headers = "From: programercompany.herokuapp.com" . "\r\n" ."CC: somebodyelse@example.com";
    $result=pg_query("SELECT * from user_info WHERE email='$email'");
    $row=pg_fetch_assoc($result);
    $txt ='https://programercompany.herokuapp.com/insert_user.php?id='.$row['id'];
    $mail=mail($email,$subject,$txt,$headers);
    if(!$mail)
    {
    	header("Location:index.php");
    }
	////////
	header("Location:sendmail.php");