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
                         $headers = "From: webmaster@example.com" . "\r\n" .
                       "CC: somebodyelse@example.com";
			
                          $row1=mysqli_fetch_assoc($result1);
                          $txt ='https://phpmysqljavascript.000webhostapp.com/index.php/index.php/insert_user.php?id=1';

                      mail($email,$subject,$txt,$headers);
    
	////////
	header("Location:sendmail.php");